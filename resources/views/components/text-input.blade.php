@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
        'class' =>
            'bg-zinc-800 border border-zinc-700 text-white placeholder-gray-400
             focus:border-yellow-400 focus:ring-yellow-400
             rounded-md shadow-sm w-full px-4 py-2 transition duration-200 ease-in-out'
    ]) }}
/>
