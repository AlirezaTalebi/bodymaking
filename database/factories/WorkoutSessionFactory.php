<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkoutSession>
 */
class WorkoutSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => now()->sub(random_int(1, 100), 'days')->format('Y-m-d'),
            'duration' => fake()->numberBetween(1, 180),
            'notes' => fake()->text(),
        ];
    }
}
