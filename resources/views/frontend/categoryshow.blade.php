@extends('frontend.components.layouts')
@section('title')
    Category Posts
@endsection

@section('content')
    @foreach($posts as $post)
        <div class="row">
            <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{asset('uploads/photo')}}/{{$post->photo}}" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{$post->created_at}}</div>
                            <h2 class="card-title h4">{{$post->name}}</h2>
                            {{--<h4 class="card-subtitle h4"><a href="{{route('admin.categories.show',$post->category->id)}}" class="h4">{{$post->category->name}}</a></h4>--}}
                            <p class="card-text">{{$post->description}}</p>
                            
                        </div>
                    </div>
                </div>
            <div class="col-lg-2"></div>
        </div>
    @endforeach
@endsection