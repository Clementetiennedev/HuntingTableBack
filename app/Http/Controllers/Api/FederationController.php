<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Federation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FederationController extends Controller
{
    public function index(Request $request) : JsonResponse{
        $federations = Federation::all();

        return response()->json([
            'data' => $federations,
        ]);
    }

    public function show(Federation $federation): JsonResponse
    {
        return response()->json($federation);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $federation = Federation::create($data);

        return response()->json($federation, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $federation = Federation::findOrFail($id);

        $federation->update($data);

        return response()->json($federation);
    }

    public function delete($id): JsonResponse
    {
        $federation = Federation::findOrFail($id);

        $federation->statut = 'deleted';
        $federation->save();

        return response()->json(null, 204);
    }
}
