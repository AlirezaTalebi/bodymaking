<div class="calendar-wrapper bg-gradient-to-br from-zinc-900 to-gray-800 rounded-lg p-4 max-w-4xl mx-auto text-white">
    <!-- Week Navigation Bar -->
    <div class="calendar-week-bar flex items-center justify-between mb-6 bg-zinc-800 rounded-lg p-3 border border-zinc-700">
        <!-- Previous Week Button -->
        <button wire:click="previousWeek"
                class="w-10 h-10 flex items-center justify-center rounded-full bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 transition duration-200">
            <i class="fas fa-chevron-left"></i>
        </button>

        <!-- Week Days -->
        <div class="calendar-week-days flex gap-2">
            @foreach($this->weekDays as $index => $day)
                <button wire:click="selectDay({{ $index }})"
                        class="flex flex-col items-center px-4 py-2 rounded-md transition-all duration-200 text-sm font-medium
                        {{ $day->isSameDay($selectedDate)
                            ? 'bg-yellow-400 text-zinc-900 shadow-md'
                            : 'bg-zinc-700 hover:bg-yellow-400 hover:text-zinc-900 text-white border border-zinc-600' }}
                        {{ $day->isToday() ? 'ring-2 ring-orange-300' : '' }}">
                    <span class="uppercase tracking-wide mb-0.5">{{ $day->format('D') }}</span>
                    <span class="text-lg font-bold">{{ $day->format('j') }}</span>
                </button>
            @endforeach
        </div>

        <!-- Next Week Button -->
        <button wire:click="nextWeek"
                class="w-10 h-10 flex items-center justify-center rounded-full bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 transition duration-200">
            <i class="fas fa-chevron-right"></i>
        </button>

        <!-- Month Picker Toggle -->
        <button wire:click="toggleMonthPicker"
                class="ml-4 px-4 py-2 rounded-md bg-yellow-400 text-zinc-900 font-semibold hover:bg-yellow-300">
            {{ $selectedDate->format('M Y') }}
        </button>
    </div>

    <!-- Month Picker Modal -->
    @if($showMonthPicker)
        <div class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50" wire:click="toggleMonthPicker">
            <div class="bg-zinc-900 text-white rounded-xl shadow-2xl p-6 max-w-md w-full mx-4" wire:click.stop>
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <button wire:click="previousMonth" class="w-8 h-8 bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 rounded-full flex items-center justify-center">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h3 class="text-lg font-bold">{{ $monthPickerDate->format('F Y') }}</h3>
                    <button wire:click="nextMonth" class="w-8 h-8 bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 rounded-full flex items-center justify-center">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Day Headers -->
                <div class="grid grid-cols-7 gap-1 text-center text-sm font-semibold text-zinc-400 mb-2">
                    @foreach(['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'] as $dayName)
                        <div>{{ $dayName }}</div>
                    @endforeach
                </div>

                <!-- Days -->
                <div class="space-y-1">
                    @foreach($this->monthDays as $week)
                        <div class="grid grid-cols-7 gap-1">
                            @foreach($week as $dayData)
                                <button wire:click="selectMonthDay({{ $dayData['date']->day }})"
                                        class="h-10 w-10 rounded-lg flex items-center justify-center text-sm font-semibold
                                        {{ !$dayData['isCurrentMonth'] ? 'text-zinc-500' : 'hover:bg-yellow-400 hover:text-zinc-900' }}
                                        {{ $dayData['isToday'] ? 'bg-orange-200 text-zinc-900 ring-2 ring-orange-300' : '' }}
                                        {{ $dayData['isSelected'] ? 'bg-yellow-400 text-zinc-900' : '' }}">
                                    {{ $dayData['date']->day }}
                                </button>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <!-- Close -->
                <div class="mt-6 text-right">
                    <button wire:click="toggleMonthPicker" class="px-4 py-2 bg-zinc-700 text-white hover:bg-zinc-600 rounded-md">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
