<?php

class OrderController {

    /**
     * Ordered order-status pipeline. Keys are stored in the DB; values are the
     * customer-facing German labels. The order of this array defines "next".
     */
    public static function statuses(): array
    {
        return [
            'received'         => 'Bestellung erhalten',
            'preparing'        => 'In Zubereitung',
            'out_for_delivery' => 'Unterwegs zur Lieferung',
            'completed'        => 'Abgeschlossen',
        ];
    }

    // ---- Employee overview: every order with its sandwiches + status ----------
    public function index() {
        requireLogin();

        $groups = getAll('SELECT * FROM order_groups ORDER BY created_at DESC, pk_order_group DESC', null);
        foreach ($groups as $group) {
            $group->sandwiches = $this->loadSandwiches($group->pk_order_group);
        }

        $statuses = self::statuses();
        require 'app/Views/overview.view.php';
    }

    // ---- Customer: build & place an order -------------------------------------
    public function createGET(){
        // Prices are needed so the builder can show a live total.
        $breadArray      = getAll('SELECT * FROM bread ORDER BY label ASC', null);
        $cheeseArray     = getAll('SELECT * FROM cheese ORDER BY label ASC', null);
        $meatArray       = getAll('SELECT * FROM meat ORDER BY label ASC', null);
        $sauceArray      = getAll('SELECT * FROM sauce ORDER BY label ASC', null);
        $vegetablesArray = getAll('SELECT * FROM vegetables ORDER BY label ASC', null);

        require 'app/Views/order.view.php';
    }

    /**
     * Persist a whole order. The client posts a `cart` JSON array of sandwiches;
     * prices are always recomputed server-side from the DB (never trusted from
     * the client) so the stored total is authoritative and consistent.
     */
    public function createPOST() {
        $cartRaw = post('cart', '');
        $cart = json_decode($cartRaw, true);

        if (!is_array($cart) || count($cart) === 0) {
            redirect('orders');
        }

        $customerName = trim((string) post('customer_name', ''));

        $orderGroupId = saveData(
            "INSERT INTO order_groups (customer_name, status, total_price) VALUES (?, 'received', 0)",
            array($customerName !== '' ? $customerName : null)
        );

        $total = 0.0;

        foreach ($cart as $sandwich) {
            $breadId  = (int) ($sandwich['bread']  ?? 0);
            $cheeseId = (int) ($sandwich['cheese'] ?? 0);
            $meatId   = (int) ($sandwich['meat']   ?? 0);
            $sauceId  = (int) ($sandwich['sauce']  ?? 0);
            $quantity = max(1, (int) ($sandwich['quantity'] ?? 1));
            $vegIds   = array_map('intval', (array) ($sandwich['vegetables'] ?? []));

            $breadPrice  = $this->priceOf('bread', 'pk_bread', $breadId);
            $cheesePrice = $this->priceOf('cheese', 'pk_cheese', $cheeseId);
            $meatPrice   = $this->priceOf('meat', 'pk_meat', $meatId);
            $saucePrice  = $this->priceOf('sauce', 'pk_sauce', $sauceId);

            // A sandwich needs its four valid base ingredients; skip anything broken.
            if ($breadPrice === null || $cheesePrice === null || $meatPrice === null || $saucePrice === null) {
                continue;
            }

            $unitPrice = $breadPrice + $cheesePrice + $meatPrice + $saucePrice;
            foreach ($vegIds as $vegId) {
                $vp = $this->priceOf('vegetables', 'pk_vegetables', $vegId);
                if ($vp !== null) {
                    $unitPrice += $vp;
                }
            }

            $orderId = saveData(
                "INSERT INTO orders (fk_order_group, fk_bread, fk_cheese, fk_meat, fk_sauce, quantity, unit_price)
                 VALUES (?, ?, ?, ?, ?, ?, ?)",
                array($orderGroupId, $breadId, $cheeseId, $meatId, $sauceId, $quantity, $unitPrice)
            );

            foreach ($vegIds as $vegId) {
                if ($this->priceOf('vegetables', 'pk_vegetables', $vegId) !== null) {
                    saveData("INSERT INTO orders_vegetables (fk_orders, fk_vegetables) VALUES (?, ?)",
                        array($orderId, $vegId));
                }
            }

            $total += $unitPrice * $quantity;
        }

        // No valid sandwich made it in -> drop the empty group and bounce back.
        $saved = $this->loadSandwiches($orderGroupId);
        if (count($saved) === 0) {
            saveData("DELETE FROM order_groups WHERE pk_order_group = ?", array($orderGroupId));
            redirect('orders');
        }

        saveData("UPDATE order_groups SET total_price = ? WHERE pk_order_group = ?",
            array($total, $orderGroupId));

        redirect('orderNr?id=' . $orderGroupId);
    }

    // ---- Customer: confirmation with the order number -------------------------
    public function orderNr(){
        $group = $this->loadGroup($_GET['id'] ?? null);
        $statuses = self::statuses();
        require 'app/Views/orderNr.view.php';
    }

    // ---- Customer: track an order by its number -------------------------------
    public function track(){
        $group = null;
        $notFound = false;
        $query = $_GET['id'] ?? null;
        if ($query !== null && $query !== '') {
            $group = $this->loadGroup($query);
            $notFound = ($group === null);
        }
        $statuses = self::statuses();
        require 'app/Views/track.view.php';
    }

    // ---- Employee: advance / set an order's status ----------------------------
    public function updateStatus(){
        requireLogin();

        $groupId = (int) post('order_group', 0);
        $status  = post('status', '');
        $statuses = self::statuses();

        if ($groupId > 0 && array_key_exists($status, $statuses)) {
            saveData("UPDATE order_groups SET status = ? WHERE pk_order_group = ?",
                array($status, $groupId));
        }
        redirect('overview');
    }

    // ---- helpers --------------------------------------------------------------

    /** Server-side price lookup; null when the id does not exist. */
    private function priceOf(string $table, string $pk, int $id): ?float
    {
        if ($id <= 0) {
            return null;
        }
        $rows = getAll("SELECT price FROM `$table` WHERE `$pk` = ?", array($id));
        return isset($rows[0]) ? (float) $rows[0]->price : null;
    }

    /** Load a single order group by id (accepts a numeric order number). */
    private function loadGroup($id): ?object
    {
        if ($id === null || !ctype_digit((string) $id)) {
            return null;
        }
        $rows = getAll('SELECT * FROM order_groups WHERE pk_order_group = ?', array((int) $id));
        if (!isset($rows[0])) {
            return null;
        }
        $group = $rows[0];
        $group->sandwiches = $this->loadSandwiches($group->pk_order_group);
        return $group;
    }

    /** All sandwiches (with ingredient labels + vegetables) for a group. */
    private function loadSandwiches($groupId): array
    {
        $sandwiches = getAll(
            'SELECT o.pk_orders, o.quantity, o.unit_price,
                    b.label AS bread, c.label AS cheese, m.label AS meat, s.label AS sauce
             FROM orders o
             LEFT JOIN bread b  ON o.fk_bread  = b.pk_bread
             LEFT JOIN cheese c ON o.fk_cheese = c.pk_cheese
             LEFT JOIN meat m   ON o.fk_meat   = m.pk_meat
             LEFT JOIN sauce s  ON o.fk_sauce  = s.pk_sauce
             WHERE o.fk_order_group = ?
             ORDER BY o.pk_orders ASC',
            array($groupId)
        );
        foreach ($sandwiches as $sandwich) {
            $sandwich->vegetables = getAll(
                'SELECT v.label AS label FROM orders_vegetables ov
                 JOIN vegetables v ON v.pk_vegetables = ov.fk_vegetables
                 WHERE ov.fk_orders = ?',
                array($sandwich->pk_orders)
            );
        }
        return $sandwiches;
    }
}
