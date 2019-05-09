<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>

</head>
<body>
<div class="container app row">
    <div class="sidebar col-3">
        @foreach($carTypes as $carType)
            <div class="cartype">

            </div>
        @endforeach
    </div>
    <div class="content col-9">
        <div class="links float-right">
            @auth
                Welcome, {{ auth()->user()->name }} |
            @endauth
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif
        </div>
    </div>


    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</div>
</body>
</html>
