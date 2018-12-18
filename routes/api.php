

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::apiResource('products', 'ProductController');

// Route::get('/products', 'ProductController@getProducts');
// Route::get('/products/{id}', 'ProductController@getProductWithId');
// Route::get('/orders', 'OrderController@index');
Route::resource('orders', 'OrderController', array('only' => array('index', 'store', 'show', 'update', 'destroy')));
Route::resource('products', 'ProductController', array('only' => array('index', 'store', 'show', 'update', 'destroy')));

// Route::get('/categories/{id}', 'CategoryController@show');

// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//     Route::get('/', 'AdminController@getIndex');
//     Route::get('products', 'ProductController@index');
//     Route::get('/products/{id}', 'ProductController@show');
//     Route::get('products/insert', 'ProductController@store');
//     Route::post('products/insert', 'ProductController@store');
//     Route::get('products/edit/{id}', 'ProductController@update');
//     Route::post('products/edit/{id}', 'ProductController@update');
//     Route::post('products/delete/{id}', 'ProductController@destroy');

// });

?>