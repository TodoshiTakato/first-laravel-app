<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;

class ProductsController0001 extends Controller
{
    public function Products () {

//        $products = DB::table('Products')->get();
//        $categories = DB::table('Categories')->get();
        $products = Product::all();  // All products
        $categories = Category::all();  // All categories
        $subcategory_counter = 0;  // Counter
        $subcategory_names = [];   // Names of Categories
        $subcategory_ids = [];   // IDs of Sub Categories
        for($i = 0; $i < count($categories); $i++) {      // Loop for Sub Categories
            if ($categories[$i]->parent_id != null) {
                $subcategory_ids[$subcategory_counter] = $categories[$i]->id;
                $subcategory_names[$subcategory_counter] = $categories[$i]->name;
                $subcategory_counter++;
            }
        }

        return view('products.products', [
            'products'=>$products,
            'categories'=>$categories,
            'subcategory_counter'=>$subcategory_counter,
            'subcategory_ids'=>$subcategory_ids,
            'subcategory_names'=>$subcategory_names,
            ]
        );


    }
    public function Product ($id) {
//        $product = DB::table('Products')->find($id);
        $product = Product::find($id);
        return view('products.product', compact('product'));
    }

    // MIN-MAX PRICE
//    public function minmax_price() {
//        $minprice = DB::table('products')->min('price');
//        $maxprice =  DB::table('products')->max('price');
//        $minmax = DB::table('products')->whereIn('price', [$minprice, $maxprice])->get();
//
//        $minmax_array = Product::selectRaw('MIN(price) as min_price, MAX(price) as max_price')->get()->toArray();
//        $maxprice = $minmax['max_price'];
//        $minprice = $minmax['min_price'];
//
//        $minprice = Product::min('price');
//        $maxprice = Product::max('price');
//
//        return $minmax;
//    }
//Такую функцию нашел у вас в market.
//Она вызывает 3 запроса к бд.
//Как ее упростить до 1 запроса?

}
