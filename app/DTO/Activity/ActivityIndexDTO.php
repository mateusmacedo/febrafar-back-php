<?php

namespace App\DTO\Activity;

class ActivityIndexDTO
{
    public function __construct(
        public ?\DateTimeInterface $startDate,
        public ?\DateTimeInterface $endDate,
        public int $userId
    ) {
    }
}
