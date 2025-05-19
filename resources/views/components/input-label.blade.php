@props(['value'])

<label
    {{ $attributes->merge([
        'class' => 'block text-sm font-medium text-gray-300 mb-1'
    ]) }}
>
    {{ $value ?? $slot }}
</label>
