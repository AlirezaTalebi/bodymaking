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
    @livewireStyles
</head>

<body x-data="{ sidebarOpen: false, notificationsOpen: false }"
      class="font-sans antialiased bg-gradient-to-tr from-gray-950 to-zinc-900 text-gray-100">

<div class="min-h-screen flex flex-col">
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top navbar -->
            <header class="bg-zinc-900 text-yellow-400 border-b border-yellow-400 shadow-sm z-10">
                @include('layouts.navigation')
            </header>

            <!-- Page content -->
            <main class="flex-1 overflow-auto sm:p-6 p-2">
                {{-- Optional: wrap each page's content in a modern container --}}
                <div class="max-w-7xl mx-auto space-y-6">
                    <x-slot name="header">
                        @if(isset($header))
                            {{ $header }}
                        @endif
                    </x-slot>
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</div>
@livewireScripts
</body>
</html>
