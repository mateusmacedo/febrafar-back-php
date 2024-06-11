<?php

namespace App\Factories\Activity\Contracts;

use App\DTO\Activity\ActivityIndexDTO;
use App\Http\Requests\Activity\ActivityIndexRequest;

interface ActivityIndexDTOFactoryInterface
{
    public function createFromRequest(ActivityIndexRequest $request): ActivityIndexDTO;
}
