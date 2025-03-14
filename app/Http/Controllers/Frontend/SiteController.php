<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Exception;

use App\Models\User;

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
        
        try{
            $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique',
                'password'=>'required|min:2|max:20',
                'photo'=>'required|image'
            ],[
                'name.required'=>'Please enter your name',
                'email.required'=>'Please provide your email address'
            ]);
    
            // $photo=$request->file();
            // $file_name=rand(1111,9999).date('Y-m-d_H-i-s').$photo->getClientOriginalExtension();
            // $photo->storeAs('images',$file_name);
           
            // $user=new User();
            // $user->name=$request->name;
            // $user->email=$request->email;
            // // $user->password=$request->password;
            // $user->password=bcrypt($request->password);
            // $user->save();
    
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
            ]);
            session()->flash('message','User registration success');
        }
        catch(Exception $error){
            dd($error->getMessage());
        }
        // return redirect()->back();
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
