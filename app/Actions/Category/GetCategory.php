<?php

namespace App\Actions\Category;

use App\Models\Category;

class GetCategory
{
    public static function execute(int $id)
    {
        return Category::findOrFail($id);
    }
}
