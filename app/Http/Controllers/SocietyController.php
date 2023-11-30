<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Society;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SocietyController extends Controller
{
    public function indexSociety(Request $request)
    {
        $data = Society::all();
        return view('society.liste', compact('data'));
    }
    public function deleteSociety($id){
        $user = Society::find($id);
        $user->delete();
        return redirect('/society') -> with('status', 'User bien supprimer');
    }

    public function updateSociety($id){
        $society = User::find($id);
        return view("society.update", compact('society'));
    }
    public function updateSocietyValues(Request $request){
        $society=Society::find($request->id);
        $society->name=$request->name;
        $society->description=$request->description;
        $society->update();
        return redirect('/society');
    }

    public function createSocietyView(){
        return view("society.create");
    }
    public function createSociety(Request$request){
        $society = new Society();
        $society->name = $request->name;
        $society->description = $request->description;
        $society ->federation_id = 1;
        $society -> user_id = 1;
        $society -> season_id = 2;
        $society->save();
        return redirect('/society');
    }

}
