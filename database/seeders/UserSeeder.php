<?php

namespace Database\Seeders;

use App\Models\BodyMetric;
use App\Models\Profile;
use App\Models\WorkoutSet;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WorkoutSession;
use App\Models\Calory;
use App\Models\Meal;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Exercise::factory()->count(10)->create(); // create 10 base exercises

        User::factory()
            ->count(20)
            ->has(Profile::factory())
            ->has(BodyMetric::factory()->count(5))
            ->has(
                WorkoutSession::factory()
                    ->count(3)
                    ->has(
                        WorkoutSet::factory()
                            ->count(5)
                            ->state(fn () => [
                                // Pick a random existing exercise
                                'exercise_id' => \App\Models\Exercise::inRandomOrder()->first()?->id
                            ])
                    )
            )
            ->has(Calory::factory()->count(5))
            ->has(Meal::factory()->count(4))
            ->create();
    }

}
