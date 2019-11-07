<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function product_orders()
    {
        return $this->hasMany('App\Models\Product_Order');
    }
}
