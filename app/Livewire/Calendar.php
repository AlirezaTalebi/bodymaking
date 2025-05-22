<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Calendar extends Component
{
    public $currentWeekStart;
    public $selectedDate;
    public $showMonthPicker = false;
    public $monthPickerDate;

    // For future task functionality
    public $tasksData = []; // Will contain dates with tasks

    public function mount()
    {
        $this->selectedDate = Carbon::now();
        $this->currentWeekStart = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $this->monthPickerDate = Carbon::now()->startOfMonth();
    }

    public function previousWeek()
    {
        $this->currentWeekStart = $this->currentWeekStart->copy()->subWeek();
        $this->updateSelectedDate();
    }

    public function nextWeek()
    {
        $this->currentWeekStart = $this->currentWeekStart->copy()->addWeek();
        $this->updateSelectedDate();
    }

    public function selectDay($dayIndex)
    {
        $this->selectedDate = $this->currentWeekStart->copy()->addDays($dayIndex);
    }

    public function toggleMonthPicker()
    {
        $this->showMonthPicker = !$this->showMonthPicker;
        if ($this->showMonthPicker) {
            $this->monthPickerDate = $this->selectedDate->copy()->startOfMonth();
        }
    }

    public function selectMonthDay($day)
    {
        $selectedDate = $this->monthPickerDate->copy()->day($day);
        $this->selectedDate = $selectedDate;
        $this->currentWeekStart = $selectedDate->copy()->startOfWeek(Carbon::MONDAY);
        $this->showMonthPicker = false;
    }

    public function previousMonth()
    {
        $this->monthPickerDate = $this->monthPickerDate->copy()->subMonth();
    }

    public function nextMonth()
    {
        $this->monthPickerDate = $this->monthPickerDate->copy()->addMonth();
    }

    private function updateSelectedDate()
    {
        // Keep selected date within the current week if possible
        if ($this->selectedDate->lt($this->currentWeekStart) ||
            $this->selectedDate->gt($this->currentWeekStart->copy()->endOfWeek())) {
            $this->selectedDate = $this->currentWeekStart->copy();
        }
    }

    public function getWeekDaysProperty()
    {
        $days = [];
        for ($i = 0; $i < 7; $i++) {
            $days[] = $this->currentWeekStart->copy()->addDays($i);
        }
        return $days;
    }

    public function getMonthDaysProperty()
    {
        $startOfMonth = $this->monthPickerDate->copy()->startOfMonth();
        $endOfMonth = $this->monthPickerDate->copy()->endOfMonth();
        $startOfWeek = $startOfMonth->copy()->startOfWeek(Carbon::MONDAY);

        $days = [];
        $current = $startOfWeek->copy();

        // Get all days to fill the calendar grid (6 weeks)
        for ($week = 0; $week < 6; $week++) {
            $weekDays = [];
            for ($day = 0; $day < 7; $day++) {
                $weekDays[] = [
                    'date' => $current->copy(),
                    'isCurrentMonth' => $current->month === $this->monthPickerDate->month,
                    'isToday' => $current->isToday(),
                    'isSelected' => $current->isSameDay($this->selectedDate),
                    'hasTask' => $this->hasTask($current), // For future use
                ];
                $current->addDay();
            }
            $days[] = $weekDays;

            // Stop if we've passed the end of month and filled at least 4 weeks
            if ($week >= 3 && $current->gt($endOfMonth)) {
                break;
            }
        }

        return $days;
    }

    // For future task functionality
    private function hasTask($date)
    {
        return in_array($date->format('Y-m-d'), $this->tasksData);
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
