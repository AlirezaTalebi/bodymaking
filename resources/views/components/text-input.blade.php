@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 text-black hover:text-custom_purple focus:border-custom_yellow focus:ring-custom_yellow rounded-md shadow-sm']) }}>
