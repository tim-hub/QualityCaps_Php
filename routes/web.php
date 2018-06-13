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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


// [Implicit Binding - Implicit Route Model Binding](https://laracasts.com/discuss/channels/laravel/get-users-information)

// Route::resource('/', 'HomeController')->name('home');

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');


Route::get('/search', 'CapsController@search') ->name('search');


Route::resource('suppliers', 'SuppliersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('categories', 'CategoriesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('caps', 'CapsController');

// users controller new way
// Route::resource('users', 'ProfileController',
// ['only' => ['admin', 'show', ]]);

// Route::resource('users', 'ProfileController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::get('users/profile', 'UsersController@show_me')->name('profile');
Route::get('users/admin', 'UsersController@admin')->name('admin');

Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'update', 'edit', 'destroy',]]);


Route::resource('orders', 'OrdersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('order__items', 'Order_ItemsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

//Route::post('/cart','CartController@add')->name('cart.add');
//Route::delete('/cart/{id}','CartController@delete')->name('cart.delete');
//Route::resource('cart', 'CartController');
