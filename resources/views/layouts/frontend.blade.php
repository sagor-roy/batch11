<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('asset/assets/favicon.ico') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('asset/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('frontend.partials.navbar')
        
        <!-- Page content-->
        @yield('content')
        <!-- Footer-->

        @include('frontend.partials.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('asset/js/scripts.js') }}"></script>
    </body>
</html>
