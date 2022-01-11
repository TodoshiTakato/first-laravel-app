<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price',
        'paid',
        'paid_at',
        'user_id',
    ];

    public function order_items()
    {
        return $this->hasMany('App\OrderItem');
    }

//    public function setTotalPriceAttribute ($quantity) {
//        //        dd($price = $this->product->price);
//        $price = $this->product->price;
//        $this->attributes['item_price'] = ($price*$quantity);
//    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
