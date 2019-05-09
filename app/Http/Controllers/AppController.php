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

    public function buy() {

        $carType = CarType::findOrFail(request('id'));
        $user = auth()->user();

        $diff = $carType->cost - $user->balance;

        if($diff <= 0) {
        } else {
            return redirect()
                ->back()
                ->withErrors('You don\'t have enough funds to acquire this car to your fleet.<br />
                    <b>Extra funds required: ' . money_format('%.2n', $diff) . '</b>');
        }
    }
}
