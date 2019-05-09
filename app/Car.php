<?php

namespace Queuetest;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'name', 'image', 'cost', 'speed', 'revenue'
    ];
}
