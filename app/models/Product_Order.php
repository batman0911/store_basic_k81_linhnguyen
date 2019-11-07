<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Order extends Model
{
    protected $table = 'product_orders';

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
}
