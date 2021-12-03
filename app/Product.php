<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function order_item()
    {
        return $this->belongsTo('App\OrderItem');
    }
}
