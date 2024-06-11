<?php

namespace App\DTO\Activity;

class ActivityStoreDTO
{
    public function __construct(
        public string $title,
        public string $type,
        public ?string $description,
        public \DateTimeInterface $startDate,
        public \DateTimeInterface $dueDate,
        public ?\DateTimeInterface $completionDate,
        public string $status,
        public int $userId
    ) {
    }
}
