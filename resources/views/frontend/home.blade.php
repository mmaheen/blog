@extends('frontend.components.layouts')
@section('title')
    Home
@endsection
@section('content')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                 @foreach($posts as $post)
                 <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="{{asset('uploads/photo')}}/{{$post->photo}}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{$post->created_at}}</div>
                        <h2 class="card-title">{{$post->name}}</h2>
                        <h4 class="card-subtitle">{{$post->category->name}}</h4>
                        <p class="card-text">{{substr($post->description, 0, 550)}}</p>
                        @if (strlen($post->description) > 100)
                            <a class="btn btn-primary" href="{{route('index.post.show',$post->id)}}">Read more →</a>
                        @endif          
                    </div>
                </div>
                 @endforeach
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Blog post-->
                         @foreach($olderPosts as $post)
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="{{asset('uploads/photo')}}/{{$post->photo}}" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">{{$post->created_at}}</div>
                                <h2 class="card-title h4">{{$post->name}}</h2>
                                <p class="card-text">{{substr($post->description, 0, 250)}}</p>
                                @if (strlen($post->description) > 100)
                                    <a class="btn btn-primary" href="{{route('index.post.show',$post->id)}}">Read more →</a>
                                @endif 
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <ul class="list-unstyled mb-0">              
                                    @foreach($categories as $category)
                                        <li><a href="{{route('index.category.show',$category->id)}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>
@endsection