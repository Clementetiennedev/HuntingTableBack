<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $category = Category::create($data);

        return response()->json($category, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $category = Category::findOrFail($id);

        $category->update($data);

        return response()->json($category);
    }

    public function delete($id): JsonResponse
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json(null, 204);
    }
}
