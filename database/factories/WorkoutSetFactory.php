<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkoutSet>
 */
class WorkoutSetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $temp = fake()->randomElement(['c', 'w', 'w']);
        $array = [
//            'workout_session_id' => WorkoutSessionFactory::create(),
            'exercise_id' => Exercise::factory(),
        ];

        if ($temp === 'c') {
            $array ['duration_sec'] = fake()->numberBetween(1, 180);
            return $array;
        }
        return array_merge($array, [
            'reps' => fake()->numberBetween(1, 30),
            'weight' => fake()->numberBetween(1, 100),
            'set_number' => fake()->numberBetween(1, 6),
        ]);
    }
}
