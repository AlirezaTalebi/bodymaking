@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-custom_yellow focus:ring-custom_yellow bg-[#fbe924] rounded-md shadow-sm']) }}>
