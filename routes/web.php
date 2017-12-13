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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/cart/index', 'CartController@view');

    Route::get('/cart/index/{product_id}', 'CartController@add');

    Route::get('/cart/reset', 'CartController@reset');

    Route::get('/cart/{index}', 'CartController@delete');

    Route::get('/confirm', 'BuyController@confirm');

    Route::get('/address', 'BuyController@address');

    Route::post('/edit', 'BuyController@edit');

    Route::get('/buy', 'BuyController@buy');

});
