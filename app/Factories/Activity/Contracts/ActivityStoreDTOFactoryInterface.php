<?php

namespace App\Factories\Activity\Contracts;

use App\DTO\Activity\ActivityStoreDTO;
use App\Http\Requests\Activity\ActivityStoreRequest;

interface ActivityStoreDTOFactoryInterface
{
    public function createFromRequest(ActivityStoreRequest $request): ActivityStoreDTO;
}
