<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog - @yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('/assets/frontend')}}/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('/assets/frontend')}}/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        @include('frontend.components.header')
        <!-- Page content-->
        <div class="container mt-4 mb-4">
            <div class="row">
                <div class="col-lg-8">
                    @yield('content')
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    @include('frontend.components.right-sidebar')
                </div>
            </div>
        </div>
        @include('frontend.components.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
