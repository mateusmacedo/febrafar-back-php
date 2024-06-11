<?php

namespace App\Factories\Activity;

use App\DTO\Activity\ActivityIndexDTO;
use App\Factories\Activity\Contracts\ActivityIndexDTOFactoryInterface;
use App\Http\Requests\Activity\ActivityIndexRequest;

class ActivityIndexDTOFactory implements ActivityIndexDTOFactoryInterface
{
    public function createFromRequest(ActivityIndexRequest $request): ActivityIndexDTO
    {
        return new ActivityIndexDTO(
            startDate: $request->input('start_date') ? new \DateTimeImmutable($request->input('start_date')) : null,
            endDate: $request->input('end_date') ? new \DateTimeImmutable($request->input('end_date')) : null,
            userId: $request->user()->id
        );
    }
}
