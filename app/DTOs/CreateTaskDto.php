<?php

namespace App\DTOs;

use Carbon\Carbon;

final class CreateTaskDto
{
    public function __construct(
        public string $title,
        public string $description,
        public int $category_id,
        public int $project_id,
        public string $priority,
        public Carbon $due_date

    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            $request['title'],
            $request['description'] ?? '',
            $request['category_id'],
            $request['project_id'],
            $request['priority'],
            Carbon::parse($request['due_date']),

        );
    }
}
