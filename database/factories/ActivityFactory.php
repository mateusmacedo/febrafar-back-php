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
        $startDate = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $dueDate = $this->faker->dateTimeBetween('+1 month', '+2 months');

        // Check if start_date is a weekend
        if ($startDate->format('N') >= 6) {
            $startDate = $startDate->modify('next monday');
        }

        // Check if due_date is a weekend
        if ($dueDate->format('N') >= 6) {
            $dueDate = $dueDate->modify('next monday');
        }

        return [
            'title' => $this->faker->sentence,
            'type' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'start_date' => $startDate->format('Y-m-d H:i:s'),
            'due_date' => $dueDate->format('Y-m-d H:i:s'),
            'completion_date' => null,
            'status' => 'open',
        ];
    }
}
