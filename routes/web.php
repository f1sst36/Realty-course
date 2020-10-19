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

Route::get('/', 'InfoController@index')->name('home');
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


Route::group(['namespace' => 'Admin', 'prefix' => '/admin'], function(){
    Route::get('/', "AuthController@index")->name('authForm');
    Route::post('/login', "AuthController@login")->name('login');
    Route::get('/logout', "AuthController@logout")->name('logout');

    Route::get('/articles', 'ArticleController@index')->name('articles');
    Route::get('/article-create', 'ArticleController@createForm')->name('createForm');
    Route::get('/article-edit/{id}', 'ArticleController@editForm')->name('editForm');
    Route::post('/article-store', 'ArticleController@addArticle')->name('addArticle');
    Route::post('/article-update', 'ArticleController@editArticle')->name('editArticle');
    Route::post('/article-delete', 'ArticleController@deleteArticles')->name('deleteArticles');
    
    Route::get('/reviews', 'ReviewController@index')->name('reviewList');
    Route::get('/review-create', 'ReviewController@createForm')->name('createReviewForm');
    Route::get('/review-edit/{id}', 'ReviewController@editForm')->name('editReviewForm');
    Route::post('/review-store', 'ReviewController@addReview')->name('addReview');
    Route::post('/review-update', 'ReviewController@editReview')->name('editReview');
    Route::post('/review-delete', 'ReviewController@deleteReview')->name('deleteReview');
});

