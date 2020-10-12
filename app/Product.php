<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // public function types () {
    //     return $this->hasMany(Types::class);
    // }

    public function children () {
    	return $this->hasMany(Product::class, 'parent_id');
    }
}
