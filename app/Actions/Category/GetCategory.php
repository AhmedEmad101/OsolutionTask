<?php

namespace App\Actions\Category;

use Illuminate\Http\Request;
use App\Models\Category;
class GetCategory
{
    public static function execute(int $id)
    {
       return Category::findOrFail($id);
    }
}