@extends('frontend.components.layouts')

@section('title')
    User Resgistration Form
@endsection

@section('content')
    <section>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
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
                <form action="{{route('user.registration')}}" method="POST">
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control form-control-lg" />
                        <label class="form-label">Your Name</label><br>
                        @error('name')
                            <span class="text-danger font-italic">{{$message}}</span>
                        @enderror
                    </div>

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

                    <div class="form-outline mb-4">
                        <input type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control form-control-lg" />
                        <label class="form-label">Repeat your password</label><br>
                        @error('confirm_password')
                            <span class="text-danger font-italic">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-input me-2" type="checkbox" value="" />
                        <label class="form-check-label">
                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                        </label>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button  type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                    </div>

                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('user.loginform')}}"
                        class="fw-bold text-body"><u>Login here</u></a></p>

                </form>

                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
@endsection