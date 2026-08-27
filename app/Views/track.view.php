<?php include 'app/Controllers/inc/header.inc.php'; ?>

<section class="max-w-2xl mx-auto space-y-6">
    <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-6 sm:p-8">
        <h2 class="text-xl font-bold mb-1">Bestellung verfolgen</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mb-5">Geben Sie Ihre Bestellnummer ein.</p>
        <form action="track" method="GET" class="flex flex-col sm:flex-row gap-3">
            <input type="number" name="id" min="1" required placeholder="z. B. 1"
                   value="<?= isset($_GET['id']) ? e((string) $_GET['id']) : '' ?>"
                   class="flex-1 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-blue/50">
            <button type="submit" class="rounded-xl bg-brand-blue px-6 py-2.5 font-semibold text-white shadow hover:bg-brand-blue/90 active:scale-95 transition">
                Suchen
            </button>
        </form>

        <?php if (!empty($notFound)): ?>
            <p class="mt-4 rounded-lg bg-amber-50 dark:bg-amber-950/40 ring-1 ring-amber-200 dark:ring-amber-900 p-3 text-sm text-amber-800 dark:text-amber-300">
                Keine Bestellung mit dieser Nummer gefunden.
            </p>
        <?php endif; ?>
    </div>

    <?php if (!empty($group)):
        $keys = array_keys($statuses);
        $currentIdx = array_search($group->status, $keys, true);
        if ($currentIdx === false) $currentIdx = 0;
    ?>
    <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-6 sm:p-8">
        <div class="flex items-center justify-between mb-4">
            <span class="text-sm text-slate-500 dark:text-slate-400">Bestellung</span>
            <span class="text-2xl font-extrabold text-brand-blue dark:text-brand-green">#<?= (int) $group->pk_order_group ?></span>
        </div>

        <!-- Vertical status timeline -->
        <ol class="relative border-s-2 border-slate-200 dark:border-slate-700 ms-3 space-y-6">
            <?php foreach ($keys as $i => $key): ?>
                <li class="ms-6">
                    <span class="absolute -start-[11px] grid h-5 w-5 place-items-center rounded-full text-[10px] font-bold
                        <?= $i <= $currentIdx ? 'bg-brand-blue text-white' : 'bg-slate-200 dark:bg-slate-700 text-slate-500' ?>">
                        <?= $i < $currentIdx ? '✓' : '' ?>
                    </span>
                    <p class="<?= $i === $currentIdx ? 'font-semibold text-brand-blue dark:text-brand-green' : ($i < $currentIdx ? 'text-slate-700 dark:text-slate-200' : 'text-slate-400') ?>">
                        <?= e($statuses[$key]) ?>
                        <?php if ($i === $currentIdx): ?><span class="ml-2 text-xs rounded-full bg-brand-blue/10 text-brand-blue dark:text-brand-green px-2 py-0.5">aktuell</span><?php endif; ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ol>

        <div class="mt-6 border-t border-slate-200 dark:border-slate-700 pt-4 text-sm text-slate-600 dark:text-slate-300">
            <?php if (!empty($group->customer_name)): ?><p>Name: <span class="font-medium"><?= e($group->customer_name) ?></span></p><?php endif; ?>
            <p><?= count($group->sandwiches) ?> Sandwich(es) · Gesamt <span class="font-semibold">CHF <?= number_format((float) $group->total_price, 2) ?></span></p>
        </div>
    </div>
    <?php endif; ?>
</section>

<?php include 'app/Controllers/inc/footer.inc.php'; ?>
