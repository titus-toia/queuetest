<?php

namespace Queuetest\Http\Controllers;

use Illuminate\Http\Request;
use Queuetest\CarType;
use Queuetest\Car;

class AppController extends Controller
{
    public function index() {
        $user = auth()->user();
        $car_types = CarType::all();
        $cars = $user->cars();

        return view('app', [
            'carTypes' => $car_types,
            'cars' => $cars
        ]);
    }
}
