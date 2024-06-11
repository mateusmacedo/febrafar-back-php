<?php

namespace App\Factories\Activity;

use App\DTO\Activity\ActivityUpdateDTO;
use App\Factories\Activity\Contracts\ActivityUpdateDTOFactoryInterface;
use App\Http\Requests\Activity\ActivityUpdateRequest;

class ActivityUpdateDTOFactory implements ActivityUpdateDTOFactoryInterface
{
    public function createFromRequest(ActivityUpdateRequest $request): ActivityUpdateDTO
    {
        return new ActivityUpdateDTO(
            title: $request->input('title'),
            type: $request->input('type'),
            description: $request->input('description'),
            startDate: $request->input('start_date') ? new \DateTimeImmutable($request->input('start_date')) : null,
            dueDate: $request->input('due_date') ? new \DateTimeImmutable($request->input('due_date')) : null,
            completionDate: $request->input('completion_date') ? new \DateTimeImmutable($request->input('completion_date')) : null,
            status: $request->input('status')
        );
    }
}
