<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-white bg-custom_yellow " x-data="{ openMenu: false }" >
<!-- Fixed Sidebar -->
@include('layouts.navigation')

<!-- Main Content -->
<div class="min-h-screen flex flex-col md:flex-row" :class="{ 'sm:ml-[24.99999999%] md:ml-[16.99999999%]': openMenu, 'sm:ml-[4%]': !openMenu }">
    <main class="w-full p-4">
        {{ $slot }}
    </main>
</div>
</body>
</html>
