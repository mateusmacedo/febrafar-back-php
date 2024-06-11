<?php

namespace App\Factories\Activity;

use App\DTO\Activity\ActivityStoreDTO;
use App\Factories\Activity\Contracts\ActivityFactoryInterface;
use App\Models\Activity;
use Illuminate\Support\Carbon;



class ActivityFactory implements ActivityFactoryInterface
{
    public function createFromDTO(ActivityStoreDTO $dto): Activity
    {
        $activity = new Activity();
        $activity->title = $dto->title;
        $activity->type = $dto->type;
        $activity->description = $dto->description;
        $activity->start_date = Carbon::parse($dto->startDate);
        $activity->due_date = Carbon::parse($dto->dueDate);
        $activity->completion_date = Carbon::parse($dto->completionDate);
        $activity->status = $dto->status;
        $activity->user_id = $dto->userId;

        return $activity;
    }
}
