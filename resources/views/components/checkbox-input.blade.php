@props(['disabled' => false])

<input type="checkbox" @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'rounded border-zinc-700 bg-zinc-800 text-red-600 focus:ring-yellow-400 focus:ring-2 focus:outline-none transition duration-150 ease-in-out'
    ]) }}>
