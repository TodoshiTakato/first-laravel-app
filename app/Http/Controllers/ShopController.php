<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;


class ShopController extends Controller
{
    public function get_order(Request $request) {
        if (Auth::check()) {
            echo "<br>User is checked!<br>";
            $user = Auth::user();
        }
        else {
            Cookie::queue(Cookie::make(
                'device',
                Str::orderedUuid(),
                525960,
                route('shop.index'),
                route('shop.index'),
                true,
                true,
                'strict'
            ));
            $device = $request->cookie('device');
            $user = User::firstOrCreate(['device' => $device]);
        }
        $order = Order::firstOrCreate(['user_id' => $user->id, 'paid' => 0]);
        return $order;
    }

    public function get_order_item(Request $request, Product $product) {
        $order = $this->get_order($request);
        $orderitem = OrderItem::firstOrCreate(
            ['order_id' => $order->id,'product_id' => $product->id]
        );
        return $orderitem;
    }

    public function index() {
        return view('shop.index');
    }

    public function products(Request $request) {
        $products =Product::paginate(6);
        $order = $this->get_order($request);
//        $order_items_count = $order->order_items->count();
        $class_array = array(
            "des",
            "dev",
            "gra",
        );
        $images_array = array(
            "../assets/images/products/product_01.jpg",
            "../assets/images/products/product_02.jpg",
            "../assets/images/products/product_03.jpg",
            "../assets/images/products/product_04.jpg",
            "../assets/images/products/product_05.jpg",
            "../assets/images/products/product_06.jpg",
            "../assets/images/products/product_07.jpg",
            "../assets/images/products/product_08.jpg",
            "../assets/images/products/product_09.jpg",
            "../assets/images/products/product_10.jpg",
            "../assets/images/products/product_11.jpg",
            "../assets/images/products/product_12.jpg",
            "../assets/images/products/product_13.jpg",
            "../assets/images/products/product_14.jpg",
            "../assets/images/products/product_15.jpg",
            "../assets/images/products/product_16.jpg",
        );

        return view('shop.products', compact(
            'products',
            'images_array',
            'class_array',
            'order'
        ));
    }

    public function add_to_cart(Request $request, Product $product) {
        $order_item = $this->get_order_item($request, $product);
        $order_item->quantity += 1;
        $order_item->save();
        return redirect()->back();
    }
    public function subtract_one_from_cart(Request $request, Product $product) {
        $order_item = $this->get_order_item($request, $product);
        $qty = $order_item->quantity;
        if ($qty > 1) {
            $order_item->quantity -= 1;
            $order_item->save();
        } elseif ($qty == 1) {
            $order_item->delete();
        }
        return redirect()->back();
    }

    public function remove_from_cart(Request $request, Product $product) {
        $order_item = $this->get_order_item($request, $product);
        $order_item->delete();
        return redirect()->back();
    }

    public function cart(Request $request) {
        $order = $this->get_order($request);
        return view('shop.cart', compact('order'));
    }

    public function about() {
        return view('shop.about');
    }

    public function contact() {
        return view('shop.contact');
    }
}
