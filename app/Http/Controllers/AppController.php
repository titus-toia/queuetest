<?php

namespace Queuetest\Http\Controllers;

use Illuminate\Http\Request;
use Queuetest\CarType;

class AppController extends Controller
{
    public function index() {
        $car_types = CarType::all();

        return view('app', [
            'carTypes' => $car_types
        ]);
    }
}
