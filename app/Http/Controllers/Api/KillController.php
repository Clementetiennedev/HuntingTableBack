<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KillController extends Controller
{
    /**
     * Return all kill
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $kill = Kill::all();
        return response()->json($kill);
    }

    /**
     * Return kill for one user
     * @param $kill
     * @return JsonResponse
     */
    public function show($kill) : JsonResponse{
        $kill = Kill::where('user_id', $kill->id);
        return response()->json($kill);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $kill = Kill::create($data);

        return response()->json($kill, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $kill = Kill::findOrFail($id);

        $kill->update($data);

        return response()->json($kill);
    }

    public function delete($id): JsonResponse
    {
        $kill = Kill::findOrFail($id);

        $kill->delete();

        return response()->json(null, 204);
    }
}
