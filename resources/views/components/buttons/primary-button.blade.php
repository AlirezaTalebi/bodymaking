<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center justify-center px-5 py-2 rounded-md bg-red-600 text-white text-sm font-semibold uppercase tracking-widest
             hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition'
    ]) }}
>
    {{ $slot }}
</button>
