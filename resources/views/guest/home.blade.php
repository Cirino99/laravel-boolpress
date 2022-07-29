<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="d-flex justify-content-end align-items-center pe-3 my-nav-login">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </nav>
        <div id="root"></div>
        <script src="{{ asset('js/front.js') }}"></script>
    </body>
</html>
