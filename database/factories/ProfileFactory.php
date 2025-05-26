<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'height' => fake()->numberBetween(150, 250),
            'weight' => fake()->numberBetween(50, 150),
            'goal_weight' => fake()->numberBetween(50, 150),
        ];
    }
}
