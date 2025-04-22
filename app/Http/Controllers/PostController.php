<?php

namespace App\Http\Controllers;

use File;
use App\Models\Post;

use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $posts=Post::with('category')->paginate(5); //pagination
        $posts=Post::with('category')->orderBy('id','DESC')->get(); //eager loading. with('funtion name in model')
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::all();
        return view('backend.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request;
        $photo=null;
        if(isset($request->photo)){   
            $photo=time().'.'.$request->photo->extension();     //photo name
            $request->photo->move(public_path('uploads/photo'),$photo);     //Store into public directory
        }
        
        $post=New Post;
        $post->name=$request->name;
        $post->category_id=$request->category;
        $post->description=$request->description;
        $post->photo=$photo;
        $post->save();
        return redirect()->route('admin.post.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post=Post::find($id);
        return view('frontend.postshow',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return 'Edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post=Post::find($id);

        $filePath = public_path('uploads/photo/').$post->photo; // Specify the file path
        if (File::exists($filePath)) {
            File::delete($filePath); // Deletes the file
        } else {
            session()->flash('post_file_delete','No files were here');
        }

        $post->delete();
        session()->flash('post_delete','Post Deleted');


        return redirect()->back();
    }
}
