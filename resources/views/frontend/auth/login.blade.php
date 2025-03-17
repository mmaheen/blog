@extends('frontend.components.layouts')

@section('title')
    User Login
@endsection

@section('content')
    <section>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container w-50 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Login</h2>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('user.login')}}" method="POST">
                        @csrf

                        <div class="form-outline mb-4">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-lg" />
                            <label class="form-label">Your Email</label><br>
                            @error('email')
                                <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="password" value="{{old('password')}}" class="form-control form-control-lg" />
                            <label class="form-label">Password</label><br>
                            @error('password')
                                <span class="text-danger font-italic">{{$message}}</span>
                            @enderror
                        </div>
                
                        <div class="d-flex justify-content-center">
                            <button  type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Log in</button>
                        </div>

                        <p class="text-center text-muted mt-5 mb-0">Don't have account? <a href="{{route('user.registerform')}}"
                            class="fw-bold text-body"><u>Register here</u></a></p>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection