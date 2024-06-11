<?php

namespace App\Factories\Activity;

use App\DTO\Activity\ActivityStoreDTO;
use App\Factories\Activity\Contracts\ActivityStoreDTOFactoryInterface;
use App\Http\Requests\Activity\ActivityStoreRequest;

class ActivityStoreDTOFactory implements ActivityStoreDTOFactoryInterface
{
    public function createFromRequest(ActivityStoreRequest $request): ActivityStoreDTO
    {
        return new ActivityStoreDTO(
            title: $request->input('title'),
            type: $request->input('type'),
            description: $request->input('description'),
            startDate: new \DateTimeImmutable($request->input('start_date')),
            dueDate: new \DateTimeImmutable($request->input('due_date')),
            completionDate: $request->input('completion_date') ? new \DateTimeImmutable($request->input('completion_date')) : null,
            status: $request->input('status'),
            userId: $request->input('user_id')
        );
    }
}
