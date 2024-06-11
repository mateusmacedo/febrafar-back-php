<?php

namespace App\Factories\Activity\Contracts;

use App\DTO\Activity\ActivityUpdateDTO;
use App\Http\Requests\Activity\ActivityUpdateRequest;

interface ActivityUpdateDTOFactoryInterface
{
    public function createFromRequest(ActivityUpdateRequest $request): ActivityUpdateDTO;
}
