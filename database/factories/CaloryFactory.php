<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calory>
 */
class CaloryFactory extends Factory
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
            'calories_eaten' => fake()->numberBetween(1, 100),
            'calories_burned' => fake()->numberBetween(1, 3000),
            'calories_left' => fake()->numberBetween(1, 3000),
            'calories_goal' => fake()->numberBetween(1, 3000),
            'protein_g' => fake()->numberBetween(1, 100),
            'fat_g' => fake()->numberBetween(1, 100),
            'carbs_g' => fake()->numberBetween(1, 100),
        ];
    }
}
