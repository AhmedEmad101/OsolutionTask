<?php

namespace App\Actions\Task;

use Illuminate\Http\Request;
use App\Models\Task;
class GetAllTasks
{
    public static function execute(array $relationships=[],int $paginate=10,string $order_by='desc')
    {
      $task = Task::with($relationships)
                  ->orderBy('created_at',$order_by)
                  ->paginate($paginate);
      return $task;
    }
}