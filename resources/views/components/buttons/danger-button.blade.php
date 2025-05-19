<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center justify-center px-5 py-2 rounded-md bg-red-700 text-white text-sm font-bold uppercase tracking-wide
             hover:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition'
    ]) }}
>
    {{ $slot }}
</button>
