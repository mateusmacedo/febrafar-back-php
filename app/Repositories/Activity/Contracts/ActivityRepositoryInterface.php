<?php

namespace App\Repositories\Activity\Contracts;

use App\DTO\Activity\ActivityIndexDTO;
use App\DTO\Activity\ActivityShowDTO;
use App\Models\Activity;
use Illuminate\Support\Collection;

interface ActivityRepositoryInterface
{
    public function find(ActivityIndexDTO $dateRange): Collection;
    public function findById(ActivityShowDTO $dto): ?Activity;
    public function save(Activity $activity): Activity;
    public function delete(Activity $activity): void;
}
