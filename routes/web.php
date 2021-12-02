<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Request;


Route::get('/register',      'UserController@register')->name('register');  // User Register Page.
Route::get('/login',      'UserController@login')->name('login');  // User Login Page.
Route::post('/login',      'UserController@login_verify')->name('login_verify');  // Verify the user data.
Route::get('/home',      'UserController@home')->name('home');  // Verify the user data.
Route::post('/logout',      'UserController@logout')->name('logout');  // Verify the user data.


//                            MAIN PAGE
//Route::get('/', function () { return view('welcome'); });           // Old version
Route::get('/', 'CategoriesController0001@index_page')->name('main_page');

//                            Hello World Pages
                                                                 // Hello World. Returning HTML as a string. No variable passing.
Route::get('/hello0000', 'MyController0001@hello0000');
                                                                 // Hello World. Returning HTML as a Blade:
Route::get('/hello0001', 'MyController0001@hello0001'); // No variable passing.
Route::get('/hello0002', 'MyController0001@hello0002'); // Passing variable way #1
Route::get('/hello0003', 'MyController0001@hello0003'); // Passing variable way #2
Route::get('/hello0004', 'MyController0001@hello0004'); // Passing variable way #3

//                            Hello User Pages
Route::get('/user',      'MyController0001@index');     // User. Using Controller. Returning HTML as a string.
Route::get('/user/{variable?}', 'MyController0001@outputting_variable'); // Routing with optional variable.
                                                                                  // Passing variable way #1

//                            HTTP Parser Pages
Route::get('/http',      'MyController0001@parsed_http')->name('get_parsed_http');              // Using HTTP request.
Route::get('/http_raw',      'MyController0001@raw_http')->name('get_raw_http');  // Using HTTP request.
Route::get('/layout',      'MyController0001@layout')->name('layout');  // Verify the user data.


Route::middleware([
    'auth',
])->group(function () {

    //                            Categories & Products PAGE
    Route::get('/categories', 'CategoriesController0001@Categories');
    Route::get('/categories/{id}', 'CategoriesController0001@Category');
    Route::get('/products',     'ProductsController0001@Products');
    Route::get('/products/{id}', 'ProductsController0001@Product');

    //                            Tasks PAGE
    Route::get('/tasks',      'TaskController@index')->name('tasks_main_page');
    Route::post('/task',      'TaskController@post')->name('post_a_task');
    Route::get('/task/{task_id}',      'TaskController@update_page')->name('update_task_page');
    Route::put('/task/{task_id}',      'TaskController@update')->name('update_a_task');
    Route::delete('/task/delete/{task_id}',      'TaskController@delete')->name('delete_a_task');
});

