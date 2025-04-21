<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts=Post::all();
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $photo=null;
        if(isset($request->photo)){   
            $photo=time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/photo'),$photo);
        }
        
        $post=New Post;
        $post->name=$request->name;
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
