<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
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
            'time' => fake()->time(),
            'meal_type' => fake()->randomElement(Meal::getAvailableMealTypes()),
            'food_name' => fake()->name(),
            'calories' => fake()->numberBetween(10, 1500),
            'protein_g' => fake()->numberBetween(1, 100),
            'fat_g' => fake()->numberBetween(1, 100),
            'carbs_g' => fake()->numberBetween(1, 100),
        ];
    }
}
