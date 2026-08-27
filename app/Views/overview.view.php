<?php include 'app/Controllers/inc/header.inc.php'; ?>

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Bestellübersicht</h2>
        <p class="text-slate-600 dark:text-slate-300 text-sm">Alle eingehenden Bestellungen und deren Status.</p>
    </div>
    <a href="orders" class="hidden sm:inline-flex rounded-xl bg-brand-blue px-4 py-2 text-sm font-semibold text-white">Neue Bestellung</a>
</div>

<?php if (empty($groups)): ?>
    <div class="rounded-2xl bg-white dark:bg-slate-800 ring-1 ring-slate-200 dark:ring-slate-700 p-8 text-center text-slate-500">
        Noch keine Bestellungen.
    </div>
<?php else: ?>
    <div class="grid gap-4 md:grid-cols-2">
        <?php foreach ($groups as $group):
            $statusKey = $group->status;
            $statusLabel = $statuses[$statusKey] ?? $statusKey;
            $badge = [
                'received'         => 'bg-slate-200 text-slate-700 dark:bg-slate-700 dark:text-slate-200',
                'preparing'        => 'bg-amber-200 text-amber-900 dark:bg-amber-900/60 dark:text-amber-200',
                'out_for_delivery' => 'bg-blue-200 text-blue-900 dark:bg-blue-900/60 dark:text-blue-200',
                'completed'        => 'bg-green-200 text-green-900 dark:bg-green-900/60 dark:text-green-200',
            ][$statusKey] ?? 'bg-slate-200 text-slate-700';
        ?>
            <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-5">
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold text-brand-blue dark:text-brand-green">#<?= (int) $group->pk_order_group ?></span>
                    <span class="text-xs font-semibold rounded-full px-2.5 py-1 <?= $badge ?>"><?= e($statusLabel) ?></span>
                </div>
                <div class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                    <?php if (!empty($group->customer_name)): ?><?= e($group->customer_name) ?> · <?php endif; ?>
                    <?= e((string) $group->created_at) ?>
                </div>

                <ul class="mt-3 space-y-1 text-sm">
                    <?php foreach ($group->sandwiches as $s): ?>
                        <li class="flex gap-2">
                            <span>🥪</span>
                            <span class="flex-1">
                                <?= e($s->bread) ?>, <?= e($s->meat) ?>, <?= e($s->cheese) ?>, <?= e($s->sauce) ?>
                                <?php if (!empty($s->vegetables)): ?>
                                    <span class="text-slate-500 dark:text-slate-400">
                                        (<?= e(implode(', ', array_map(fn($v) => $v->label, $s->vegetables))) ?>)
                                    </span>
                                <?php endif; ?>
                            </span>
                            <span class="text-slate-500 dark:text-slate-400 whitespace-nowrap">× <?= (int) $s->quantity ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="mt-3 flex items-center justify-between border-t border-slate-200 dark:border-slate-700 pt-3">
                    <span class="text-sm text-slate-500">Gesamt</span>
                    <span class="font-bold">CHF <?= number_format((float) $group->total_price, 2) ?></span>
                </div>

                <form action="updateStatus" method="POST" class="mt-4 flex gap-2">
                    <input type="hidden" name="order_group" value="<?= (int) $group->pk_order_group ?>">
                    <select name="status" class="flex-1 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 px-2 py-1.5 text-sm">
                        <?php foreach ($statuses as $key => $label): ?>
                            <option value="<?= e($key) ?>" <?= $key === $statusKey ? 'selected' : '' ?>><?= e($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="rounded-lg bg-brand-blue px-3 py-1.5 text-sm font-semibold text-white hover:bg-brand-blue/90 transition">
                        Aktualisieren
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include 'app/Controllers/inc/footer.inc.php'; ?>
