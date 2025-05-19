<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-5 py-2 rounded-md bg-yellow-400 text-black text-sm font-semibold uppercase tracking-widest
                    hover:bg-yellow-300 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition'
    ]) }}
>
    {{ $slot }}
</button>
