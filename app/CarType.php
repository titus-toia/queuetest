<?php

namespace Queuetest;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $table = 'car_types';

    protected $fillable = [
        'name', 'image', 'cost', 'speed', 'revenue'
    ];
}
