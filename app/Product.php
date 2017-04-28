<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'no';
    protected $fillable = [
        'product_name',
        'original_price',
    ];

    public function product_order()
    {
        return $this->hasMany('App\Product_order');
    }

}
