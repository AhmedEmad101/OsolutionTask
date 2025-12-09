<?php

namespace App\Actions\Project;

use Illuminate\Http\Request;
use App\Models\Project;
class UpdateProject
{
    public static function execute(Project $project,array $data)
    {
       
        if($project->creator_id != auth()->user()->id)
        {
            throw new \Exception('You are not allowed to update this project.');
        }
        $project->update($data);
       return $project;
    }
}