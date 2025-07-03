<?php
/** @var \App\Livewire\Calendar $this */
?>

<div class="calendar-wrapper max-w-4xl mx-auto text-white">
    <!-- Week Navigation Bar -->
    <div
        class="calendar-week-bar sm:flex flex-wrap sm:flex-nowrap items-center justify-center sm:justify-between gap-3 mb-6 bg-zinc-800 rounded-lg p-3 border border-zinc-700">
        <!-- Previous Week Button -->
        <button wire:click="previousWeek"
                class="w-10 h-10 flex items-center justify-center rounded-full bg-zinc-700 hover:bg-yellow-400 text-yellow-400 hover:text-zinc-900 transition duration-200">
            <i class="fas fa-chevron-left"></i>
        </button>

        <!-- Week Days -->
        <div class="calendar-week-days flex gap-2 overflow-x-auto sm:overflow-visible flex-1 justify-center">
            @foreach($this->weekDays as $index => $day)
                <button
                    x-data="{
                    hovered: false,
                    isSelected: '{{ $day->isSameDay($selectedDate) ? 'true' : 'false' }}' === 'true'
                     }"
                    x-on:mouseenter="hovered = true"
                    x-on:mouseleave="hovered = false"

                    wire:click="selectDay({{ $index }})"
                        class="relative flex flex-col items-center px-2 py-2 rounded-md transition-all duration-200 text-xs sm:text-sm font-medium min-w-[3.5rem]
                        {{ $day->isSameDay($selectedDate)
                            ? 'bg-yellow-400 text-zinc-900 shadow-md'
                            : 'bg-zinc-700 hover:bg-yellow-400 hover:text-zinc-900 text-white border border-zinc-600' }}
                        {{ $day->isToday() ? 'ring-2 ring-orange-300' : '' }}">
                    <span class="uppercase tracking-wide mb-0.5">{{ $day->format('D') }}</span>
                    <span class="flex text-base font-bold">{{ $day->format('j') }}
                        @if(in_array($day->format('Y-m-d'), $workoutSessionDays))
                            <x-application-logo
                                x-bind:class="{'text-yellow-400': !hovered and !isSelected, 'text-zinc-900': hovered or isSelected } "
                                class="absolute bottom-0.5 right-1 h-2 w-4 fill-current"/>
                        @endif
                    </span>
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
                class="px-3 py-2 rounded-md bg-yellow-400 text-zinc-900 font-semibold hover:bg-yellow-300 whitespace-nowrap mt-2 sm:mt-0">
            {{ $selectedDate->format('M Y') }}
        </button>
    </div>

    <!-- Month Picker Modal -->
    @if($showMonthPicker)
        <div class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 px-4"
             wire:click="toggleMonthPicker">
            <div class="bg-zinc-900 text-white rounded-xl shadow-2xl p-4 sm:p-6 max-w-md w-full mx-auto"
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
                                        class="relative h-10 w-10 rounded-md text-sm font-semibold flex items-center justify-center
                                        {{ !$dayData['isCurrentMonth'] ? 'text-zinc-500' : 'hover:bg-yellow-400' }}
                                        {{ $dayData['isToday'] ? 'bg-orange-200 text-zinc-900 ring-2 ring-orange-300' : '' }}
                                        {{ $dayData['isSelected'] ? 'bg-yellow-400 text-zinc-900' : '' }}">
                                    {{ $dayData['date']->day }}
                                    @if($dayData['hasWorkoutSession'])
                                        <span class="absolute bottom-1 ">
                                            <x-application-logo
                                                x-bind:class="{'text-yellow-400': (!hovered && !isToday) && !isSelected, 'text-zinc-900': (hovered && isToday) && isCurrentMonth, 'text-white': (!isToday && hovered) && !isCurrentMonth }"
                                                class="h-2 w-4 fill-current text-yellow-400"/>
                                        </span>
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <!-- Close -->
                <div class="mt-6 flex justify-between items-center">
                    <span class="text-zinc-400 text-left" wire:init="countWorkoutSessionCurrentMonth">{{ __('general.workout_sessions') }}: {{ $workoutSessions }}</span>
                    <div class="flex justify-end">
                        <button wire:click="toggleMonthPicker"
                                class="px-4 py-2 bg-zinc-700 text-white hover:bg-zinc-600 rounded-md">
                            {{ __('general.close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
