<button {{ $attributes->merge(['type' => 'submit',
    'class' => 'focus:outline-none text-black bg-white hover:text-custom_purple hover:bg-custom_yellow focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 py-2.5 me-2 mb-2']) }}>
    {{ $slot }}
</button>
