<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Return all categories
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $categories = Category::all();
        return response()->json($categories);
    }

    public function show(Category $category): JsonResponse
    {
        $category = Category::where('id', $category -> id);
        return response()->json($category);
    }

    public function store()
    {
        $category = Category::with("role")->get()->pluck("email", "role.name");
        return response()->json($category);
    }

    public function update()
    {
        $category = Category::with("role")->get()->pluck("email", "role.name");
        return response()->json($category);
    }

    public function delete()
    {
        $category = Category::with("role")->get()->pluck("email", "role.name");
        return response()->json($category);
    }
}
