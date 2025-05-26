<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\SerializableClosure\UnsignedSerializableClosure;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BodyMetric>
 */
class BodyMetricFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => UserFactory::create(),
            'date' => fake()->date(),
            'body_fat' => fake()->numberBetween(1, 80),
            'muscle_mass' => fake()->numberBetween(1, 80),
        ];
    }
}
