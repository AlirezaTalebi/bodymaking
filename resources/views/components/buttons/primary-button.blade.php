<button {{ $attributes->merge(['type' => 'submit',
    'class' => 'mr-2 text-sm text-white hover:text-custom_yellow']) }}>
    {{ $slot }}
</button>
