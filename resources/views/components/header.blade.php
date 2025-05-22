@props(['header'])
<div>
    @if(isset($header))
        <h2 class="font-semibold text-xl text-yellow-400 leading-tight">
            {{ __('general.' . $header)}}
        </h2>
    @endif
</div>
