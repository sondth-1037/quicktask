<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ trans('contents.title') }}</title>
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
            </nav>
        </div>

        @yield('content')
    </body>
</html>
