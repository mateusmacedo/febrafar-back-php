<?php

namespace App\Services\Activity\Contracts;


use App\DTO\Activity\ActivityIndexDTO;
use App\DTO\Activity\ActivityStoreDTO;
use App\DTO\Activity\ActivityUpdateDTO;
use App\Models\Activity;
use Illuminate\Support\Collection;

interface ActivityServiceInterface
{
    public function listActivities(ActivityIndexDTO $dto): Collection;
    public function createActivity(ActivityStoreDTO $dto): Activity;
    public function updateActivity(Activity $activity, ActivityUpdateDTO $dto): Activity;
    public function deleteActivity(Activity $activity): void;
}
