<button
    {{ $attributes->merge([
        'class' =>
        'inline-flex items-center px-4 py-2 border border-gray-500 text-sm text-gray-300 rounded-md hover:bg-zinc-700 focus:ring-yellow-400 transition'
    ]) }}>
    {{ $slot }}
</button>
