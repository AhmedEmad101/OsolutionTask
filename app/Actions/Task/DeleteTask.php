<?php

namespace App\Actions\Task;

use Illuminate\Http\Request;
use App\Models\Task;
class DeleteTask
{
    public static function execute(int $id)
    {
       $task = Task::findOrFail($id);
       $task->delete();
       return;
    }
}