<?php

namespace App\Actions\Task;

use App\Models\Task;

class UpdateTask
{
    public static function execute(Task $task, array $data)
    {
        $task->update($data);

        return $task;
    }
}
