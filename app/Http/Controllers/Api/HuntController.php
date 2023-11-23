<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hunt;
use App\Models\Hunter;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HuntController extends Controller
{
    /**
     * Return all hunts
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse{
        $perPage = $request->input('limit', 10);
        $filters = $request->except(['limit', 'page']);

        $query = Hunt::query();
        $query->where('statut', 'on');

        foreach ($filters as $param => $value) {
            if ($param === 'title') {
                $query->where('title', $value);
            }
            if ($param === 'date') {
                $query->where('date', $value);
            }
            if ($param === 'id') {
                $query->where('id', $value);
            }
        }

        $hunts = $query->paginate($perPage);

        return response()->json($hunts);
    }

    public function show(Hunt $hunt) : JsonResponse{
        return response()->json($hunt);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $hunt = Hunt::create($data);

        return response()->json($hunt, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $hunt = Hunt::findOrFail($id);

        $hunt->update($data);

        return response()->json($hunt);
    }

    public function delete($id): JsonResponse
    {
        $hunt = Hunt::findOrFail($id);

        $hunt->statut = 'deleted';
        $hunt->save();

        return response()->json(null, 204);
    }
}
