<?php include 'app/Controllers/inc/header.inc.php'; ?>

<section class="max-w-2xl mx-auto text-center">
    <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-8 sm:p-10">
        <div class="text-5xl mb-4">🥪</div>
        <h2 class="text-2xl font-bold mb-3">Willkommen bei SandwichSurf</h2>
        <p class="text-slate-600 dark:text-slate-300 mb-2">
            Stellen Sie Ihr Sandwich nach Wunsch zusammen und holen Sie es bei uns ab.
        </p>
        <p class="text-slate-600 dark:text-slate-300 mb-6">Vielen Dank für Ihren Auftrag.</p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="orders"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-blue px-6 py-3 font-semibold text-white shadow hover:bg-brand-blue/90 active:scale-95 transition">
                Weiter zur Bestellung →
            </a>
            <a href="track"
               class="inline-flex items-center justify-center gap-2 rounded-xl px-6 py-3 font-semibold text-brand-blue dark:text-brand-green ring-1 ring-brand-blue/40 hover:bg-brand-blue/5 transition">
                Bestellung verfolgen
            </a>
        </div>
    </div>
</section>

<?php include 'app/Controllers/inc/footer.inc.php'; ?>
