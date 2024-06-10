<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_activity()
    {
        $user = User::factory()->create();

        $data = [
            'title' => 'Test Activity',
            'type' => 'Custom Type',
            'description' => 'Description for test activity',
            'user_id' => $user->id,
            'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'due_date' => Carbon::now()->addDay()->format('Y-m-d H:i:s'),
            'status' => 'open',
        ];

        $response = $this->postJson('/api/activities', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Test Activity']);
    }

    public function test_can_update_activity()
    {
        $activity = Activity::factory()->create();
        $data = [
            'title' => 'Updated Activity',
            'status' => 'open'
        ];

        $response = $this->putJson("/api/activities/{$activity->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Updated Activity']);
    }

    public function test_can_delete_activity()
    {
        $activity = Activity::factory()->create();

        $response = $this->deleteJson("/api/activities/{$activity->id}");

        $response->assertStatus(204);
    }

    public function test_can_list_activities()
    {
        Activity::factory()->count(5)->create();

        $response = $this->getJson('/api/activities');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => ['id', 'title', 'type', 'description', 'user_id', 'start_date', 'due_date', 'completion_date', 'status', 'created_at', 'updated_at']
                 ]);
    }

    public function test_can_show_activity()
    {
        $activity = Activity::factory()->create();

        $response = $this->getJson("/api/activities/{$activity->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => $activity->title]);
    }
}
