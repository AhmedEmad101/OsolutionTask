<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Task extends Model
{
    protected $fillable = [
    'title',
    'description',
    'category_id',
    'project_id',
    'completed',
    'priority',
    'due_date',
    'image_url'
];
public function project()
{
    return $this->belongsTo(Project::class);
}
public function category()
{
    return $this->belongsTo(Category::class);
}

}
