<?php

namespace Queuetest;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    public function user() {
        return $this->belongsTo('Queuetest\User');
    }

    public function cartype() {
        return $this->belongsTo('Queuetest\CarType', 'car_type_id');
    }

    protected $fillable = [
        'user_id', 'car_type_id', 'amount', 'running', 'progress'
    ];

}
