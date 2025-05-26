<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercise extends Model
{
    /** @use HasFactory<\Database\Factories\ExerciseFactory> */
    use HasFactory;

    public static function getAvailableExerciseTypes(): array
    {
        return [
            'cardio', 'strength', 'endurance', 'weight lifting', 'other'
        ];
    }

    public function workoutSets(): hasMany
    {
        return $this->hasMany(WorkoutSet::class);
    }
}
