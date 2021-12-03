<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->hasOne('App\Product');
    }

    public function setItemPriceAttribute ($quantity) {
        $price = $this->product()->price;
        $this->attributes['item_price'] = ($price*$quantity);
    }

}
