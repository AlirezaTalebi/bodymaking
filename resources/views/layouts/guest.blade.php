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
<body class="font-sans font-medium antialiased bg-zinc-950 text-gray-200">
<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-zinc-950">
    <div>
        <a href="/">
            <x-application-logo class="h-16 w-36 fill-current text-yellow-400"/>
        </a>
    </div>

    {{-- Language Icon --}}
    <div x-data="{ langMenu: false }" class="fixed right-8 top-2 text-yellow-400 z-50">
        <div @click="langMenu = !langMenu" class="cursor-pointer">
            <i class="fa-solid fa-earth text-2xl hover:text-red-500 transition" title="Language"></i>
        </div>

        <div
            x-show="langMenu"
            x-cloak
            x-transition
            class="fixed right-2 top-10 bg-zinc-800 text-white shadow-md rounded mt-2 border border-zinc-700"
        >
            <ul class="py-1 text-sm">
                @foreach(\App\Models\Language::getAvailableLanguages() as $key => $value)
                    <li class="w-full text-left px-4 py-2 hover:underline hover:text-yellow-400">
                        <a href="{{ route('lang', $key) }}">{{ $value }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="flex items-center justify-center sm:w-full">
        <div
            class="w-full items-center mx-auto sm:max-w-md mt-6 px-6 py-6 bg-gradient-to-br from-zinc-900 to-gray-800 text-white shadow-xl rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
