@props(['href' => '#'])

<a href="{{ $href }}"
    {{ $attributes->merge([
         'class' => 'mr-2 text-sm text-white hover:text-custom_yellow'
     ]) }}>
    {{ $slot }}
</a>
