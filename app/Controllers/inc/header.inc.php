<!DOCTYPE html>
<html lang="de" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SandwichSurf</title>

    <!-- Set the theme before paint to avoid a flash of the wrong mode. -->
    <script>
        (function () {
            try {
                var t = localStorage.getItem('theme');
                if (t === 'dark' || (!t && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                }
            } catch (e) {}
        })();
    </script>

    <!-- Tailwind CSS via the Play CDN (no build step). Brand palette preserved. -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: { blue: '#2e6ff1', green: '#41f010' },
                    },
                    fontFamily: {
                        sans: ['ui-sans-serif', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica', 'Arial', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>

<body class="min-h-screen flex flex-col bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-slate-100 font-sans antialiased">

<!-- Top bar: nav + theme toggle -->
<header class="sticky top-0 z-30 bg-white/80 dark:bg-slate-900/80 backdrop-blur border-b border-slate-200 dark:border-slate-700">
    <nav class="max-w-5xl mx-auto flex items-center gap-2 px-4 py-2 text-sm">
        <a href="home" class="font-bold text-brand-blue dark:text-brand-green">SandwichSurf</a>
        <div class="flex-1"></div>
        <a href="orders" class="px-3 py-1.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition">Bestellen</a>
        <a href="track" class="px-3 py-1.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition">Verfolgen</a>
        <?php if (function_exists('currentStaffId') && currentStaffId() !== null): ?>
            <a href="overview" class="px-3 py-1.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition">Übersicht</a>
            <a href="logout" class="px-3 py-1.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition">Logout</a>
        <?php else: ?>
            <a href="login" class="px-3 py-1.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition">Login</a>
        <?php endif; ?>
        <button type="button" onclick="toggleTheme()" aria-label="Theme wechseln"
                class="ml-1 h-9 w-9 grid place-items-center rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
            <span class="hidden dark:inline">☀️</span><span class="inline dark:hidden">🌙</span>
        </button>
    </nav>
</header>

<!-- Brand band (preserves the original blue/green identity) -->
<div class="border-t-4 border-b-4 border-brand-blue bg-brand-green h-2"></div>
<div class="bg-brand-blue">
    <h1 class="text-center font-bold tracking-wide text-brand-green py-8 sm:py-12 m-0 text-4xl sm:text-6xl">SANDWICHSURF</h1>
</div>
<div class="border-t-4 border-b-4 border-brand-blue bg-brand-green h-2"></div>

<main class="flex-1 w-full max-w-5xl mx-auto px-4 py-8">

<script>
    function toggleTheme() {
        var root = document.documentElement;
        var dark = root.classList.toggle('dark');
        try { localStorage.setItem('theme', dark ? 'dark' : 'light'); } catch (e) {}
    }
</script>
