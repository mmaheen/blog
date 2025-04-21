@extends('backend.components.layouts')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container w-50 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Create Category</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('admin.categories.store')}}" method="POST">
                        @csrf

                        <div class="form-outline mb-4">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control form-control-lg" />
                            <label class="form-label">Category Name</label><br>
                            @error('name')
                                <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="active" {{ old('status')==='active' ? 'checked':''}}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Active
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="inactive" {{old('status')==='inactive' ? 'checked':''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Inactive
                            </label><br>
                            @error('status')
                                <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
 
                        <div class="d-flex justify-content-end">
                            <button  type="submit" class="btn btn-info btn-block btn-lg gradient-custom-4 text-body">Create</button>
                        </div>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection