<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function get_order(Request $request) {
        if (Auth::check()) {
            echo "<br>User is checked!<br>";
            $user = Auth::user();
        }
        else {
            if (count($_COOKIE)>0) {
                echo "<br>There are cookies!<br>";
                $cookieNames = array_keys($_COOKIE);
                foreach ($cookieNames as $cookie) {
                    echo ('<br>'.$cookie.': '.$_COOKIE[$cookie].'<br>');
                }
            }
            $device = $request->cookie('device');
            echo 'device='.$device;
            dump($device);
            $dev = $device;
            $user = User::firstOrCreate(['device' => $dev]);
        }
        return Order::firstOrCreate(['user_id' => $user->id, 'paid' => 0]);
    }

    public function get_order_item(Request $request, Product $product) {
        $order = $this->get_order($request);

        return OrderItem::firstOrCreate(
            ['order_id' => $order->id,'product_id' => $product->id]
        );
    }

    public function index() {

        return view('shop.index');
    }

    public function products(Request $request) {
        $products =Product::paginate(6);
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
        $order = $this->get_order($request);
//        $order_items_count = $order->order_items->count();
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
