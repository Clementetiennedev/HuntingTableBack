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

        foreach ($filters as $param => $value) {
            if ($param === 'title') {
                $query->where('title', $value);
            } elseif ($param === 'date') {
                $query->where('date', $value);
            }
        }

        $hunts = $query->paginate($perPage);

        return response()->json($hunts);
    }
    //Function pour afficher selon une seule donnée (avec param)
    public function show(User $user) : JsonResponse{
        $user = Hunter::where('id', $user -> id);
        return response()->json($user);
    }
    //Function pour insérer en bdd
    public function store(){
        $user = Hunter::with("role")->get()->pluck("email","role.name");
        return response()->json($user);
    }
    //Function pour mettre a jour en bdd
    public function update(){
        $user = Hunter::with("role")->get()->pluck("email","role.name");
        return response()->json($user);
    }
    //Function pour supprimer en bdd
    public function delete(){
        $user = Hunter::with("role")->get()->pluck("email","role.name");
        return response()->json($user);
    }
}
