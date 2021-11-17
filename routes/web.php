<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

// Hello World. Returning HTML as a string. No variable passing.
Route::get('/hello0000', function () {
    return "Hello, World! <br><br><hr><a href='/'>Return to the main page</a>";
});

// Hello World. Returning HTML as a Blade. No variable passing.
Route::get('/hello0001', function () {
    return view('hello0001');
});

// Hello World. Returning HTML as a Blade. Passing variable way #1
Route::get('/hello0002', function () {
    return view('hello0002', [
        'name' => 'Alex'
    ]);
});

// Hello World. Returning HTML as a Blade. Passing variable way #2
Route::get('/hello0003', function () {
    $name = 'Smith';
    return view('hello0003', [
        'name' => $name
    ]);
});

// Hello World. Returning HTML as a Blade. Passing variable way #3
Route::get('/hello0004', function () {
    return view('hello0004') -> with('name', 'John');
});

// User. Using Controller. Returning HTML as a string. No variable passing.
Route::get('/user', 'MyController0001@index');

// Routing with optional variable. User. Using Controller. Returning HTML as a Blade. Passing variable way #1
Route::get('/user/{variable?}', 'MyController0001@outputting_variable');

Route::get('/', function () {
    $categories = DB::table('Categories')->get();
    $products = DB::table('Products')->get();
    return view('welcome', compact('categories'), compact('products'));
});

Route::get('/categories', function () {
//    $categories = DB::table('Categories')->get();
    $categories = App\Category::all();
    return view('categories', compact('categories'));
});

Route::get('/categories/{id}', function ($id) {
//    $category = DB::table('Categories')->find($id);
    $category = App\Category::find($id);
    return view('category', compact('category'));
});

Route::get('/products', function () {
    $products = DB::table('Products')->get();
    return view('products', compact('products'));
});

Route::get('/products/{id}', function ($id) {
    $product = DB::table('Products')->find($id);
    return view('product', compact('product'));
});
