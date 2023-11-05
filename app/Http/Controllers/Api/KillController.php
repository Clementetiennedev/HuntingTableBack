<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kill;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class KillController extends Controller
{
    /**
     * Return all kill
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $kill = Kill::all();
        return response()->json($kill);
    }

    /**
     * Return kill for one user
     * @param $kill
     * @return JsonResponse
     */
    public function show($kill) : JsonResponse{
        $kill = Kill::where('user_id', $kill->id);
        return response()->json($kill);
    }
    //Function pour insérer en bdd
    public function store(){
        $user = User::with("role")->get()->pluck("email","role.name");
        return response()->json($user);
    }
    //Function pour mettre a jour en bdd
    public function update(){
        $user = User::with("role")->get()->pluck("email","role.name");
        return response()->json($user);
    }
    //Function pour supprimer en bdd
    public function delete(){
        $user = User::with("role")->get()->pluck("email","role.name");
        return response()->json($user);
    }
}
