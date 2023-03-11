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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
</head>

<body class="font-sans text-slate-50 bg-gray-900 antialiased">
    <main class="grid-cols-8 grid">
        {{-- @include('layouts.sidebar') --}}
        
        <div class="col-span-8">
            @include('layouts.nav')

            @yield('content')
        </div>
    </main>
    @livewire('notifications')
</body>

</html>
