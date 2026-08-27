<?php include 'app/Controllers/inc/header.inc.php'; ?>

<section class="max-w-md mx-auto">
    <div class="rounded-2xl bg-white dark:bg-slate-800 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 p-6 sm:p-8">
        <h2 class="text-xl font-bold mb-1">Mitarbeiter-Login</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mb-5">Bitte loggen Sie sich hier ein.</p>

        <?php if (!empty($errors)): ?>
            <div class="mb-4 rounded-lg bg-red-50 dark:bg-red-950/40 ring-1 ring-red-200 dark:ring-red-900 p-3 text-sm text-red-700 dark:text-red-300">
                <?php foreach ($errors as $e) { ?>
                    <p><?= e($e) ?></p>
                <?php } ?>
            </div>
        <?php endif; ?>

        <form action="loginControl" method="POST" class="space-y-4">
            <div>
                <label for="pk_staffId" class="block text-sm font-medium mb-1">ID</label>
                <input type="text" name="pk_staffId" id="pk_staffId" required
                       class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-blue/50">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium mb-1">Passwort</label>
                <input type="password" name="password" id="password" required
                       class="w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-blue/50">
            </div>
            <div class="flex flex-col sm:flex-row gap-3 pt-1">
                <button type="submit"
                        class="flex-1 rounded-xl bg-brand-blue px-4 py-2.5 font-semibold text-white shadow hover:bg-brand-blue/90 active:scale-95 transition">
                    Absenden
                </button>
                <a href="home"
                   class="flex-1 text-center rounded-xl px-4 py-2.5 font-semibold ring-1 ring-slate-300 dark:ring-slate-600 hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                    Zurück zur Homepage
                </a>
            </div>
        </form>
    </div>
</section>

<?php include 'app/Controllers/inc/footer.inc.php'; ?>
