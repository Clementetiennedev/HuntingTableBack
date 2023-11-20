<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\JsonResponse;

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
}
