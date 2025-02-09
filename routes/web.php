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
    Route::get('/add', 'Frontend\CartController@addCart');
    Route::get('/update/{rowId}/{qty}', 'Frontend\CartController@updateCart');
    Route::get('/del/{rowId}', 'Frontend\CartController@delCart');
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
    Route::get('/shop/{slug}', 'Frontend\ProductController@getCatPrd');
    // Route::get('/{id}', 'Frontend\ProductController@getDetail');
    Route::get('/detail/{slug}', 'Frontend\ProductController@getDetail');
});



// ---------------BACKEND
Route::get('/login', 'Backend\LoginController@getLogin')->middleware('CheckLogout');
Route::post('/login', 'Backend\LoginController@postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function () {
    // 
    Route::get('/', 'Backend\IndexController@getIndex');
    // Logout
    Route::get('logout', 'Backend\IndexController@logout');

    // Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'Backend\CategoryController@getCategory');
        Route::post('', 'Backend\CategoryController@postCategory');
        Route::get('/edit/{cat_id}', 'Backend\CategoryController@getEditCategory');
        Route::post('/edit/{cat_id}', 'Backend\CategoryController@postEditCategory');
        Route::get('/delete/{cat_id}', 'Backend\CategoryController@delCategory');
    });

    // Order
    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'Backend\OrderController@getOrder');
        Route::get('/detail/{id}', 'Backend\OrderController@getDetailOrder');
        Route::get('/processed', 'Backend\OrderController@getProcessed');
        Route::get('/xu-ly/{id}', 'Backend\OrderController@xuLy'); 
    });

    // Product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'Backend\ProductController@getListProduct');
        Route::get('/add', 'Backend\ProductController@getAddProduct');
        Route::post('/add', 'Backend\ProductController@postAddProduct');
        Route::get('/edit/{product_id}', 'Backend\ProductController@getEditProduct');
        Route::post('/edit/{product_id}', 'Backend\ProductController@postEditProduct');
    });

    // User
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Backend\UserController@getListUser');
        Route::get('/add', 'Backend\UserController@getAddUser');
        Route::post('/add', 'Backend\UserController@postAddUser');
        Route::get('/edit/{id}', 'Backend\UserController@getEditUser');
        Route::post('/edit/{id}', 'Backend\UserController@postEditUser');
        Route::get('/del/{id}', 'Backend\UserController@delUser');
    });


});

// Học query 
Route::group(['prefix' => 'query'], function () {

    // insert data
    Route::get('insert', function () {
        DB::table('users')->insert([
            ['email' => 'manhlinha3_01@gmail.com', 'name' => 'Linh Nguyen 01', 'password' => bcrypt('123456'), 'address' => 'zone 01', 'phone' => '0969880165', 'level' => '1'],
            ['email' => 'manhlinha3_02@gmail.com', 'name' => 'Linh Nguyen 02', 'password' => bcrypt('123456'), 'address' => 'zone 01', 'phone' => '0969880166', 'level' => '1'],
            ['email' => 'manhlinha3_03@gmail.com', 'name' => 'Linh Nguyen 03', 'password' => bcrypt('123456'), 'address' => 'zone 01', 'phone' => '0969880167', 'level' => '1'],
            ['email' => 'manhlinha3_04@gmail.com', 'name' => 'Linh Nguyen 04', 'password' => bcrypt('123456'), 'address' => 'zone 01', 'phone' => '0969880168', 'level' => '1']
        ]);
    });

    // update data
    Route::get('update', function () {
        DB::table('users')->where('email', 'manhlinha3_04@gmail.com')->update(['email' => 'daicalinh@mail.com']);
    });

    // deleta data
    Route::get('delete', function () {
        DB::table('users')->where('email', 'manhlinha3_03@gmail.com')->delete();
    });

    // lấy dữ liệu bằng querybuilder
    Route::get('get-all-data', function () {
        $users = DB::table('users')->get();
        dd($users);
    });

    // chọn các trường cần lấy dữ liệu 
    Route::get('get-select', function () {
        $users = DB::table('users')->select('id', 'name', 'email')->get();
        dd($users);
    });

    // câu lệnh where
    Route::get('where-and', function () {
        $users = DB::table('users')->where([
            ['email', '=', 'daicalinh@mail.com'],
            ['level', '=', '1']
        ])->get();

        // $users = DB::table('users')->where('email', '=', 'daicalinh@mail.com')->get();
        dd($users);
    });

    
});


