<?php

namespace App\Actions\Task;

use App\Models\Task;

class DeleteTask
{
    public static function execute(int $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

    }
}
