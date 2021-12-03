<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index() {
        return view('shop.index');
    }
    public function products() {
        return view('shop.products');
    }
    public function contact() {
        return view('shop.contact');
    }
    public function about() {
        return view('shop.about');
    }

}
