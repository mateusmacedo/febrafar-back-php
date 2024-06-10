<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @var User
     */
    protected User $user;
    protected array $headers;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $token = $this->user->createToken('auth_token')->plainTextToken;
        $this->headers = ['Authorization' => "Bearer $token"];
    }

    private function getNextWeekday(Carbon $date): Carbon
    {
        while (in_array($date->dayOfWeek, [CarbonInterface::SATURDAY, CarbonInterface::SUNDAY], true)) {
            $date->addDay();
        }
        return $date;
    }

    public function test_can_create_activity(): void
    {
        $startDate = $this->getNextWeekday(Carbon::now()->next(CarbonInterface::MONDAY));
        $data = [
            'title' => $this->faker->sentence,
            'type' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'start_date' => $startDate->format('Y-m-d H:i:s'),
            'due_date' => $startDate->copy()->addDay()->format('Y-m-d H:i:s'),
            'status' => 'open',
        ];

        $response = $this->postJson('/api/activities', $data, $this->headers);

        $response->assertStatus(201)
            ->assertJsonFragment(['title' => $data['title']]);
    }

    public function test_can_update_activity(): void
    {
        $activity = Activity::factory()->create(['user_id' => $this->user->id]);
        $data = [
            'title' => $this->faker->sentence,
            'status' => 'open',
        ];

        $response = $this->putJson("/api/activities/{$activity->id}", $data, $this->headers);

        $response->assertStatus(200)
            ->assertJsonFragment(['title' => $data['title']]);
    }

    public function test_can_delete_activity(): void
    {
        $activity = Activity::factory()->create(['user_id' => $this->user->id]);

        $response = $this->deleteJson("/api/activities/{$activity->id}", [], $this->headers);

        $response->assertStatus(204);
    }

    public function test_can_list_activities(): void
    {
        Activity::factory()->count(5)->create(['user_id' => $this->user->id]);

        $response = $this->getJson('/api/activities', $this->headers);

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'title', 'type', 'description', 'user_id', 'start_date', 'due_date', 'completion_date', 'status', 'created_at', 'updated_at']
            ]);
    }

    public function test_can_show_activity(): void
    {
        $activity = Activity::factory()->create(['user_id' => $this->user->id])->first();

        $response = $this->getJson("/api/activities/{$activity->id}", $this->headers);

        $response->assertStatus(200)
            ->assertJson($activity->toArray());
    }

    public function test_can_filter_activities_by_date_range(): void
    {
        $startDate1 = $this->getNextWeekday(Carbon::now()->subDays(5));
        $dueDate1 = $this->getNextWeekday($startDate1->copy()->addDays(2));

        $startDate2 = $this->getNextWeekday(Carbon::now()->subDays(2));
        $dueDate2 = $this->getNextWeekday($startDate2->copy()->addDays(2));

        Activity::factory()->create([
            'user_id' => $this->user->id,
            'start_date' => $startDate1->format('Y-m-d H:i:s'),
            'due_date' => $dueDate1->format('Y-m-d H:i:s'),
        ]);

        Activity::factory()->create([
            'user_id' => $this->user->id,
            'start_date' => $startDate2->format('Y-m-d H:i:s'),
            'due_date' => $dueDate2->format('Y-m-d H:i:s'),
        ]);

        $response = $this->getJson('/api/activities?start_date=' . Carbon::now()->subDays(4)->format('Y-m-d H:i:s') . '&end_date=' . Carbon::now()->addDays(1)->format('Y-m-d H:i:s'), $this->headers);

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'title', 'type', 'description', 'user_id', 'start_date', 'due_date', 'completion_date', 'status', 'created_at', 'updated_at']
            ]);
    }

    public function test_cannot_create_activity_with_overlapping_start_dates(): void
    {
        $startDate = $this->getNextWeekday(Carbon::now()->next(CarbonInterface::MONDAY));
        Activity::factory()->create([
            'user_id' => $this->user->id,
            'start_date' => $startDate->format('Y-m-d H:i:s'),
            'due_date' => $this->getNextWeekday($startDate->copy()->addDays(2))->format('Y-m-d H:i:s'),
        ]);

        $data = [
            'title' => $this->faker->sentence,
            'type' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'start_date' => $startDate->format('Y-m-d H:i:s'),
            'due_date' => $this->getNextWeekday($startDate->copy()->addDays(1))->format('Y-m-d H:i:s'),
            'status' => 'open',
        ];

        $response = $this->postJson('/api/activities', $data, $this->headers);

        $response->assertStatus(422)
            ->assertJson(['errors' => [
                'start_date' => ['The user already has an activity starting in this period.'],
            ]]);
    }

    public function test_cannot_create_activity_with_overlapping_due_dates(): void
    {
        $startDate = $this->getNextWeekday(Carbon::now()->next(CarbonInterface::MONDAY));
        Activity::factory()->create([
            'user_id' => $this->user->id,
            'start_date' => $startDate->format('Y-m-d H:i:s'),
            'due_date' => $this->getNextWeekday($startDate->copy()->addDays(2))->format('Y-m-d H:i:s'),
        ]);

        $data = [
            'title' => $this->faker->sentence,
            'type' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'start_date' => $this->getNextWeekday($startDate->copy()->addDays(1))->format('Y-m-d H:i:s'),
            'due_date' => $startDate->copy()->addDays(2)->format('Y-m-d H:i:s'),
            'status' => 'open',
        ];

        $response = $this->postJson('/api/activities', $data, $this->headers);

        $response->assertStatus(422)
            ->assertJson(['errors' => [
                'due_date' => ['The user already has an activity ending in this period.'],
            ]]);
    }

    public function test_cannot_create_activity_on_weekend(): void
    {
        // Garantir que a data de início seja sábado e a data de vencimento seja sábado
        $startDate = Carbon::parse('next Saturday');
        $dueDate = $startDate->copy(); // Mesma data para evitar problemas de ordem

        $data = [
            'title' => $this->faker->sentence,
            'type' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'start_date' => $startDate->format('Y-m-d H:i:s'),
            'due_date' => $dueDate->format('Y-m-d H:i:s'),
            'status' => 'open',
        ];

        $response = $this->postJson('/api/activities', $data, $this->headers);

        $response->assertStatus(422)
            ->assertJson(['errors' => [
                'start_date' => ["The start date cannot be a weekend (falls on {$startDate->englishDayOfWeek})."],
                'due_date' => ["The due date cannot be a weekend (falls on {$dueDate->englishDayOfWeek})."],
            ]]);
    }
}
