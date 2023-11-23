<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $species = Specie::create($data);

        return response()->json($species, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $species = Specie::findOrFail($id);

        $species->update($data);

        return response()->json($species);
    }

    public function delete($id): JsonResponse
    {
        $species = Specie::findOrFail($id);

        $species->delete();

        return response()->json(null, 204);
    }
}
