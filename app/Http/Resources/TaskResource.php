<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'project'=>$this->project->title,
            'title'=>$this->title,
            'description'=>$this->description,
            'category_id'=>$this->category_id,
            'project_id'=>$this->project_id,
            'completed'=>$this->completed?'yes':'no',
            'priority'=>$this->priority,
            'due_date'=>$this->due_date,
            'image_url'=>$this->image_url,
            'created_at'=>$this->created_at
        ];
    }
}
