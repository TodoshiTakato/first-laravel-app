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


class ShopController extends Controller {

    public function getOrder(Request $request)
    {
        $user = Auth::user();
        return Order::firstOrCreate(['user_id' => $user->id, 'paid' => 0]);
    }

    public function getOrderItem(Request $request, Product $product)
    {
        $order = $this->getOrder($request);
        $orderitem = OrderItem::firstOrCreate(
            ['order_id' => $order->id,'product_id' => $product->id]
        );
        return $orderitem;
    }
    public function getCartData()
    {
        if (Cookie::get("shopping_cart")) {
            $cookie_data = stripslashes(Cookie::get("shopping_cart"));
            return json_decode($cookie_data, true);
        } else {
            return null;
        }

    }
    public function setCartData($cart_data)
    {
        $item_data = json_encode($cart_data);
        $minutes = 525960;
        Cookie::queue(Cookie::make("shopping_cart", $item_data, $minutes));
    }



    public function index()
    {
        return view("shop.index");
    }

    public function products(Request $request)
    {
        $products = Product::paginate(6);
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

        if(Auth::check()) {
            // TODO Add products logic
            return view("shop.products", compact(
                "products",
                "images_array",
                "class_array",
                "order"
            ));
        } elseif (Cookie::get("shopping_cart")) {
            $cart_data = $this->getCartData();
            $prod_id_list = array_keys($cart_data);

            return view("shop.products", compact(
                "products",
                "images_array",
                "class_array",
                "cart_data",
                "prod_id_list"
            ));
        } else {
            return view("shop.products", compact(
                "products",
                "images_array",
                "class_array",
            ));
        }
    }

    public function addToCart(Request $request, Product $product)
    {
        if (Auth::check()) {
            // TODO Add addToCart logic
            $order_item = $this->get_order_item($request, $product);
            $order_item->quantity += 1;
            $order_item->save();
            return redirect()->back();
        } else {
            $prod_id = intval($product->id);
            $prod_name = $product->name;
            $priceval = floatval($product->price);

            if (Cookie::get("shopping_cart")) {
                $cart_data = $this->getCartData();
            } else {
                $cart_data = array();
            }

            $prod_id_list = array_keys($cart_data);
            if (in_array($prod_id, $prod_id_list)) {
                foreach ($cart_data as $key => $value) {
                    $cart_data[$prod_id]["item_quantity"] += 1;
                    $old_priceval = $cart_data[$prod_id]["item_price"];
                    $cart_data[$prod_id]["item_price"] = ($old_priceval + $priceval);
                    $cart_data["total"] += $priceval;
                    $this->setCartData($cart_data);
                    return response()->json([
                        "status" => '"' . $cart_data[$prod_id]["item_name"] . '" Already Added to Cart + Quantity was Updated',
                        "item_quantity" => $cart_data[$prod_id]["item_quantity"],
                    ]);
                }
            } else {
                if ($product) {
                    $item_array = array(
                        "item_id" => $prod_id,
                        "item_name" => $prod_name,
                        "item_quantity" => 1,
                        "item_price" => $priceval,
//                    'item_image' => $prod_image
                    );
                    $cart_data[$prod_id] = $item_array;
                    if (isset($cart_data['total'])) {
                        $cart_data["total"] += $item_array["item_price"];
                    } else {
                        $cart_data["total"] = 0;
                        $cart_data["total"] += $item_array["item_price"];
                    }

                    $this->setCartData($cart_data);
                    return response()->json([
                        "status" => '"' . $prod_name . '" Added to Cart',
                        "item_quantity" => intval($item_array["item_quantity"]),
                    ]);
                }
            }
        }
    }

    public function subtractOneFromCart(Request $request, Product $product)
    {
        if (Auth::check()) {
            // TODO Add subtractOneFromCart logic
            $order_item = $this->get_order_item($request, $product);
            $qty = $order_item->quantity;
            if ($qty > 1) {
                $order_item->quantity -= 1;
                $order_item->save();
            } elseif ($qty == 1) {
                $order_item->delete();
            }
            return redirect()->back();
        } else {
            $prod_id = intval($product->id);
            $priceval = floatval($product->price);
            if (Cookie::get("shopping_cart")) {
                $cart_data = $this->getCartData();
                $prod_id_list = array_keys($cart_data);
                if (in_array($prod_id, $prod_id_list)) {
                    foreach ($cart_data as $key => $value) {
                        if ($cart_data[$prod_id]["item_quantity"] > 1) {
                            $cart_data[$prod_id]["item_quantity"] -= 1;
                            $old_priceval = $cart_data[$prod_id]["item_price"];
                            $cart_data[$prod_id]["item_price"] = ($old_priceval - $priceval);
                            $cart_data["total"] -= $priceval;
                            $this->setCartData($cart_data);
                            return response()->json([
                                "status" => 'One "' . $cart_data[$prod_id]["item_name"] . '" was subtracted from your cart',
                                "item_quantity" => intval($cart_data[$prod_id]["item_quantity"]),
                                "delete" => 0,
                            ]);
                        } else {
                            $item_name = $cart_data[$prod_id]["item_name"];
                            $cart_data["total"] -= $priceval;
                            unset($cart_data[$prod_id]);
                            $this->setCartData($cart_data);
                            return response()->json([
                                "status" => $item_name . " was Removed from your Cart",
                                "delete" => 1,
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function removeFromCart(Request $request, Product $product)
    {
        if (Auth::check()) {
            // TODO Add removeFromCart logic
            $order_item = $this->get_order_item($request, $product);
            $order_item->delete();
            return redirect()->back();
        } else {
            $prod_id = intval($product->id);
            $priceval = floatval($product->price);

            $cookie_data = stripslashes(Cookie::get("shopping_cart"));
            $cart_data = json_decode($cookie_data, true);

            $prod_id_list = array_keys($cart_data);

            if(in_array($prod_id, $prod_id_list)) {
                foreach($cart_data as $key => $value) {
                    $item_name = $cart_data[$prod_id]["item_name"];
                    $cart_data["total"] -= $cart_data[$prod_id]["item_price"];
                    unset($cart_data[$prod_id]);
                    $this->setCartData($cart_data);
                    return response()->json([
                        "status"=>$item_name." was Removed from your Cart",
                        "total" => number_format($cart_data["total"], 2),
                    ]);
                }
            }
        }
    }

    public function cart(Request $request)
    {
        $cart_data = $this->getCartData();
        if (Auth::check()) {
            // TODO Add cart logic
            $order = $this->get_order($request);
            return view('shop.cart', compact('order'));
        } else {
            Session::put("url.intended", request()->fullUrl());
            return view("shop.cart", compact("cart_data"));
        }
    }

    public function cartUpdateQuantity(Request $request, Product $product)
    {
        if (Auth::check()) {
            // TODO Add cartUpdateQuantity logic
        } else {
            $cart_data = $this->getCartData();
            $prod_id = $product->id;
            $priceval = floatval($product->price);
            $quantity = intval($request->quantity);
            $prod_id_list = array_keys($cart_data);

            if (in_array($prod_id, $prod_id_list) && isset($cart_data[$prod_id])) {
                $cart_data["total"] -= $cart_data[$prod_id]["item_price"];
                $cart_data[$prod_id]["item_quantity"] = $quantity;
                $cart_data[$prod_id]["item_price"] = ($quantity * $priceval);
                $cart_data["total"] += $cart_data[$prod_id]["item_price"];
                $this->setCartData($cart_data);
                return response()->json([
                    "status" => $quantity . ' "' . $cart_data[$prod_id]["item_name"] . '"(s) are in the cart',
                    "item_price" => number_format($cart_data[$prod_id]["item_price"], 2),
                    "total" => number_format($cart_data["total"], 2),
                ]);
            }
        }
    }

    public function cartLoadData()
    {
        if (Auth::check()) {
            // TODO Add cartLoadData logic
        } elseif(Cookie::get("shopping_cart")) {
            $cookie_data = stripslashes(Cookie::get("shopping_cart"));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data)-1;
            return response()->json(array("totalcart" => $totalcart));
        } else {
            $totalcart = "0";
            return response()->json(array("totalcart" => $totalcart));
        }
    }

    public function cartClear()
    {
        if (Auth::check()) {
            // TODO Add cartClear logic
        } else {
            Cookie::queue(Cookie::forget("shopping_cart"));
            return response()->json(["status" => "Your Cart was Cleared"]);
        }
    }

    public function about()
    {
        return view("shop.about");
    }

    public function contact()
    {
        return view("shop.contact");
    }
}
