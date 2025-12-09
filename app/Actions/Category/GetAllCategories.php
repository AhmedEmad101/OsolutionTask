<?php

namespace App\Actions\Category;

use Illuminate\Http\Request;
use App\Models\Category;
class GetAllCategories
{
    public static function execute(array $relationships=[],int $pagination=10)
    {
       return Category::with($relationships)->paginate($pagination);
    }
}