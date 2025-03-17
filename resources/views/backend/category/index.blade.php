@extends('backend.components.layouts')
@section('title')
    Category List
@endsection
@section('content')

    <div class="container-fluid px-4">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h1 class="mt-4">Tables</h1>
                </div>
                <div class="col-sm d-flex justify-content-end">
                    <a href="{{route('admin.categories.create')}}" class="mt-4 btn btn-link"><h5>Create Category</h5></a>
                </div>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>status</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>status</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                            @foreach($categories as $category)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->status}}</td>
                                <td>{{$category->slug}}</td>
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

