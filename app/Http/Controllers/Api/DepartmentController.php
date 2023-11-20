<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    /**
     * Return all departments
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse{
        $perPage = $request->input('limit', 10);
        $filters = $request->except(['limit', 'page']);

        $query = Department::query();

        foreach ($filters as $param => $value) {
            if ($param === 'code') {
                $query->where('code', $value);
            } elseif ($param === 'nom') {
                $query->where('nom', $value);
            }
        }

        $departments = $query->paginate($perPage);

        return response()->json($departments);
    }

    public function show(Department $department): JsonResponse
    {
        $department = Department::where('id', $department -> id);
        return response()->json($department);
    }
}
