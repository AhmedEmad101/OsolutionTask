<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOn extends Model
{
     protected $fillable = [
   'user_id',
   'task_id',
];
public function task()
{
  $this->belongsTo(Task::class,'task_id');
}
public function user()
{
  $this->belongsTo(User::class,'user_id');
}
}
