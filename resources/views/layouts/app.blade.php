<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <style>
            .material-symbols-outlined {
                font-variation-settings:
                    'FILL' 0,
                    'wght' 400,
                    'GRAD' 0,
                    'opsz' 24
            }
            /* Hide Alpine x-cloak elements before JS loads to prevent flash of undefined */
            [x-cloak] { display: none !important; }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <script>
        const theme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        document.documentElement.setAttribute('data-theme', theme);
        if (theme === 'dark') document.documentElement.classList.add('dark');

        // Sync dark class with DaisyUI data-theme
        const observer = new MutationObserver(() => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            if (currentTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });
    </script>
    <body class="font-sans bg-background" x-data="{ openSidebar: {{ $hideSidebar ? 'false' : 'true' }} }">
        <x-mary-toast position="bottom-end" />
        <x-banner />

        <x-headerTienda />

        <div class="min-h-screen">
            @if(!$hideSidebar)
                @auth
                    <x-sidebar />
                @endauth
            @endif

            <main class="transition-all duration-300 font-sans text-on-surface antialiased bg-background min-h-screen"
                  :class="{{ $hideSidebar ? "''" : "(openSidebar ? 'ml-64' : 'ml-20')" }}">
                <div class="p-8 {{ $hideSidebar ? 'max-w-7xl mx-auto' : '' }}">
                    {{ $slot }}
                </div>
            </main>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
