<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hunt;
use App\Models\Hunter;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class HuntController extends Controller
{
    /**
     * Return all hunt
     * @return JsonResponse
     */
    public function index() : JsonResponse{
        $hunt = Hunt::all();
        return response()->json($hunt);
    }
    //Function pour afficher selon une seule donnée (avec param)
    public function show(Hunt $hunt) : JsonResponse{
        return response()->json($hunt);
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
