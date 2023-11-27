<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hunt;
use App\Models\Hunter;
use App\Models\Society;
use App\Models\User;
use App\Models\Kill;
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
        $hunt->delete();

        return response()->json(null, 204);
    }

    public function getHuntsForCurrentUser(Request $request)
    {
        try {
            $user = auth()->user();

            $user = User::where('id', $user->id)->get()->pluck('hunts');

            if ($user) {
                return response()->json([
                    'data' => $user,
                ]);
            }

            return response()->json(['message' => 'Aucun chasseur associé à cet utilisateur.'], 404);
        } catch (\Exception $e) {
            return response($e -> getMessage());
        }

    }

    public function stores(Request $request)
    {

        $user = auth()->user();

        if ($user->role_id == 2) {
            $hunter = Hunter::where('user_id', $user->id)->first();
            $hunt = Hunt::create([
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'hunter_id' => $hunter->id,
            ]);
        } elseif ($user->role_id == 3) {
            $society = Society::where('user_id', $user->id)->first();
            $hunt = Hunt::create([
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'society_id' => $society->id,
            ]);
        }

        foreach ($request->input('rows') as $row) {
            Kill::create([
                'hunt_id' => $hunt->id,
                'animal' => $row['animal'],
                'number' => $row['number'],
            ]);
        }

        return response()->json(['message' => 'Data saved successfully']);
    }
}
