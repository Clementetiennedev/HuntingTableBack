<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specie;
use Illuminate\Http\JsonResponse;

class SpeciesController extends Controller
{
    /**
     * Return all species
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $species = Specie::all();
        return response()->json($species);
    }

    public function show(Specie $specie): JsonResponse
    {
        $specie = Specie::where('id', $specie -> id);
        return response()->json($specie);
    }
}
