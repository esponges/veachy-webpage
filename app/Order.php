<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    // explicado en video #4 min 24:30
    public function items (){

        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity','price');
    }
}
