<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'item_price',
        'paid',
        'paid_at',
    ];

    public function order_items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function setTotalPriceAttribute ($item_price) {
        $this->attributes['total_price'] += $item_price;
    }
}
