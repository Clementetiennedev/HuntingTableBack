<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Society;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Return all seasons
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $query = Season::query();
        $query->where('statut', 'on');
        $seasons = $query->get();
        return response()->json($seasons);
    }

    public function show(Season $season): JsonResponse
    {
        return response()->json($season);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        try {
            if (!$request->has('society_id')) {
                throw new \Exception('Une saison de chasse doit être liée à une societé');
            }
            $season = Season::create($data);

            $society = Society::findOrFail($request->input('society_id'));
            $society->season_id = $season->id;

            return response()->json($season, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
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

        $season->statut = 'deleted';
        $season->save();

        return response()->json(null, 204);
    }
}
