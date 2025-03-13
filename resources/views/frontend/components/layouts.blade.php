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
        <div class="container">
            <div class="row">
                @yield('content')
                @include('frontend.components.right-sidebar')
            </div>
        </div>
        @include('frontend.components.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
