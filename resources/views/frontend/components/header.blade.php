<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item"><a class="nav-link" href="#">Home</a></li> -->
                 @if(auth()->user())
                    <li class="nav-item"><a class="nav-link active" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                 @endif
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                @if(auth()->user())
                    <li class="nav-item">
                        <form action="{{route('user.logout')}}" method="POST">
                            <a class="nav-link active" href="{{route('user.logout')}}" onclick="event.preventDefault();this->closest('form').submit()">
                                Log out
                            </a>
                        </form></li>
                @else
                    <li class="nav-item"><a class="nav-link active" href="{{route('user.login')}}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('user.register')}}">Register</a></li>
                @endif
                
            </ul>
        </div>
    </div>
</nav>