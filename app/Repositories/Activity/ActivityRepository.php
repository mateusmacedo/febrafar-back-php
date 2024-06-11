<?php

namespace App\Repositories\Activity;

use App\DTO\Activity\ActivityIndexDTO;
use App\DTO\Activity\ActivityShowDTO;
use App\Models\Activity;
use App\Repositories\Activity\Contracts\ActivityRepositoryInterface;
use Illuminate\Support\Collection;

class ActivityRepository implements ActivityRepositoryInterface
{
    public function find(ActivityIndexDTO $dateRange): Collection
    {
        $query = Activity::query();

        if ($dateRange->userId !== null) {
            $query->where('user_id', $dateRange->userId);
        }

        if ($dateRange->startDate !== null) {
            $query->where('start_date', '>=', $dateRange->startDate);
        }

        if ($dateRange->endDate !== null) {
            $query->where('start_date', '<=', $dateRange->endDate);
        }

        return $query->get();
    }

    public function findById(ActivityShowDTO $dto): ?Activity
    {
        return Activity::where('id', $dto->activityId)
            ->where('user_id', $dto->userId)
            ->first();
    }

    public function save(Activity $activity): Activity
    {
        $activity->save();
        return $activity;
    }

    public function delete(Activity $activity): void
    {
        $activity->delete();
    }
}
