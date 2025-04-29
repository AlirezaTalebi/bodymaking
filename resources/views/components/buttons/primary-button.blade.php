<button {{ $attributes->merge(['type' => 'submit',
    'class' => (app()->isLocale("fa") ? 'mr-4' : 'ml-4') . ' underline text-sm text-white hover:text-custom_yellow']) }}>
    {{ $slot }}
</button>
