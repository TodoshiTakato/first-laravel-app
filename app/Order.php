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

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
