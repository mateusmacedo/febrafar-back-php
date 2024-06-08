<?php

namespace Tests\Unit\Services;

use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Mockery;
use Tests\TestCase;

class ActivityServiceTest extends TestCase
{
    use WithFaker;

    protected $activityService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->activityService = new ActivityService(new Activity());
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_it_throws_validation_exception_if_activity_overlaps()
    {
        $this->expectException(ValidationException::class);

        $userId = $this->faker->randomDigitNotNull;
        $startDate = $this->faker->dateTime->format('Y-m-d H:i:s');
        $endDate = $this->faker->dateTime->format('Y-m-d H:i:s');

        // Mocking the Activity model
        $activityMock = Mockery::mock(Activity::class);
        $activityMock->shouldReceive('hasOverlappingActivity')
            ->with($userId, $startDate, $endDate)
            ->andReturn(true);
        $activityMock->shouldReceive('create')
            ->andReturn(new Activity());

        $activityService = new ActivityService($activityMock);

        $activityService->store([
            'user_id' => $userId,
            'start_date' => $startDate,
            'due_date' => $endDate,
            'title' => $this->faker->word,
            'type' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => 'open'
        ]);
    }

    public function test_it_creates_activity_if_no_overlap()
    {
        $userId = $this->faker->randomDigitNotNull;
        $startDate = $this->faker->dateTime->format('Y-m-d H:i:s');
        $endDate = $this->faker->dateTime->format('Y-m-d H:i:s');

        // Mocking the Activity model
        $activityMock = Mockery::mock(Activity::class);
        $activityMock->shouldReceive('hasOverlappingActivity')
            ->with($userId, $startDate, $endDate)
            ->andReturn(false);
        $activityMock->shouldReceive('create')
            ->andReturn(new Activity());
        $activityService = new ActivityService($activityMock);

        $result = $activityService->store([
            'user_id' => $userId,
            'start_date' => $startDate,
            'due_date' => $endDate,
            'title' => $this->faker->word,
            'type' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => 'open'
        ]);

        $this->assertInstanceOf(Activity::class, $result);
    }

    public function test_it_can_create_an_activity()
    {
        $data = [
            'user_id' => $this->faker->randomDigitNotNull,
            'start_date' => $this->faker->dateTime->format('Y-m-d H:i:s'),
            'due_date' => $this->faker->dateTime->format('Y-m-d H:i:s'),
            'title' => $this->faker->word,
            'type' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => 'open'
        ];

        // Mocking the Activity model
        $activityMock = Mockery::mock(Activity::class);
        $activityMock->shouldReceive('hasOverlappingActivity')
            ->andReturn(false);
        $activityMock->shouldReceive('create')
            ->with($data)
            ->andReturn(new Activity($data));
        $activityService = new ActivityService($activityMock);

        $result = $activityService->store($data);

        $this->assertInstanceOf(Activity::class, $result);
    }

    public function test_it_can_update_an_activity()
    {
        $data = [
            'start_date' => $this->faker->dateTime->format('Y-m-d H:i:s'),
            'due_date' => $this->faker->dateTime->format('Y-m-d H:i:s'),
            'title' => $this->faker->word,
            'type' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => 'completed'
        ];

        $activity = Mockery::mock(Activity::class)->makePartial();
        $activity->user_id = $this->faker->randomDigitNotNull;

        // Mocking the Activity model
        $activity->shouldReceive('update')
            ->with($data)
            ->andReturn(true);

        $activity->shouldAllowMockingMethod('setAttribute');
        $activity->shouldAllowMockingMethod('getAttribute');

        $activityService = new ActivityService($activity);

        $result = $activityService->update($data, $activity);

        $this->assertInstanceOf(Activity::class, $result);
    }

    public function test_it_can_delete_an_activity()
    {
        $activityId = $this->faker->randomDigitNotNull;

        // Mocking the Activity model
        $activityMock = Mockery::mock(Activity::class);
        $activityMock->shouldReceive('findOrFail')
            ->with($activityId)
            ->andReturn(new Activity());
        $activityMock->shouldReceive('delete')
            ->andReturn(true);
        $activityService = new ActivityService($activityMock);

        $result = $activityService->delete($activityId);

        $this->assertNull($result);
    }

    public function test_it_can_get_activities_by_date_range()
    {
        $startDate = $this->faker->dateTime->format('Y-m-d H:i:s');
        $endDate = $this->faker->dateTime->format('Y-m-d H:i:s');

        // Mocking the Activity model
        $activityMock = Mockery::mock(Activity::class);
        $activityMock->shouldReceive('filter')
            ->andReturnSelf();
        $activityMock->shouldReceive('get')
            ->andReturn(collect([new Activity()]));
        $activityService = new ActivityService($activityMock);

        $result = $activityService->get($startDate, $endDate);

        $this->assertCount(1, $result);
    }
}
