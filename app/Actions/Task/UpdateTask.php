<?php

namespace App\Actions\Task;

use Illuminate\Http\Request;
use App\Models\Task;
class UpdateTask
{
    public static function execute(Task $task,array $data)
    {
      $task->update($data);
       return $task;
    }
}