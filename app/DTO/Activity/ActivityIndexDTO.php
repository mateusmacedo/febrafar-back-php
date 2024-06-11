<?php

namespace App\DTO\Activity;

class ActivityIndexDTO
{
    public function __construct(
        public readonly ?\DateTimeInterface $startDate,
        public readonly ?\DateTimeInterface $endDate,
        public readonly int $userId
    ) {
    }
}
