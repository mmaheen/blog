@extends('backend.components.layouts')

@section('title')
    Post
@endsection

@section('content')
<section>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Share a Post</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </div>
                    @endif
                    @if(session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Enter post title" class="form-control form-control-lg" />
                            <label class="form-label">Post Title</label><br>
                            @error('name')
                                <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option selected value="guest">Select post Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label class="form-label">Category</label><br>
                            <!-- @error('password')
                                <span class="text-danger font-italic">{{$message}}</span>
                            @enderror -->
                        </div>

                        <div class="form-outline">
                            <textarea class="form-control" placeholder="Enter your Post here" name="description" rows="12"></textarea>
                            <label class="form-label">Message</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="photo">
                            <label class="form-label">Choice your photo</label><br>
                            @error('photo')
                                <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center">
                            <button  type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Share Post</button>
                        </div>

                
                    </form>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection