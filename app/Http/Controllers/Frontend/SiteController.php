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
        // dd ($request->file());
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:2|max:20',
            'photo'=>'required|image'
        ]);
        session()->flash('message','User registration success');
        return redirect()->back();

        $photo=$request->file();
        $file_name=rand(1111,9999).date('Y-m-d_H-i-s').$photo->getClientOriginalExtension();
        $photo->storeAs('images',$file_name);
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

        // session->flash('message','User registration success');
        // return redirect()->back();
    }
}
