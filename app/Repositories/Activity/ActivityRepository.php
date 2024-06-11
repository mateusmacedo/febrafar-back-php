<?php

namespace App\Repositories\Activity;

use App\DTO\Activity\ActivityIndexDTO;
use App\DTO\Activity\ActivityShowDTO;
use App\Models\Activity;
use App\Repositories\Activity\Contracts\ActivityRepositoryInterface;
use Illuminate\Support\Collection;

class ActivityRepository implements ActivityRepositoryInterface
{
    public function findByDateRange(ActivityIndexDTO $dateRange): Collection
    {
        return Activity::where('user_id', $dateRange->userId)
            ->whereBetween('start_date', [$dateRange->startDate, $dateRange->endDate])
            ->get();
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
