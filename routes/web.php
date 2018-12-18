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

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products','ProductController');
Route::resource('order','OrderController');

Route::get('/products', 'ProductController@showProducts')->name('products');
Route::get('/products/create', function(){ return view('products.create'); });
Route::get('/products/{id}/edit','ProductController@edit');
Route::get('/products/{id}/show','ProductController@showProduct');



Route::get('/orders', 'OrderController@showOrders')->name('orders');
Route::get('/orders/create', function(){ return view('orders.create'); });

// Route::get('/order', 'RequestController@index')->name('order');



Route::resource('category','CategoryController');

Route::get('profile', function(){
    return view('profile');
});

/* View Composer*/
View::composer(['*'], function($view){
    
    $user = Auth::user();
    $view->with('user',$user);
    

    

});

