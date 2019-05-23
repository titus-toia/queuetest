<?php

namespace Queuetest\Http\Controllers;

use Illuminate\Http\Request;
use Queuetest\CarType;
use Queuetest\Car;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = auth()->user();
        $car_types = CarType::all();
        $cars = $user->cars()->with('cartype')->get();

        $car = $cars->first();
        dd($car->cartype->name);

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
            $user->cars()->save(new Car([
                'car_type_id' => $carType->id,
            ]));
            return redirect('/')->with('success', "Added a new {$carType->name} to your fleet.");

        } else {
            return redirect()
                ->back()
                ->withErrors('You don\'t have enough funds to acquire this car to your fleet.<br />
                    <b>Extra funds required: ' . money_format('%.2n', $diff) . '</b>');
        }
    }
}
