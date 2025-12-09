<?php

namespace App\Actions\Project;

use Illuminate\Http\Request;
use App\Models\Project;
class CreateProject
{
    public static function execute(array $data)
    {
       return Project::create($data);
    }
}