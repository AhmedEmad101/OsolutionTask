<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
        'icon_url',
        'image_filter',
        'image_seed_offset'
    ];
}
