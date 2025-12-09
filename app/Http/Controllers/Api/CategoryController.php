<?php

namespace App\Http\Controllers\Api;

use App\Actions\category\GetAllCategories;
use App\Actions\category\GetCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Traits\ApiResponseTrait;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    public function category($id)
    {
        try {
            $category = GetCategory::execute($id);

            return $this->successResponse(new CategoryResource($category), 'Category retrieved successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Category not found', 404);
        }
    }

    public function index()
    {
        $categories = GetAllCategories::execute([], 5);
        if (count($categories) > 0) {
            $CategoryResource = CategoryResource::collection($categories);

            return $this->successResponse(($CategoryResource), 'Categories retrieved successfully');
        }

        return $this->errorResponse('No Categories found yet', 404);
    }
}
