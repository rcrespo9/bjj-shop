<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function order_details() {
        return $this->hasMany('App\OrderDetail');
    }
}
