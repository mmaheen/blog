@extends('backend.components.layouts')

@section('title')
    Post 
@endsection

@section('content')
    <div class="container-fluid px-4">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h1 class="mt-4">Post Tables</h1>
                </div>
                <div class="col-sm d-flex justify-content-end">
                    <a href="{{route('admin.post.create')}}" class="mt-4 btn btn-link"><h5>Create Post</h5></a>
                </div>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Index</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                            @foreach($posts as $category)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$category->photo}}</td>
                                <td>{{$category->name}}</td>
                                <td>K</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <button class="btn btn-secondary">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="col sm">
                                                <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
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

