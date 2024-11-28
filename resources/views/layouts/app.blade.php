<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-cloak x-data="{
    darkMode: localStorage.getItem('darkMode') ||
        localStorage.setItem('darkMode', 'system'),
    toggleDarkMode() {
        this.darkMode = this.darkMode === 'light' ? 'dark' : this.darkMode === 'dark' ? 'system' : 'light';
    }
}" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
    x-bind:class="{
        'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)')
            .matches)
    }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? config('app.name', 'Notes') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div
        class="grid grid-rows-[auto,minmax(0,_1fr)] md:grid-cols-[auto,minmax(0,_1fr)] min-h-screen text-neutral-800 dark:text-neutral-200 bg-neutral-50 dark:bg-neutral-900">
        <x-navigation />

        <main class="md:max-h-screen overflow-y-auto overscroll-y-contain">
            <div class="p-6">
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewireScripts
</body>

</html>
