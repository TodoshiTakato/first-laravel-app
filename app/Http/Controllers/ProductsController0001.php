<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController0001 extends Controller
{
    public function Products () {
        $products = DB::table('Products')->get();
        return view('products.products', compact('products'));
    }
    public function Product ($id) {
        $product = DB::table('Products')->find($id);
        return view('products.product', compact('product'));
    }
}
