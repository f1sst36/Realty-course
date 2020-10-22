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

Route::get('/', 'InfoController@mainPage')->name('mainPage');
Route::get('/home/{article_id}', 'InfoController@index')->name('home');
Route::get('/about/{article_id}', 'InfoController@about')->name('about');
Route::get('/map', 'InfoController@showMap')->name('map');
Route::get('/realty-info', 'InfoController@showRealtyInfo')->name('realtyInfo');

Route::get('/reviews', 'ReviewController@index')->name('reviews');

Route::get('/news', 'ArticleController@index')->name('acticles');
Route::get('/article/{id}', 'ArticleController@showArticle')->name('article');

Route::get('/order-form', 'OrderController@createForm')->name('orderForm');
Route::post('/add-order', 'OrderController@addOrder')->name('createOrder');
Route::get('/order-list', 'OrderController@orderList')->name('orderList');
Route::get('/order-filter', 'OrderController@orderFilter')->name('orderFilter');


Route::group(['namespace' => 'Admin', 'prefix' => '/admin'], function(){
    Route::get('/', "AuthController@index")->name('authForm');
    Route::post('/login', "AuthController@login")->name('login');
    Route::get('/logout', "AuthController@logout")->name('logout');

    Route::get('/articles', 'ArticleController@index')->name('articles');
    Route::get('/article-create', 'ArticleController@createForm')->name('createForm');
    Route::get('/article-edit/{id}', 'ArticleController@editForm')->name('editArticleForm');
    Route::post('/article-store', 'ArticleController@addArticle')->name('addArticle');
    Route::post('/article-update', 'ArticleController@editArticle')->name('editArticle');
    Route::post('/article-delete', 'ArticleController@deleteArticles')->name('deleteArticles');
    
    Route::get('/reviews', 'ReviewController@index')->name('reviewList');
    Route::get('/review-create', 'ReviewController@createForm')->name('createReviewForm');
    Route::get('/review-edit/{id}', 'ReviewController@editForm')->name('editReviewForm');
    Route::post('/review-store', 'ReviewController@addReview')->name('addReview');
    Route::post('/review-update', 'ReviewController@editReview')->name('editReview');
    Route::post('/review-delete', 'ReviewController@deleteReview')->name('deleteReview');

    Route::get('/slider', 'SliderController@index')->name('slider');
    Route::post('/upload-image', 'SliderController@uploadImageOrDelete')->name('uploadImageOrDelete');

    Route::get('/orders', 'OrderController@index')->name('orders');
    Route::get('/order-edit/{id}', 'OrderController@editForm')->name('editOrderForm');
    Route::post('/order-update', 'OrderController@editOrder')->name('editOrder');
    Route::get('/order-add', 'OrderController@addForm')->name('addOrderForm');
    Route::post('/order-store', 'OrderController@addOrder')->name('addOrder');
    Route::post('/order-delete', 'OrderController@deleteOrders')->name('deleteOrders');
    Route::get('/order-filter', 'OrderController@filterOrders')->name('filterOrders');

    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/user-create', 'UserController@createUserForm')->name('createUserForm');
    Route::post('/user-store', 'UserController@createUser')->name('createUser');
    Route::get('/user-edit/{id}', 'UserController@editUserForm')->name('editUserForm');
    Route::post('/user-update', 'UserController@editUser')->name('editUser');
    Route::post('/user-delete', 'UserController@deleteUser')->name('deleteUser');

    Route::get('/roles', 'RolesController@index')->name('roles');
    Route::get('/role-create', 'RolesController@createRoleForm')->name('createRoleForm');
    Route::get('/role-edit/{id}', 'RolesController@editRoleForm')->name('editRoleForm');
    Route::post('/role-update', 'RolesController@editForm')->name('editForm');
    Route::post('/role-store', 'RolesController@createRole')->name('createRole');
    Route::post('/role-delete', 'RolesController@roleDelete')->name('roleDelete');

    Route::get('/menus', 'MenuController@index')->name('menus');
    Route::get('/menu-create', 'MenuController@createMenuForm')->name('createMenuForm');
    Route::post('/menu-store', 'MenuController@createMenuItem')->name('createMenuItem');
    Route::get('/menu-edit/{id}', 'MenuController@editMenuItemForm')->name('editMenuItemForm');
    Route::post('/menu-update', 'MenuController@editMenuItem')->name('editMenuItem');
    Route::post('/menu-delete', 'MenuController@deleteMenu')->name('deleteMenu');
});

