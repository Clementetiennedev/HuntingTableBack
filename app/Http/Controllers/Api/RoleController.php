<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    /**
     * Return all roles
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $roles = Role::all();
        return response()->json($roles);
    }

    public function show(Role $role): JsonResponse
    {
        $role = Role::where('id', $role -> id);
        return response()->json($role);
    }
}
