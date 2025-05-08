@props(['href' => '#', 'margin'=> false])
@php
    $margin =  $margin ? (app()->isLocale('fa') ? 'mr-4 ' : 'ml-4 ') : '';
@endphp

<a href="{{ $href }}"
    {{ $attributes->merge([
         'class' => $margin . 'text-sm text-white hover:text-custom_yellow'
     ]) }}>
    {{ $slot }}
</a>
