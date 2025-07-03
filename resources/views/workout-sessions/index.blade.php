@php
    $status = \App\Http\Controllers\WorkoutSessionController::checkWorkoutSessionCurrentMonth();
@endphp
<div>

    <p>{{ __('general.you_have_exercises_in_month', ['count' => $status['workoutSessionsCount']['count'], 'month' => $status['workoutSessionsCount']['month'] ]) }}</p>

</div>
