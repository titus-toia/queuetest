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
                    <form action="{{ url('buy') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $carType->id }}" />
                        <button type="submit" class="btn btn-primary buy">Buy</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="content col-9">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{!! $error !!}</div>
        @endforeach
        @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        <h3>Available cars:</h3>
        @forelse($cars as $car)

        @empty
            <h4>You currently have no cars available to run.</h4>
        @endforelse

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
    </div>


    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</div>
</div>
</body>
</html>
