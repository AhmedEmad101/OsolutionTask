<?php

namespace App\Http\Controllers\Api;

use App\Actions\Task\CreateTask;
use App\Actions\Task\DeleteTask;
use App\Actions\Task\GetAllTasks;
use App\Actions\Task\GetTask;
use App\Actions\Task\UpdateTask;
use App\DTOs\CreateTaskDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Traits\ApiResponseTrait;

class TaskController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $tasks = GetAllTasks::execute([], 5, 'asc');
            $tasks_resource = TaskResource::collection($tasks);

            return $this->successResponse($tasks_resource, 'Tasks have been retrieved successfully', 200);
        } catch (\Exception $e) {
            dd($e->getMessage());

            return $this->errorResponse('failed to retrieve the tasks or the tasks is not found', 404);
        }

    }

    public function task($id)
    {
        try {
            $task = GetTask::execute($id);

            return $this->successResponse(new TaskResource($task), 'Task has been retrieved successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('failed to retrieve the task or the task is not found', 404);
        }

    }

    public function store(CreateTaskRequest $request)
    {
        try {
            $task_data = $request->validated();
            $task_dto = (array) CreateTaskDto::fromRequest($task_data);
            $task = CreateTask::execute($task_dto);

            return $this->successResponse(new TaskResource($task), 'Task has been created successfully', 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create the task', 500);
        }
    }

    public function update(Task $task, UpdateTaskRequest $request)
    {
        try {
            $task_data = $request->validated();
            $updated_task = UpdateTask::execute($task, $task_data);

            return $this->successResponse(new TaskResource($updated_task), 'task is updated successfully', 200);
        } catch (\Exception $e) {
            dd($e->getMessage());

            return $this->errorResponse('Failed to update the task', 500);
        }
    }

    public function destroy($id)
    {

        try {
            DeleteTask::execute($id);

            return $this->successResponse($id, ' task is deleted successfully', 204);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to delete the task', 500);
        }

    }
}
