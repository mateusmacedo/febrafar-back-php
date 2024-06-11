<?php

namespace App\DTO\Activity;

class ActivityStoreDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $type,
        public readonly ?string $description,
        public readonly \DateTimeInterface $startDate,
        public readonly \DateTimeInterface $dueDate,
        public readonly ?\DateTimeInterface $completionDate,
        public readonly string $status,
        public readonly int $userId
    ) {
    }
}
