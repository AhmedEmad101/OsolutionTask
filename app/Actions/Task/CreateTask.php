<?php

namespace App\Actions\Task;

use Illuminate\Http\Request;
use App\Models\Task;
class CreateTask
{
    public static function execute(array $data)
    {
       return Task::create($data);
    }
}