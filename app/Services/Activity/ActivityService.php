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
use Illuminate\Validation\ValidationException;

class ActivityService implements ActivityServiceInterface
{
    public function __construct(
        private readonly ActivityRepositoryInterface $activityRepository,
        private readonly ActivityFactoryInterface $activityFactory
    ) {

    }

    public function listActivities(ActivityIndexDTO $dto): Collection
    {
        return $this->activityRepository->find($dto);
    }

    public function showActivity(ActivityShowDTO $dto): ?Activity
    {
        return $this->activityRepository->findById($dto);
    }

    public function createActivity(ActivityStoreDTO $dto): Activity
    {
        $this->validateDates($dto->startDate, $dto->dueDate);
        $this->checkForOverlappingActivities($dto->userId, $dto->startDate, $dto->dueDate);

        $activity = $this->activityFactory->createFromDTO($dto);
        return $this->activityRepository->save($activity);
    }

    public function updateActivity(Activity $activity, ActivityUpdateDTO $dto): Activity
    {
        $this->validateDates($dto->startDate, $dto->dueDate);
        $this->checkForOverlappingActivities($activity->user_id, $dto->startDate, $dto->dueDate, $activity->id);

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

    private function validateDates($startDate, $dueDate)
    {
        $errors = [];
        $locale = app()->getLocale();

        $startDayOfWeek = Carbon::parse($startDate)->locale($locale)->dayName;
        $dueDayOfWeek = Carbon::parse($dueDate)->locale($locale)->dayName;

        if (in_array(Carbon::parse($startDate)->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY], true)) {
            $errors['start_date'] = ["The start date cannot be a weekend (falls on {$startDayOfWeek})."];
        }

        if (in_array(Carbon::parse($dueDate)->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY], true)) {
            $errors['due_date'] = ["The due date cannot be a weekend (falls on {$dueDayOfWeek})."];
        }

        if ($errors !== []) {
            throw ValidationException::withMessages($errors);
        }
    }

    private function checkForOverlappingActivities($userId, $startDate, $dueDate, $excludeActivityId = null)
    {
        $startDateOverlaps = Activity::where('user_id', $userId)
            ->whereBetween('start_date', [$startDate, $dueDate]);

        $dueDateOverlaps = Activity::where('user_id', $userId)
            ->whereBetween('due_date', [$startDate, $dueDate]);

        if ($excludeActivityId) {
            $startDateOverlaps->where('id', '<>', $excludeActivityId);
            $dueDateOverlaps->where('id', '<>', $excludeActivityId);
        }

        $overlapErrors = [];

        if ($startDateOverlaps->exists()) {
            $overlapErrors['start_date'] = ['The user already has an activity starting in this period.'];
        }

        if ($dueDateOverlaps->exists()) {
            $overlapErrors['due_date'] = ['The user already has an activity ending in this period.'];
        }

        if ($overlapErrors !== []) {
            throw ValidationException::withMessages($overlapErrors);
        }
    }
}
