<?php

namespace App\Http\Controllers\Api;


use App\Models\Hunter;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class HunterController
{
    //Function pour afficher toute les donnée
    public function index() : JsonResponse{
        $hunter = Hunter::all();
        return response()->json($hunter);
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
