@props(['title' => null])

<div {{ $attributes->merge(['class' => 'p-6 sm:p-8 bg-gradient-to-br from-zinc-900 to-gray-800 shadow-2xl rounded-xl text-white']) }}>
    @if ($title)
        <div class="mb-4 border-b border-zinc-700 pb-2">
            <h3 class="text-lg font-semibold text-yellow-400">{{ $title }}</h3>
        </div>
    @endif

    {{ $slot }}
</div>
