<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'type' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'start_date' => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d H:i:s'),
            'due_date' => $this->faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d H:i:s'),
            'completion_date' => null,
            'status' => 'open',
        ];
    }
}
