@props(['options' => [], 'name', 'selected' => null, 'placeholder' => null])

<div x-data="{ open: false, selected: '{{ $selected ? __("general.$selected") : __("general.$placeholder") }}' }" class="relative">
    <button
        @click="open = !open"
        type="button"
        class="bg-zinc-800 text-white border border-zinc-700 w-full px-4 py-2.5 rounded-md text-left flex justify-between items-center focus:border-yellow-400 focus:ring-yellow-400 transition"
    >
        <span x-text="selected" class="truncate"></span>
        <i :class="open ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"></i>
    </button>

    <div x-show="open" x-transition @click.outside="open = false" class="absolute mt-1 w-full z-50 rounded-md bg-zinc-800 border border-zinc-700">
        <ul class="py-1 text-sm text-white">
            @foreach ($options as $value => $label)
                <li>
                    <button type="button"
                            class="w-full text-left px-4 py-2 hover:bg-zinc-700"
                            @click="selected = '{{ __("general.$label") }}'; open = false; $refs.input.value = '{{ $label }}'">
                        {{ __("general.$label") }}
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <input type="hidden" name="{{ $name }}" x-ref="input" value="{{ $selected }}">
</div>
