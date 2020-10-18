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
//Route::group(['namespace' => 'App\Http\Controllers'], function(){

Route::get('/', 'InfoController@index');
Route::get('/about', 'InfoController@about')->name('about');
Route::get('/map', 'InfoController@showMap')->name('map');
Route::get('/realty-info', 'InfoController@showRealtyInfo')->name('realtyInfo');

Route::get('/reviews', 'ReviewController@index')->name('reviews');

Route::get('/news', 'ArticleController@index')->name('acticles');
Route::get('/article/{id}', 'ArticleController@showArticle')->name('article');


Route::get('/order-form', 'OrderController@createForm')->name('orderForm');
Route::post('/add-order', 'OrderController@addOrder')->name('addOrder');
Route::get('/order-list', 'OrderController@orderList')->name('orderList');
Route::get('/order-filter', 'OrderController@orderFilter')->name('orderFilter');

//});

