@extends('backend.components.layouts')

@section('title')
    Post 
@endsection

@section('content')
    Post
    <div class="col-sm d-flex justify-content-end">
                    <a href="{{route('admin.post.create')}}" class="mt-4 btn btn-link"><h5>Create Category</h5></a>
                </div>
@endsection

