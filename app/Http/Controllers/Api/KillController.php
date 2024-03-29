<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kill;
use App\Models\Hunt;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KillController extends Controller
{
    /**
     * Return all kill
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $query = Kill::query();
        $query->where('statut', 'on');
        $categories = $query->get();
        return response()->json($categories);
    }

    /**
     * Return kill for one user
     * @param $kill
     * @return JsonResponse
     */
    public function show($kill) : JsonResponse{
        return response()->json($kill);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $kill = Kill::create($data);

        return response()->json($kill, 201);
    }

    public function getKillByHuntId(Request $request)
    {

        $huntId = $request->input('hunt_id');
        $hunt = Hunt::with('kills')->find($huntId);

        if ($hunt) {
            $kills = $hunt->kills;
            return response()->json(['kills' => $kills]);
        } else {
            return response()->json(['message' => 'Hunt not found'], 404);
        }

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

        $kill->statut = 'deleted';
        $kill->save();

        return response()->json(null, 204);
    }
}
