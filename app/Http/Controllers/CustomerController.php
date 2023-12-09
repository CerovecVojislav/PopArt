<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oglasi;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function getUsers(){
        return view('users.users', ['users'=>User::all()]);
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        Oglasi::where('vlasnik', $user)->delete();
        return redirect()->route('getUsers');
        
    }

    public function updateUser($id, Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        $user->save();
        return redirect()->route('getUsers');
    }
    public function userForm($id){
        return view('users.userUpdate', ['user'=>User::find($id)]);
    }
}
