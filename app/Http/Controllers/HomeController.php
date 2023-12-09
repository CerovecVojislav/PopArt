<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=='customer'){
                return view('dashboard');
            }
            if($usertype=='admin'){
                return view('admin');
            }
        }
    }
}
