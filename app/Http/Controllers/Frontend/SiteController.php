<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Exception;

use App\Models\User;
use App\Models\Category;

class SiteController extends Controller
{
    //
    public function index(){
        $categories=Category::select('name')->where('status','=','active')->get();
        return view ('frontend.home',compact('categories'));
    }

    public function showRegisterForm(){
        return view ('frontend.auth.register');
    }

    public function registration(Request $request){
        // dd ($request);
        // dd ($request->file());

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:2|max:20',
            'confirm_password'=>'requird|same:password'
            // 'photo'=>'required|image'
        ],[
            'name.required'=>'Please enter your name',
            'email.required'=>'Please provide your email address'
        ]); 
        
        try{
            // $photo=$request->file();
            // $file_name=rand(1111,9999).date('Y-m-d_H-i-s').$photo->getClientOriginalExtension();
            // $photo->storeAs('images',$file_name);
           
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->role='admin';
            // $user->password=bcrypt($request->password);
            $user->save();
    
            // User::create([
            //     'name'=>$request->name,
            //     'email'=>$request->email,
            //     'role'=>'guest', //not working
            //     'password'=>$request->password,
            // ]);
            session()->flash('message','User registration success');
        }
        catch(Exception $error){
            dd($error->getMessage());
        }
        return redirect()->back();
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

        $credential=$request->only('email','password');
        if(auth()->attempt($credential)){
            // dd('ok');
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->back();
        }

        // session->flash('message','User registration success');
        // return redirect()->back();
    }
}
