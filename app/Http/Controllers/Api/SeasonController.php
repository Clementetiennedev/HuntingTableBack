<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Return all seasons
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $seasons = Season::all();
        return response()->json($seasons);
    }

    public function show(Season $season): JsonResponse
    {
        $season = Season::where('id', $season -> id);
        return response()->json($season);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $season = Season::create($data);

        return response()->json($season, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $season = Season::findOrFail($id);

        $season->update($data);

        return response()->json($season);
    }

    public function delete($id): JsonResponse
    {
        $season = Season::findOrFail($id);

        $season->delete();

        return response()->json(null, 204);
    }
}