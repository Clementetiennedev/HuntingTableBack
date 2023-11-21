<?php

namespace App\Http\Controllers\Api;


use App\Models\Federation;
use App\Models\Hunter;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HunterController
{
    public function index() : JsonResponse{
        $hunter = Hunter::all();
        return response()->json($hunter);
    }

    public function show(Hunter $hunter) : JsonResponse{
        $hunter = Hunter::where('id', $hunter->id);
        return response()->json($hunter);
    }
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $hunter = Hunter::create($data);

        return response()->json($hunter, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $hunter = Hunter::findOrFail($id);

        $hunter->update($data);

        return response()->json($hunter);
    }

    public function delete($id): JsonResponse
    {
        $hunter = Hunter::findOrFail($id);

        $hunter->delete();

        return response()->json(null, 204);
    }
}
