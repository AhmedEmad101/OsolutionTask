<?php

namespace App\Http\Controllers\Api;

use App\Actions\Project\CreateProject;
use App\Actions\Project\UpdateProject;
use App\DTOs\CreateProjectDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Traits\ApiResponseTrait;

class ProjectController extends Controller
{
    use ApiResponseTrait;

    public function store(CreateProjectRequest $request)
    {
        try {
            $project_data = $request->validated();
            $project_dto = (array) CreateProjectDto::fromRequest($project_data);
            $project = CreateProject::execute($project_dto);

            return $this->successResponse(new ProjectResource($project), 'project has been created successfully', 201);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create the task', 500);
        }

    }

    public function update(Project $project, UpdateProjectRequest $request)
    {
        try {
            $project_data = $request->validated();
            $updated_project = UpdateProject::execute($project, $project_data);

            return $this->successResponse(new ProjectResource($updated_project), 'project has been updated successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }

    }
}
