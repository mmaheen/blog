<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index(){
        return view ('frontend.home');
    }

    public function showRegisterForm(){
        return view ('frontend.auth.register');
    }

    public function registration(Request $request){
        // dd ($request);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
    }

    public function showLoginForm(){
        return view ('frontend.auth.login');
    }

    public function login(Request $request){
        // dd ($request);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
    }
}
