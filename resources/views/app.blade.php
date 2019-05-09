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
<div class="container app">
    <div class="row">
    <div class="sidebar col-3">
        @foreach($carTypes as $carType)
            <div class="cartype card">
                <img src="{{ asset('img/cartypes/' . $carType->image) }}" class="card-img-top" />
                <div class="card-body">
                    <p class="card-title">{{ $carType->name }}</p>
                    <ul>
                        <li>Cost: {{ money_format('%.2n', $carType->cost) }}</li>
                        <li>Speed: {{ $carType->speed }}</li>
                        <li>Revenue: {{ money_format('%.2n', $carType->revenue) }}</li>
                    </ul>
                    <a href="#" class="btn btn-primary buy">Buy</a>
                </div>
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
            <br />
            <h3>Balance: {{ money_format('%.2n', auth()->user()->balance)  }}</h3>
        </div>
        <h3>Available cars:</h3>

    </div>


    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</div>
</div>
</body>
</html>
