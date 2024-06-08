<?php

namespace Tests\Unit\Models;

use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_an_activity()
    {
        $user = User::factory()->create();

        $activity = Activity::factory()->create([
            'title' => 'New Activity',
            'type' => 'task',
            'description' => 'This is a test activity',
            'user_id' => $user->id,
            'start_date' => Carbon::now(),
            'due_date' => Carbon::now()->addDays(2),
            'status' => 'open', // Corrigido para um valor válido
        ]);

        $this->assertDatabaseHas('activities', [
            'title' => 'New Activity',
            'type' => 'task',
            'description' => 'This is a test activity',
            'user_id' => $user->id,
            'status' => 'open', // Corrigido para um valor válido
        ]);

        $this->assertInstanceOf(Activity::class, $activity);
    }

    public function test_it_checks_for_overlapping_activities()
    {
        $user = User::factory()->create();

        Activity::factory()->create([
            'user_id' => $user->id,
            'start_date' => Carbon::now(),
            'due_date' => Carbon::now()->addDays(2),
        ]);

        $overlappingActivity = Activity::checkOverlapping($user->id, Carbon::now()->addDay(), Carbon::now()->addDays(3));
        $this->assertTrue($overlappingActivity);

        $nonOverlappingActivity = Activity::checkOverlapping($user->id, Carbon::now()->addDays(3), Carbon::now()->addDays(4));
        $this->assertFalse($nonOverlappingActivity);
    }

    public function test_it_filters_activities_based_on_date()
    {
        $user = User::factory()->create();

        $activity1 = Activity::factory()->create([
            'user_id' => $user->id,
            'start_date' => Carbon::now()->subDays(2),
            'due_date' => Carbon::now()->addDay(),
        ]);

        $activity2 = Activity::factory()->create([
            'user_id' => $user->id,
            'start_date' => Carbon::now()->addDay(),
            'due_date' => Carbon::now()->addDays(2),
        ]);

        $filteredActivities = Activity::filter([
            'startDate' => Carbon::now()->subDays(3),
            'endDate' => Carbon::now()->addDays(3),
        ])->get();

        $this->assertCount(2, $filteredActivities);
        $this->assertTrue($filteredActivities->contains($activity1));
        $this->assertTrue($filteredActivities->contains($activity2));
    }
}

