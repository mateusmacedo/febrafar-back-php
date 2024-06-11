<?php

namespace App\DTO\Activity;

class ActivityShowDTO
{
    public function __construct(
        public readonly int $userId,
        public readonly int $activityId
    ) {
    }
}
