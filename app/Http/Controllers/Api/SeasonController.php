<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Society;
use App\Models\User;
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
        $user = auth()->user();

        $society = Society::where('user_id', $user->id)->first();
        $season = Season::create([
            'title' => $request->input('title'),
            'dateDebut' => $request->input('dateDebut'),
            'dateFin' => $request->input('dateFin'),
            'animal' => $request->input('animal'),
            'quota' => $request->input('quota'),
            'society_id' => $society->id,
        ]);

        return response()->json(['message' => 'Data saved successfully']);
    }

    public function getSeasonBySocietyId(Request $request)
    {

        $societyId = $request->input('society_id');
        $society = Society::with('seasons')->find($societyId);

        if ($society) {
            $seasons = $society->seasons;
            return response()->json(['seasons' => $seasons]);
        } else {
            return response()->json(['message' => 'Society not found'], 404);
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
