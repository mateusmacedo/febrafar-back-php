<?php

namespace App\Services\Activity;

use App\DTO\Activity\ActivityIndexDTO;
use App\DTO\Activity\ActivityShowDTO;
use App\DTO\Activity\ActivityStoreDTO;
use App\DTO\Activity\ActivityUpdateDTO;
use App\Factories\Activity\Contracts\ActivityFactoryInterface;
use App\Models\Activity;
use App\Repositories\Activity\Contracts\ActivityRepositoryInterface;
use App\Services\Activity\Contracts\ActivityServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class ActivityService implements ActivityServiceInterface
{
    protected $activityRepository;
    protected $activityFactory;

    public function __construct(
        ActivityRepositoryInterface $activityRepository,
        ActivityFactoryInterface $activityFactory
    ) {
        $this->activityRepository = $activityRepository;
        $this->activityFactory = $activityFactory;
    }

    public function listActivities(ActivityIndexDTO $dto): Collection
    {
        return $this->activityRepository->findByDateRange($dto);
    }

    public function showActivity(ActivityShowDTO $dto): ?Activity
    {
        return $this->activityRepository->findById($dto);
    }

    public function createActivity(ActivityStoreDTO $dto): Activity
    {
        $activity = $this->activityFactory->createFromDTO($dto);
        return $this->activityRepository->save($activity);
    }

    public function updateActivity(Activity $activity, ActivityUpdateDTO $dto): Activity
    {
        if ($dto->title !== null) {
            $activity->title = $dto->title;
        }
        if ($dto->type !== null) {
            $activity->type = $dto->type;
        }
        if ($dto->description !== null) {
            $activity->description = $dto->description;
        }
        if ($dto->startDate !== null) {
            $activity->start_date = Carbon::parse($dto->startDate);
        }
        if ($dto->dueDate !== null) {
            $activity->due_date = Carbon::parse($dto->dueDate);
        }
        if ($dto->completionDate !== null) {
            $activity->completion_date = Carbon::parse($dto->completionDate);
        }
        if ($dto->status !== null) {
            $activity->status = $dto->status;
        }

        return $this->activityRepository->save($activity);
    }

    public function deleteActivity(Activity $activity): void
    {
        $this->activityRepository->delete($activity);
    }
}
