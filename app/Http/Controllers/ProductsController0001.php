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
        $products = Product::all();
        $subcategory_counter = 0;
        $category_names = [];
        $category_ids = [];
//        $categories = DB::table('Categories')->get();
        $categories = Category::all();;
        for($i = 0; $i < count($categories); $i++) {
            if ($categories[$i]->parent_id != null) {
                $category_ids[$subcategory_counter] = $categories[$i]->id;
                $category_names[$subcategory_counter] = $categories[$i]->name;
                $subcategory_counter++;
            }
        }

        return view('products.products', [
            'products'=>$products,
            'subcategory_counter'=>$subcategory_counter,
            'category_ids'=>$category_ids,
            'category_names'=>$category_names,
            ]
        );


    }
    public function Product ($id) {
//        $product = DB::table('Products')->find($id);
        $product = Product::find($id);
        return view('products.product', compact('product'));
    }
}
