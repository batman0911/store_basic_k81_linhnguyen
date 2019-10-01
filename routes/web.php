<?php

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



// ---------------FRONTEND

// Static pages
Route::get('/', 'Frontend\HomeController@getIndex');
Route::get('/about', 'Frontend\HomeController@getAbout');
Route::get('/contact', 'Frontend\HomeController@getContact');

// Cart routes
Route::group(['prefix' => 'cart'], function() {
    Route::get('/', 'Frontend\CartController@getCart');
});

// Checkout routes
Route::group(['prefix' => 'checkout'], function() {
    Route::get('/', 'Frontend\CheckoutController@getCheckout');
    Route::post('/', 'Frontend\CheckoutController@postCheckout');
    Route::get('/complete', 'Frontend\CheckoutController@getComplete');
});

// Product routes
Route::group(['prefix' => 'product'], function() {
    Route::get('/shop', 'Frontend\ProductController@getShop');
    Route::get('/detail', 'Frontend\ProductController@getDetail');
});

// ---------------BACKEND
Route::get('/login', 'Backend\LoginController@getLogin')->name('getLogin');
Route::post('/login', 'Backend\LoginController@postLogin');
Route::get('/logout', 'Backend\LoginController@getLogout');

Route::group(['prefix' => 'admin'], function () {
    
    // // Home routes
    // Route::get('/', function () {
    //     return view('backend.index');
    // });
    
    // // User routes
    // // Route::get('users', 'Backend.UserController@getList');
    // // Route::get('users/edit/{id}', 'Backend.UserController@getEdit');
    // // Route::post('users/edit/{id}', 'Backend.UserController@postEdit');
    // // Route::get('users/add', 'Backend.UserController@getAdd');
    // // Route::post('users/add', 'Backend.UserController@postAdd');
    // Route::resource('user', 'Backend\UserController');

    // // Product routes
    // Route::resource('product', 'Backend\ProductController');

    // // Category routes
    // // Route::resource('category', 'Backend.CategoryController');
    // // Route::get('category', 'Backend\CategoryController@getListCat');

    

    // // Order routes
    // Route::get('order', function ($id) {
        
    // });

    // Login
    
    
    // 
    Route::get('/', 'Backend\IndexController@getIndex');

    // Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'Backend\CategoryController@getCategory');
        Route::post('', 'Backend\CategoryController@postCategory');
        Route::get('/edit', 'Backend\CategoryController@getEditCategory');
        
    });

    // Order
    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'Backend\OrderController@getOrder');
        Route::get('/detail', 'Backend\OrderController@getDetailOrder');
        Route::get('/processed', 'Backend\OrderController@getProcessed');
    });

    // Product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'Backend\ProductController@getListProduct');
        Route::get('/add', 'Backend\ProductController@getAddProduct');
        Route::post('/add', 'Backend\ProductController@postAddProduct');
        Route::get('/edit', 'Backend\ProductController@getEditProduct');
    });

    // User
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Backend\UserController@getListUser');
        Route::get('/add', 'Backend\UserController@getAddUser');
        Route::post('/add', 'Backend\UserController@postAddUser');
        Route::get('/edit', 'Backend\UserController@getEditUser');
    });


});


