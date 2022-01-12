<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/register',      'UserController@getRegister')->name('getRegister');  // User Get Register Page.
Route::post('/register',      'UserController@postRegister')->name('postRegister');  // User Post Register. Create a user.
Route::post('/ajax-register','UserController@ajaxRegister')->name('ajaxRegister');  // User Ajax Register. Create a user.

Route::get('/login',      'UserController@getLogin')->name('getLogin');      // User Get Login Page.
Route::post('/login',      'UserController@postLogin')->name('postLogin');  // User Post Login. Authenticate the user.
Route::post('/ajax-login','UserController@ajaxLogin')->name('ajaxLogin');  // User Ajax Login. Authenticate the user.

Route::get('/forget-password','UserController@getForgetPassword')->name('getForgetPassword');                 // User Get ForgetPassword Page.
Route::post('/forget-password','UserController@postForgetPassword')->name('postForgetPassword');             // User Post ForgetPassword.
Route::get('/reset-password/{reset_code}','UserController@getResetPassword')->name('getResetPassword');     // User Get ResetPassword Page.
Route::post('/reset-password/{reset_code}','UserController@postResetPassword')->name('postResetPassword'); // User Post ResetPassword.

Route::get('/home',      'UserController@home')->name('home');  // Verify the user data.

Route::post('/logout',      'UserController@logout')->name('logout');  // Verify the user data.

Route::post('/check_username_unique','UserController@check_username_unique')->name('check_username_unique');
Route::post('/check_email_unique','UserController@check_email_unique')->name('check_email_unique');
Route::get('/verify-email/{verification_code}','UserController@verify_email')->name('verify_email');



//                            MAIN PAGE
//Route::get('/', function () { return view('welcome'); });           // Old version
Route::get('/', 'CategoriesController0001@index_page')->name('main_page');
Route::get('/test', 'UserController@test')->name('test');

//                            Hello World Pages
                                                                 // Hello World. Returning HTML as a string. No variable passing.
Route::get('/hello0000', 'MyController0001@hello0000');
                                                                 // Hello World. Returning HTML as a Blade:
Route::get('/hello0001', 'MyController0001@hello0001'); // No variable passing.
Route::get('/hello0002', 'MyController0001@hello0002'); // Passing variable way #1
Route::get('/hello0003', 'MyController0001@hello0003'); // Passing variable way #2
Route::get('/hello0004', 'MyController0001@hello0004'); // Passing variable way #3

//                            Hello User Pages
Route::get('/hello0005',      'MyController0001@index');     // User. Using Controller. Returning HTML as a string.
Route::get('/hello0006/{variable?}', 'MyController0001@outputting_variable'); // Routing with optional variable.
                                                                                  // Passing variable way #1
Route::get('/hello_user', 'MyController0001@index'); //~dfgdsfgdfgdfgdg
Route::get('/hello_user/{variable?}', 'MyController0001@outputting_variable'); //~dfgdsfgdfgdfgdg

//                            HTTP Parser Pages
Route::get('/http',      'MyController0001@parsed_http')->name('get_parsed_http');              // Using HTTP request.
Route::get('/http_raw',      'MyController0001@raw_http')->name('get_raw_http');  // Using HTTP request.
Route::get('/layout',      'MyController0001@layout')->name('layout');  // Verify the user data.





//Route::post('/shop/products/', 'MyController0001@index');
Route::group([              // Route Group Shop.
    'prefix' => 'shop',
    'as' => 'shop.',
], function () {
    Route::get('',      'ShopController@index')->name('index');  // Shop Home Index Page.
    Route::get('/contact',      'ShopController@contact')->name('contact');  // Shop Contact Page.
    Route::get('/about',      'ShopController@about')->name('about');  // Shop About Page.

    Route::group([              // Route Group Shop Products.
        'prefix' => 'products',
        'as' => 'products',
    ], function () {
        Route::get('/',      'ShopController@products');  // Shop Products Page.
        Route::post('/{product}',      'ShopController@addToCart')->name('.add_to_cart');  // Shop Product add_to_cart Action.
        Route::put('/{product}',      'ShopController@subtractOneFromCart')->name('.subtract_one_from_cart');  // Shop Product subtract_one_from_cart Action.
        Route::delete('/{product}',      'ShopController@removeFromCart')->name('.remove_from_cart');  // Shop Product remove_from_cart Action.
    });

    Route::group([              // Route Group Shop Cart.
        'prefix' => 'cart',
        'as' => 'cart',
    ], function () {
        Route::get('/', 'ShopController@cart');  // Shop Cart Page.
        Route::put('/update/{product}', 'ShopController@cartUpdateQuantity')->name('.update_quantity');  // shop.cart.update_quantity Action.
        Route::get('/getcart', 'ShopController@getCart');
        Route::get('/getorder', 'ShopController@getOrderData');
        Route::get('/load', 'ShopController@cartLoadData')->name('.load_cart_data');  // shop.cart.load_cart_data Action.
        Route::get('/clear', 'ShopController@cartClear')->name('.clear_cart');  // shop.cart.clear_cart Action.
    });
});






Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.',
    ], function () {
        Route::get('admin',
            '\Auth\AdminController@index')
            ->name('index');
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function () {

        //                            Categories & Products PAGE
        Route::get('/categories', 'CategoriesController0001@Categories')->name('get_categories');
        Route::get('/categories/{id}', 'CategoriesController0001@Category')->name('get_category');
        Route::get('/products',     'ProductsController0001@Products')->name('get_products');
        Route::get('/products/{id}', 'ProductsController0001@Product')->name('get_product');


        //                            Orders & OrderItems PAGE
        Route::resource('orders', 'OrderController');
        Route::resource('order-items', 'OrderItemController');


        //                            Tasks PAGE
        Route::get('/tasks',      'TaskController@index')->name('tasks_main_page');
        Route::get('/task/{task_id}/info',      'TaskController@task_info')->name('task_info_page');
        Route::post('/task',      'TaskController@post')->name('post_a_task');
        Route::post('/task/{task_id}',      'TaskController@rate_a_task')->name('rate_a_task');
        Route::get('/task/{task?}',      'TaskController@task_form')->name('task_form_page');
        Route::put('/task/{task}',      'TaskController@update')->name('update_a_task');
        Route::delete('/task/delete/{task}',      'TaskController@delete')->name('delete_a_task');
    });
});

