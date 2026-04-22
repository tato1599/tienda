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
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            document.documentElement.setAttribute('data-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            document.documentElement.setAttribute('data-theme', 'light');
        }
    </script>
    <body class="font-sans bg-black" x-data="{ openSidebar: {{ $hideSidebar ? 'false' : 'true' }} }">
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
