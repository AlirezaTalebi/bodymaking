<?php
/** @var \App\Livewire\Calendar $this */
?>

<div class="calendar-wrapper rounded-lg p-2 w-full max-w-xl mx-auto text-white sm:hidden">
    <!-- Week Navigation -->
    <div class="space-y-4">
        <!-- Row 1: All Days (Mo - Sun) -->
        <div class="flex justify-center gap-2">
            @foreach($this->weekDays as $index => $day)
                <button
                   x-data="{
                    hovered: false,
                    isSelected: '{{ $day->isSameDay($selectedDate) ? 'true' : 'false' }}' === 'true'
                     }"
                    x-on:mouseenter="hovered = true"
                    x-on:mouseleave="hovered = false"
                    wire:click="selectDay({{ $index }})"
                    class="relative flex flex-col items-center px-2 py-2 rounded-md text-xs font-medium transition duration-200
                    {{ $day->isSameDay($selectedDate)
                        ? 'bg-yellow-400 text-zinc-900 shadow-md'
                        : 'bg-zinc-700 hover:bg-yellow-400 hover:text-zinc-900 text-white border border-zinc-600' }}
                    {{ $day->isToday() ? 'ring-2 ring-orange-300' : '' }}">
                    <span class="uppercase tracking-wide">{{ $day->format('D') }}</span>
                    <span class="text-xs font-bold">{{ $day->format('j') }}
                        @if(in_array($day->format('Y-m-d'), $workoutSessionDays))
                            <x-application-logo
                                x-bind:class="{'text-yellow-400': !hovered and !isSelected, 'text-zinc-900': hovered or isSelected } "
                                class="absolute bottom-0.5 right-0.5 h-2 w-4 fill-current"/>
                        @endif
                    </span>
                </button>
            @endforeach
        </div>

        <!-- Row 2: Prev / Month / Next -->
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

    <!-- Month Picker Modal -->
    @if($showMonthPicker)
        <div class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 px-4"
             wire:click="toggleMonthPicker">
            <div class="bg-zinc-900 text-white rounded-xl shadow-2xl p-4 w-full max-w-sm mx-auto"
                 wire:click.stop>
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <button wire:click="previousMonth"
                            class="w-8 h-8 bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 rounded-full flex items-center justify-center">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h3 class="text-lg font-bold">{{ $monthPickerDate->format('F Y') }}</h3>
                    <button wire:click="nextMonth"
                            class="w-8 h-8 bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 rounded-full flex items-center justify-center">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Day Headers -->
                <div class="grid grid-cols-7 gap-1 text-center text-xs font-semibold text-zinc-400 mb-2">
                    @foreach(['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'] as $dayName)
                        <div>{{ $dayName }}</div>
                    @endforeach
                </div>

                <!-- Days -->
                <div class="space-y-1">
                    @foreach($this->monthDays as $week)
                        <div class="grid grid-cols-7 gap-1">
                            @foreach($week as $dayData)
                                <button
                                    x-data="{
                                hovered: false,
                                isToday: {{ json_encode($dayData['isToday']) }},
                                isCurrentMonth: {{ json_encode($dayData['isCurrentMonth']) }},
                                isSelected: {{ json_encode($dayData['isSelected'])}}
                                 }"
                                    x-on:mouseenter="hovered = true"
                                    x-on:mouseleave="hovered = false"
                                    wire:click="selectMonthDay({{ $dayData['date']->day }})"
                                    class="relative h-8 w-8 rounded-md text-xs font-semibold flex items-center justify-center
                                    {{ !$dayData['isCurrentMonth'] ? 'text-zinc-500' : 'hover:bg-yellow-400' }}
                                    {{ $dayData['isToday'] ? 'bg-orange-200 text-zinc-900 ring-2 ring-orange-300' : '' }}
                                    {{ $dayData['isSelected'] ? 'bg-yellow-400 text-zinc-900' : '' }}">
                                    {{ $dayData['date']->day }}
                                    @if($dayData['hasWorkoutSession'])
                                        <span class="absolute bottom-0.5">
                                            <x-application-logo
                                                x-bind:class="{'text-yellow-400': (!hovered && !isToday) && !isSelected, 'text-zinc-900': (hovered && isToday) && isCurrentMonth, 'text-white': (!isToday && hovered) && !isCurrentMonth }"
                                                class="h-1.5 w-3 fill-current text-yellow-400"/>
                                        </span>
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <!-- Close -->
                <div class="mt-4 text-right">
                    <button wire:click="toggleMonthPicker"
                            class="px-3 py-1.5 bg-zinc-700 text-white hover:bg-zinc-600 rounded-md text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
