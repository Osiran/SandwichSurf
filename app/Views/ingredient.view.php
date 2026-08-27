<?php include 'app/Controllers/inc/header.inc.php'; ?>

<h2 class="text-2xl font-bold mb-1">Zutaten</h2>
<p class="text-slate-600 dark:text-slate-300 mb-6">Übersicht aller verfügbaren Zutaten und Preise.</p>

<?php
    $sections = [
        ['title' => 'Brote',    'items' => $breadArray],
        ['title' => 'Käse',     'items' => $cheeseArray],
        ['title' => 'Fleisch',  'items' => $meatArray],
        ['title' => 'Saucen',   'items' => $sauceArray],
        ['title' => 'Beilagen', 'items' => $vegetablesArray],
    ];
?>
<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($sections as $section): ?>
        <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-5">
            <h3 class="font-semibold mb-3 text-brand-blue dark:text-brand-green"><?= e($section['title']) ?></h3>
            <ul class="divide-y divide-slate-200 dark:divide-slate-700">
                <?php foreach ($section['items'] as $item): ?>
                    <li class="flex items-center justify-between py-2 text-sm">
                        <span><?= e($item->label) ?></span>
                        <span class="text-slate-500 dark:text-slate-400">CHF <?= number_format((float) $item->price, 2) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>

<div class="mt-6">
    <a href="overview" class="inline-flex rounded-xl px-5 py-2.5 font-semibold ring-1 ring-slate-300 dark:ring-slate-600 hover:bg-slate-100 dark:hover:bg-slate-700 transition">Zur Bestellübersicht</a>
</div>

<?php include 'app/Controllers/inc/footer.inc.php'; ?>
