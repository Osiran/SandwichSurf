<?php include 'app/Controllers/inc/header.inc.php'; ?>

<section class="max-w-2xl mx-auto">
<?php if (!$group): ?>
    <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-8 text-center">
        <p class="text-lg">Bestellung nicht gefunden.</p>
        <a href="orders" class="mt-4 inline-block rounded-xl bg-brand-blue px-5 py-2.5 font-semibold text-white">Neue Bestellung</a>
    </div>
<?php else: ?>
    <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-6 sm:p-8 text-center">
        <div class="text-4xl mb-2">✅</div>
        <p class="text-slate-600 dark:text-slate-300">Danke für Ihre Bestellung.</p>
        <p class="text-slate-600 dark:text-slate-300">Ihre Bestellnummer lautet:</p>
        <p class="my-3 text-4xl font-extrabold text-brand-blue dark:text-brand-green">#<?= e((string) $group->pk_order_group) ?></p>
        <p class="text-sm text-slate-500 dark:text-slate-400">Bitte weisen Sie diese Nummer bei der Abholung vor. Vielen Dank!</p>

        <?php
            $keys = array_keys($statuses);
            $currentIdx = array_search($group->status, $keys, true);
            if ($currentIdx === false) $currentIdx = 0;
        ?>
        <!-- Status timeline -->
        <ol class="mt-6 grid grid-cols-4 gap-2 text-xs">
            <?php foreach ($keys as $i => $key): ?>
                <li class="flex flex-col items-center gap-1">
                    <span class="h-7 w-7 grid place-items-center rounded-full font-bold
                        <?= $i <= $currentIdx ? 'bg-brand-blue text-white' : 'bg-slate-200 dark:bg-slate-700 text-slate-500' ?>">
                        <?= $i < $currentIdx ? '✓' : ($i + 1) ?>
                    </span>
                    <span class="<?= $i === $currentIdx ? 'font-semibold text-brand-blue dark:text-brand-green' : 'text-slate-500 dark:text-slate-400' ?>">
                        <?= e($statuses[$key]) ?>
                    </span>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>

    <!-- Order details -->
    <div class="mt-6 rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-6">
        <h3 class="font-semibold mb-3">Bestellübersicht</h3>
        <ul class="divide-y divide-slate-200 dark:divide-slate-700">
            <?php foreach ($group->sandwiches as $s): ?>
                <li class="py-2 flex items-start gap-3">
                    <span class="text-xl">🥪</span>
                    <div class="flex-1">
                        <div class="font-medium"><?= e($s->bread) ?>, <?= e($s->meat) ?>, <?= e($s->cheese) ?>, <?= e($s->sauce) ?></div>
                        <?php if (!empty($s->vegetables)): ?>
                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                <?= e(implode(', ', array_map(fn($v) => $v->label, $s->vegetables))) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">× <?= (int) $s->quantity ?></div>
                    <div class="font-semibold whitespace-nowrap">CHF <?= number_format((float) $s->unit_price * (int) $s->quantity, 2) ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-3 flex items-center justify-between border-t border-slate-200 dark:border-slate-700 pt-3">
            <span class="font-medium">Gesamt</span>
            <span class="text-lg font-bold">CHF <?= number_format((float) $group->total_price, 2) ?></span>
        </div>
        <div class="mt-5 flex flex-col sm:flex-row gap-3">
            <a href="track?id=<?= (int) $group->pk_order_group ?>"
               class="flex-1 text-center rounded-xl bg-brand-blue px-5 py-2.5 font-semibold text-white">Bestellung verfolgen</a>
            <a href="orders"
               class="flex-1 text-center rounded-xl px-5 py-2.5 font-semibold ring-1 ring-slate-300 dark:ring-slate-600 hover:bg-slate-100 dark:hover:bg-slate-700 transition">Neue Bestellung</a>
        </div>
    </div>
<?php endif; ?>
</section>

<?php include 'app/Controllers/inc/footer.inc.php'; ?>
