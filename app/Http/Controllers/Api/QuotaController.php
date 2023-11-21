<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class QuotaController extends Controller
{
    /**
     * Return all quota
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $quota = Quota::all();
        return response()->json($quota);
    }

    public function show(Quota $quota): JsonResponse
    {
        $quota = Quota::where('id', $quota->id);
        return response()->json($quota);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $quota = Quota::create($data);

        return response()->json($quota, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $quota = Quota::findOrFail($id);

        $quota->update($data);

        return response()->json($quota);
    }

    public function delete($id): JsonResponse
    {
        $quota = Quota::findOrFail($id);

        $quota->delete();

        return response()->json(null, 204);
    }
}
