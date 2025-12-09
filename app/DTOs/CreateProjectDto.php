<?php

namespace App\DTOs;

final class CreateProjectDto
{
    public function __construct(
        public int $creator_id,
        public string $title,
        public string $description,

    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            auth()->user()->id,
            $request['title'],
            $request['description'],
        );
    }
}
