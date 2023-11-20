<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Return all societies
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse{
        $perPage = $request->input('limit', 10);
        $filters = $request->except(['limit', 'page']);

        $query = Society::query();

        foreach ($filters as $param => $value) {
            if ($param === 'name') {
                $query->where('name', $value);
            }
        }

        $societies = $query->paginate($perPage);

        return response()->json($societies);
    }

    public function show(Society $society): JsonResponse
    {
        $society = Society::where('id', $society -> id);
        return response()->json($society);
    }
}
