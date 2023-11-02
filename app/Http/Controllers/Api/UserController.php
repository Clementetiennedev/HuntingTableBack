<?php

namespace App\Http\Controllers\Api;


use App\Models\User;

class UserController
{
    public function index(){
        $user = User::with("role")->get()->pluck("email","role.name");
        return response()->json($user);
    }
}
