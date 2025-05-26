<div class="calendar-wrapper rounded-lg p-2 w-full max-w-xl mx-auto text-white sm:hidden">
    <!-- Week Navigation -->
    <div class="space-y-4">
        <!-- Row 1: Mo - Thu -->
        <div class="flex justify-center gap-2">
            @foreach($this->weekDays as $index => $day)
                @if($index <= 3)
                    <button wire:click="selectDay({{ $index }})"
                            class="flex flex-col items-center px-3 py-2 rounded-md text-xs font-medium transition duration-200
                            {{ $day->isSameDay($selectedDate)
                                ? 'bg-yellow-400 text-zinc-900 shadow-md'
                                : 'bg-zinc-700 hover:bg-yellow-400 hover:text-zinc-900 text-white border border-zinc-600' }}
                            {{ $day->isToday() ? 'ring-2 ring-orange-300' : '' }}">
                        <span class="uppercase tracking-wide">{{ $day->format('D') }}</span>
                        <span class="text-xs font-bold">{{ $day->format('j') }}</span>
                    </button>
                @endif
            @endforeach
        </div>

        <!-- Row 2: Fri - Sun -->
        <div class="flex justify-center gap-2">
            @foreach($this->weekDays as $index => $day)
                @if($index > 3)
                    <button wire:click="selectDay({{ $index }})"
                            class="flex flex-col items-center px-3 py-2 rounded-md text-xs font-medium transition duration-200
                            {{ $day->isSameDay($selectedDate)
                                ? 'bg-yellow-400 text-zinc-900 shadow-md'
                                : 'bg-zinc-700 hover:bg-yellow-400 hover:text-zinc-900 text-white border border-zinc-600' }}
                            {{ $day->isToday() ? 'ring-2 ring-orange-300' : '' }}">
                        <span class="uppercase tracking-wide">{{ $day->format('D') }}</span>
                        <span class="text-xs font-bold">{{ $day->format('j') }}</span>
                    </button>
                @endif
            @endforeach
        </div>

        <!-- Row 3: Prev / Month / Next -->
        <div class="flex justify-center gap-4 pt-2">
            <button wire:click="previousWeek"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 transition duration-200">
                <i class="fas fa-chevron-left"></i>
            </button>

            <button wire:click="toggleMonthPicker"
                    class="px-4 py-2 rounded-md bg-yellow-400 text-zinc-900 font-semibold hover:bg-yellow-300">
                {{ $selectedDate->format('M Y') }}
            </button>

            <button wire:click="nextWeek"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 transition duration-200">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
