@extends('backend.components.layouts')

@section('title')
    Post 
@endsection

@section('content')
    <div class="container-fluid px-4">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h1 class="mt-4">Tables</h1>
                </div>
                <div class="col-sm d-flex justify-content-end">
                    <a href="{{route('admin.post.create')}}" class="mt-4 btn btn-link"><h5>Create new Post</h5></a>
                </div>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                @if(session('post_delete'))
                    <div class="alert alert-success text-center">{{session('post_delete')}}</div>
                @endif
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                            @foreach($posts as $post)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$post->name}}</td>
                                <td><img src="{{asset('uploads/photo')}}/{{$post->photo}}" width = "100px" alt=""></td>
                                <td>{{$post->description}}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-secondary">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="col-sm">
                                                <form action="{{route('admin.post.destroy', $post->id)}}" method="post">
                                                    @csrf 
                                                    @method('delete')
                                                    <button class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

