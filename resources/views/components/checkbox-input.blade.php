@props(['disabled' => false])

<input type="checkbox" @disabled($disabled) {{ $attributes->merge(['class' => 'rounded border-custom_yellow focus:outline-none text-custom_yellow shadow-sm focus:ring-custom_yellow']) }}>
