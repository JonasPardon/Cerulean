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

Route::get('/', function() {
    return ['status' => 'Success'];
});

Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@show');
Route::post('/products', 'ProductController@store');
Route::patch('/products/{id}', 'ProductController@update');
Route::delete('/products/{id}', 'ProductController@destroy');

Route::get('/product_categories', 'ProductCategoryController@index');
Route::get('/product_categories/{id}', 'ProductCategoryController@show');
Route::post('/product_categories', 'ProductCategoryController@store');
Route::patch('/product_categories/{id}', 'ProductCategoryController@update');
Route::delete('/product_categories/{id}', 'ProductCategoryController@destory');