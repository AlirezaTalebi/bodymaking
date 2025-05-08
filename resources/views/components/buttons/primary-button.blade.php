@props(['margin'=> false])
@php
    $margin =  $margin ? (app()->isLocale('fa') ? 'mr-4 ' : 'ml-4 ') : '';
@endphp

<button {{ $attributes->merge(['type' => 'submit',
    'class' => $margin . 'text-sm text-white hover:text-custom_yellow']) }}>
    {{ $slot }}
</button>
