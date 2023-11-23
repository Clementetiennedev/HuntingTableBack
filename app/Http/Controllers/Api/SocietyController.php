<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\SocietyRepository;
use App\Models\Society;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Return all societies
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse{
        $perPage = $request->input('limit', 10);
        $filters = $request->except(['limit', 'page']);

        $query = Society::query();
        $query->where('statut', 'on');

        foreach ($filters as $param => $value) {
            if ($param === 'name') {
                $query->where('name', $value);
            }
            if ($param === 'id') {
                $query->where('id', $value);
            }
            if ($param === 'deparment') {
                //$this->societyRepository->filterByDepartment($query, $value);
                $query->join('federations', 'federations.id', '=', 'societies.federation_id')
                    ->join('departments', 'departments.id', '=', 'federations.department_id')
                    ->where('departments.id', $value);
                //$query->where('id', $value);
            }
        }

        $societies = $query->paginate($perPage);

        return response()->json($societies);
    }

    public function show(Society $society): JsonResponse
    {
        return response()->json($society);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $society = Society::create($data);

        return response()->json($society, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        $society = Society::firstOrFail($id);

        $society->update($data);

        return response()->json($society);
    }

    public function delete($id): JsonResponse
    {
        $society = Society::firstOrFail($id);

        $society->statut = 'deleted';
        $society->save();

        return response()->json(null, 204);
    }
}
