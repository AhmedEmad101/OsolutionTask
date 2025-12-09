<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   protected $fillable = [
    'creator_id',
    'title',
    'description',
    
   ];
   public function user()
   {
      return $this->belongsTo(User::class,'creator_id');
   }
}
