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
Route::post('users/toggle', 'UsersController@toggle') ->name('toggle');

Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'update', 'edit', 'destroy',]]);


Route::post('orders-change-status', 'OrdersController@change_status');
Route::post('process-order', 'OrdersController@process_order');
Route::resource('orders', 'OrdersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);


Route::resource('order__items', 'Order_ItemsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

//Route::post('/carts','CartsController@add')->name('carts.add');
//Route::delete('/carts/{id}','CartsController@delete')->name('carts.delete');
//Route::resource('carts', 'CartsController');


//Route::post('carts/remove', 'CartsController@remove') -> name('carts.remove');


Route::resource('carts', 'CartsController', ['only' => ['index', 'store','destroy']]);

//Route::get('carts-empty', 'CartsController@index');
Route::post('carts-empty', 'CartsController@empty');

Route::post('carts-update', 'Cartscontroller@update');
