<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function parent_categories() {
        return static::where('parent_id', null)->get();
    }
}
