<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_order extends Model
{

    protected $primaryKey = 'no';
    protected $fillable = [
        'member_no',
        'product_no',
        'quantity',
        'order_date',
        'actual_price',
    ];

    public function member()
    {
        return $this->belongsTo('App\Member', 'member_no', 'no');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_no', 'no');
    }

//    public static function product_orders($no){
//        return Product_order::where('product_no','=',$no)->get();
//    }
}
