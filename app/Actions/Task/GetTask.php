<?php

namespace App\Actions\Task;

use Illuminate\Http\Request;
use App\Models\Task;
class GetTask
{
    public static function execute(int $id)
    {
      $task = Task::findOrFail($id);
      return $task;
    }
}