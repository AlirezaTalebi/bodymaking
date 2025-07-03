<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutSessionController extends Controller
{
    public static function checkWorkoutSessionCurrentMonth($month = null, $year = null): array
    {
        $user = request()->user();

        $sessions = $user->workoutSessions()
            ->whereMonth('date', is_null($month) ? now()->month : $month)
            ->whereYear('date', is_null($year) ? now()->year : $year)
            ->orderBy('date')
            ->get(['date']);

        $count = $sessions->count();
        $currentMonth = now()->format('F');

        return [
            'hasWorkoutSession' => $count > 0,
            'workoutSessionsCount' => [
                'count' => $count,
                'month' => $currentMonth,
            ],
        ];
    }

}
