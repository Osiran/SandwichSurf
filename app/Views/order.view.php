<?php include 'app/Controllers/inc/header.inc.php'; ?>
<script src="public/js/app.js" defer></script>

<h2 class="text-2xl font-bold mb-1">Ihr Sandwich</h2>
<p class="text-slate-600 dark:text-slate-300 mb-6">Wie dürfen wir Ihr Sandwich zubereiten?</p>

<div class="grid gap-6 lg:grid-cols-3">
    <!-- Ingredient selection -->
    <div class="lg:col-span-2 space-y-6">
        <?php
            $groups = [
                ['key' => 'bread',      'name' => 'bread',        'title' => 'Brot',   'type' => 'radio',    'items' => $breadArray,      'pk' => 'pk_bread'],
                ['key' => 'cheese',     'name' => 'cheese',       'title' => 'Käse',   'type' => 'radio',    'items' => $cheeseArray,     'pk' => 'pk_cheese'],
                ['key' => 'meat',       'name' => 'meat',         'title' => 'Fleisch','type' => 'radio',    'items' => $meatArray,       'pk' => 'pk_meat'],
                ['key' => 'sauce',      'name' => 'sauce',        'title' => 'Sauce',  'type' => 'radio',    'items' => $sauceArray,      'pk' => 'pk_sauce'],
                ['key' => 'vegetables', 'name' => 'vegetables[]', 'title' => 'Gemüse', 'type' => 'checkbox', 'items' => $vegetablesArray, 'pk' => 'pk_vegetables'],
            ];
            foreach ($groups as $g):
        ?>
            <fieldset class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-5">
                <legend class="px-2 text-lg font-semibold"><?= e($g['title']) ?></legend>
                <div class="grid gap-2 sm:grid-cols-2 mt-2">
                    <?php foreach ($g['items'] as $item):
                        $id = (int) $item->{$g['pk']};
                        $inputId = $g['key'] . '_' . $id;
                    ?>
                        <label for="<?= $inputId ?>"
                               class="flex items-center gap-3 rounded-xl border border-slate-200 dark:border-slate-600 px-3 py-2 cursor-pointer hover:border-brand-blue has-[:checked]:border-brand-blue has-[:checked]:bg-brand-blue/5 transition">
                            <input type="<?= $g['type'] ?>" name="<?= $g['name'] ?>" id="<?= $inputId ?>"
                                   value="<?= $id ?>" data-price="<?= number_format((float) $item->price, 2, '.', '') ?>"
                                   data-label="<?= e($item->label) ?>" data-group="<?= $g['key'] ?>"
                                   class="accent-brand-blue h-4 w-4">
                            <span class="flex-1"><?= e($item->label) ?></span>
                            <span class="text-sm text-slate-500 dark:text-slate-400">CHF <?= number_format((float) $item->price, 2) ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>
        <?php endforeach; ?>
    </div>

    <!-- Live preview + current sandwich + cart -->
    <div class="space-y-6">
        <div class="lg:sticky lg:top-24 space-y-6">
            <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-5">
                <h3 class="text-lg font-semibold mb-3">Vorschau</h3>
                <!-- Visual sandwich preview (layers rendered by app.js) -->
                <div id="preview" class="flex flex-col items-center justify-end gap-1 min-h-[140px] py-2"></div>
                <div id="previewDetails" class="mt-3 text-sm text-slate-600 dark:text-slate-300 space-y-0.5"></div>

                <div class="mt-4 flex items-center gap-3">
                    <label for="quantity" class="text-sm font-medium">Menge</label>
                    <input type="number" id="quantity" min="1" value="1"
                           class="w-20 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 px-2 py-1">
                    <div class="flex-1 text-right font-semibold" id="currentPrice">CHF 0.00</div>
                </div>

                <button type="button" id="addToCart"
                        class="mt-4 w-full rounded-xl bg-brand-green px-4 py-2.5 font-semibold text-slate-900 shadow hover:brightness-95 active:scale-95 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    + Zur Bestellung hinzufügen
                </button>
                <p id="addHint" class="mt-2 text-xs text-slate-500 dark:text-slate-400">Bitte Brot, Käse, Fleisch und Sauce auswählen.</p>
            </div>

            <form action="add_order" method="POST" class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-5">
                <h3 class="text-lg font-semibold mb-3">Ihre Bestellung</h3>
                <ul id="cartList" class="space-y-2 text-sm"></ul>
                <p id="cartEmpty" class="text-sm text-slate-500 dark:text-slate-400">Noch keine Sandwiches hinzugefügt.</p>

                <div class="mt-4 flex items-center justify-between border-t border-slate-200 dark:border-slate-700 pt-3">
                    <span class="font-medium">Gesamt</span>
                    <span class="text-lg font-bold" id="cartTotal">CHF 0.00</span>
                </div>

                <div class="mt-4">
                    <label for="customer_name" class="block text-sm font-medium mb-1">Name (optional)</label>
                    <input type="text" name="customer_name" id="customer_name" maxlength="255"
                           class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-blue/50">
                </div>

                <input type="hidden" name="cart" id="cart" value="[]">
                <button type="submit" id="placeOrder"
                        class="mt-4 w-full rounded-xl bg-brand-blue px-4 py-2.5 font-semibold text-white shadow hover:bg-brand-blue/90 active:scale-95 transition disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                    Bestellen →
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'app/Controllers/inc/footer.inc.php'; ?>
