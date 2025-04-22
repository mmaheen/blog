<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Models\Post;

use App\Models\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){
        $categories=Category::select('id','name')->where('status','=','active')->get(); //Just selecting id and name column from Category table
        $posts=Post::latest()->with('category')->take(2)->get(); //eager loading
        $olderPosts = Post::latest()->with('category')->skip(2)->take(4)->get();
        return view ('frontend.home',compact('categories','posts','olderPosts'));
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
            'confirm_password'=>'required|same:password'
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

    public function categoryShow(string $id){
        $category=Category::find($id);
        $posts=$category->post;
        return view('frontend.categoryshow',compact('posts'));
    }

    public function postShow(string $id){
        $post=Post::find($id);
        return view('frontend.postshow',compact('post'));
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('index');
    }
}
