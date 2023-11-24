<?php
//app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();
        return view('user.liste', compact('data'));
    }
    public function mainPage(Request $request)
    {
        return view('admin.dashboard');
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user') -> with('status', 'User bien supprimer');
    }

    public function updateUser($id){
        $user = User::find($id);
        return view("user.update", compact('user'));
    }
    public function updateUserValues(Request $request){
        $request -> validate([
            "email" => 'required',
        ]);

        $user = User::find($request->id);
        $user->email = $request->email;
        $user->update();
        return redirect('/user');
    }

    public function createView(){
        $roles = Role::all();
        return view("user.create", compact('roles'));
    }
    public function createUser(Request$request){
        $user = new User();
        $user->email = $request ->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();
        $user->role_id = $request->role;
        $user->save();
        return redirect('/user');
    }
}
