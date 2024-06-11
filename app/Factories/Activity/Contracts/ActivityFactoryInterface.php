<?php

namespace App\Factories\Activity\Contracts;

use App\DTO\Activity\ActivityStoreDTO;
use App\Models\Activity;


interface ActivityFactoryInterface
{
    public function createFromDTO(ActivityStoreDTO $dto): Activity;
}
