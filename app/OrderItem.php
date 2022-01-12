<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'quantity',
        'item_price',
        'order_id',
        'product_id',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

//    public function setQuantityAttribute ($quantity) {
//        $this->attributes['quantity'] = $quantity;
//
//        $price = $this->product->price;
//        $this->attributes['item_price'] = ($price*$quantity);
//    }

    public function setItemPriceAttribute ($quantity) {
        $price = $this->product->price;
        $this->attributes['item_price'] = ($price*$quantity);
    }

}
