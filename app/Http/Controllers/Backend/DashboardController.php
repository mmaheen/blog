<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('backend.dashboard');
    }

    public function showRegistrationForm(){
        return view('backend.auth.register');
    }
    
    public function registration(Request $request){
        // return $request;
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
        ]);     
        try{
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->role=$request->role;
            $user->password=$request->password;
            $user->save();
            session()->flash('message','Registration success');
        }
        catch(Exception $error){
            dd($error)->getMessage();
        }
        return redirect()->back();

    }
}
