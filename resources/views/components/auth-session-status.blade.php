@props(['status'])

@if ($status)
    <div {{ $attributes->merge([
        'class' => 'text-sm font-medium text-green-400 bg-zinc-800 border border-green-500 px-4 py-2 rounded-md shadow'
    ]) }}>
        {{ $status }}
    </div>
@endif
