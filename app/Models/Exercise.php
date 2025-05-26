<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /** @use HasFactory<\Database\Factories\ExerciseFactory> */
    use HasFactory;

    public static function getAvailableExerciseTypes(): array
    {
        return [
            ['cardio', 'strength', 'endurance', 'weight lifting', 'other']
        ];
    }
}
