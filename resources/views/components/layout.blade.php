<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Martin Koudela">
    <title>ORBIS — Projekty {{ config('app.active_author', '') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        .top-page-line {
            background: linear-gradient(to right, #e31f22 20%, #e31f22 20%, #01a0e2 20%, #01a0e2 40%, #383084 20%, #383084 60%, #f0801a 20%, #f0801a 80%, #e31f22 20%, #e31f22 100%);
            content: '';
            height: 4px;
            right: 0;
            left: 0;
            top: 0;
        }

    </style>
</head>
<body class="min-h-screen bg-slate-1O0 text-slate-900">
<header class=" bg-slate-50 h-20 shadow-md sticky top-0 z-50">
    <div class="top-page-line"></div>
    <div class="small-12 columns flex items-center px-6 h-full relative">
        <div class="logo-holder">
            <a href="https://www.orbiszlin.cz/">
                <img src="/images/orbis-logo.png" alt="logo" style="height: 43px; width: auto;" class="ml-10">
            </a>
        </div>
        <div class="ml-auto pr-6">
            <select
                id="theme-switcher"
                class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 shadow-sm focus:border-[#01a0e2] focus:outline-none focus:ring-2 focus:ring-[#01a0e2]/20"
            >
                <option value="">Vybrat téma</option>
            </select>
        </div>
    </div>
</header>

{{ $slot }}

<footer class="mt-16 border-t border-slate-200 bg-white">
    <div
        class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-6 text-sm  sm:flex-row sm:items-center sm:justify-between">
        <a href="https://www.orbiszlin.cz/">
            <img src="/images/orbis-logo.png" alt="logo" style="height: 28px; width: auto;">
        </a>
        <p class="text-slate-500">© {{ date('Y') }} ORBIS</p>

        <div class="flex items-center gap-6">

            <span class="text-slate-500">design: &nbsp;&nbsp;{{ config('app.active_author', '') }}</span>
            <span class="flex items-center gap-1">
        <span class="text-slate-500">systém:</span>
        <a href="https://martinkoudela.com" class="inline-flex items-center gap-1 transition text-[#01a0e2] hover:text-[#008fc9] animate-pulse">
            <i class="fas fa-code w-4"></i>
             Martin Koudela
        </a>
    </span>
        </div>
    </div>
</footer>
<!-- Autor: Martin Koudela — https://martinkoudela.com -->


</body>
</html>
