<?php

use Illuminate\Support\Facades\Route;

//                            Hello World Pages
                                                                 // Hello World. Returning HTML as a string. No variable passing.
Route::get('/hello0000', 'MyController0001@hello0000');
                                                                 // Hello World. Returning HTML as a Blade:
Route::get('/hello0001', 'MyController0001@hello0001'); // No variable passing.
Route::get('/hello0002', 'MyController0001@hello0002'); // Passing variable way #1
Route::get('/hello0003', 'MyController0001@hello0003'); // Passing variable way #2
Route::get('/hello0004', 'MyController0001@hello0004'); // Passing variable way #3

Route::get('/user',      'MyController0001@index');     // User. Using Controller. Returning HTML as a string.
Route::get('/user/{variable?}', 'MyController0001@outputting_variable'); // Routing with optional variable.
                                                                                  // Passing variable way #1
Route::get('/nurlan',      'CategoriesController0001@nurlan');     // User. Using Controller. Returning HTML as a string.

//                            MAIN PAGE
//Route::get('/', function () { return view('welcome'); });           // Old version
Route::get('/', 'CategoriesController0001@index_page');

//                            Categories & Products PAGE
Route::get('/categories', 'CategoriesController0001@Categories');
Route::get('/categories/{id}', 'CategoriesController0001@Category');
Route::get('/products',     'ProductsController0001@Products');
Route::get('/products/{id}', 'ProductsController0001@Product');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
