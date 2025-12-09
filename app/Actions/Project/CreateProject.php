<?php

namespace App\Actions\Project;

use App\Models\Project;

class CreateProject
{
    public static function execute(array $data)
    {
        return Project::create($data);
    }
}
