<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;


class ShopController extends Controller
{
//    public function get_order(Request $request) {
//        if (Auth::check()) {
//            $user = Auth::user();
//        }
//        else {
//            Cookie::queue(Cookie::make(
//                'device',
//                Str::orderedUuid(),
//                525960,
//                '/shop/',
//                '127.0.0.1:8000',
//                true,
//                true,
//                'strict'
//            ));
//            $device = $request->cookie('device');
//            $user = User::firstOrCreate(['device' => $device]);
//        }
//        $order = Order::firstOrCreate(['user_id' => $user->id, 'paid' => 0]);
//        return $order;
//    }

//    public function get_order_item(Request $request, Product $product) {
//        $order = $this->get_order($request);
//        $orderitem = OrderItem::firstOrCreate(
//            ['order_id' => $order->id,'product_id' => $product->id]
//        );
//        return $orderitem;
//    }

    public function index() {
        return view('shop.index');
    }

    public function products(Request $request) {
        $products =Product::paginate(6);
//        $order = $this->get_order($request);
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

        if(Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $prod_id_list = array_keys($cart_data);

            return view('shop.products', compact(
                'products',
                'images_array',
                'class_array',
                'cart_data',
                'prod_id_list'
            ));
        }
        else {
            return view('shop.products', compact(
                'products',
                'images_array',
                'class_array'
                //'order',
            ));
        }
    }

    public function add_to_cart(Request $request, Product $product) {
//        $order_item = $this->get_order_item($request, $product);
//        $order_item->quantity += 1;
//        $order_item->save();
//        return redirect()->back();

        $prod_id = intval($product->id);
        $prod_name = $product->name;
        $priceval = floatval($product->price);

        if(Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $prod_id_list = array_keys($cart_data);
        if(in_array($prod_id, $prod_id_list)) {
            foreach($cart_data as $key => $value) {
                    $cart_data[$prod_id]["item_quantity"] += 1;
                    $old_priceval = floatval($cart_data[$prod_id]["item_price"]);
                    $cart_data[$prod_id]["item_price"] = floatval($old_priceval + $priceval);
                    $item_data = json_encode($cart_data);
                    $minutes = 525960;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json([
                        'status' => '"' . $cart_data[$prod_id]['item_name'] . '" Already Added to Cart + Quantity was Updated',
                        'item_quantity' => $cart_data[$prod_id]["item_quantity"],
                    ]);
            }
        }
        else {
            if($product) {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => 1,
                    'item_price' => $priceval,
//                    'item_image' => $prod_image
                );
                $cart_data[$prod_id] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 525960;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json([
                    'status'=> '"' . $prod_name. '" Added to Cart',
                    'item_quantity' => intval($item_array['item_quantity']),
                ]);
            }
        }
    }

    public function subtract_one_from_cart(Request $request, Product $product) {
//        $order_item = $this->get_order_item($request, $product);
//        $qty = $order_item->quantity;
//        if ($qty > 1) {
//            $order_item->quantity -= 1;
//            $order_item->save();
//        } elseif ($qty == 1) {
//            $order_item->delete();
//        }
//        return redirect()->back();
        $prod_id = $product->id;
        $priceval = floatval($product->price);
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $prod_id_list = array_keys($cart_data);

            if(in_array($prod_id, $prod_id_list))
            {
                foreach($cart_data as $key => $value)
                {
//                    $old_item_quantity = intval($cart_data[$key]["item_price"]);
//                    $cart_data[$key]["item_quantity"] = intval($old_item_quantity - 1);

                    if ($cart_data[$prod_id]["item_quantity"] > 1)
                    {
                        $cart_data[$prod_id]["item_quantity"] -= 1;
                        $old_priceval = floatval($cart_data[$prod_id]["item_price"]);
                        $cart_data[$prod_id]["item_price"] = floatval($old_priceval - $priceval);
                        $item_data = json_encode($cart_data);
                        $minutes = 525960;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json([
                            'status' => 'One "' . $cart_data[$prod_id]["item_name"] . '" was subtracted from your cart',
                            'item_quantity' => intval($cart_data[$prod_id]["item_quantity"]),
                            'delete' => 0,
                        ]);
                    }
                    else
                    {
                        $item_name = $cart_data[$prod_id]["item_name"];
                        unset($cart_data[$prod_id]);
                        $item_data = json_encode($cart_data);
                        $minutes = 525960;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json([
                            'status'=>$item_name.' was Removed from your Cart',
                            'delete' => 1,
                        ]);
                    }
                }
            }
        }
    }

    public function remove_from_cart(Request $request, Product $product) {
//        $order_item = $this->get_order_item($request, $product);
//        $order_item->delete();
//        return redirect()->back();

        $prod_id = $product->id;

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $prod_id_list = array_keys($cart_data);

        if(in_array($prod_id, $prod_id_list))
        {
            foreach($cart_data as $key => $value)
            {
                $item_name = $cart_data[$prod_id]["item_name"];
                unset($cart_data[$prod_id]);
                $item_data = json_encode($cart_data);
                $minutes = 525960;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>$item_name.' was Removed from your Cart',]);
            }
        }
    }

    public function cart() {
//        $order = $this->get_order($request);
//        return view('shop.cart', compact('order'));

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        Session::put('url.intended', request()->fullUrl());

//        $total = 0;
//        $total = $total + ($data["item_quantity"] * $data["item_price"])

        return view('shop.cart')->with('cart_data',$cart_data);
    }

    public function load_cart_data() {
        if(Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart)); die;
        }
        else {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
        }
    }

    public function clear_cart() {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status'=>'Your Cart is Cleared']);
    }

    public function about() {
        return view('shop.about');
    }

    public function contact() {
        return view('shop.contact');
    }
}
