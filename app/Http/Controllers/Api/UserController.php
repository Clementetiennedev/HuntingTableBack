<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
    /**
     * Return list of all Users
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $query = User::query();
        $query->where('statut', 'on');
        $users = $query->get();
        return response()->json($users);
    }

    /**
     * Return user information with userId
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        return response()->json($user);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $user = User::firstOrFail($id);

        $user->update($data);

        return response()->json($user);
    }

    public function delete($id): JsonResponse
    {
        $user = User::firstOrFail($id);

        $user->statut = 'deleted';
        $user->save();

        return response()->json(null, 204);
    }
}
