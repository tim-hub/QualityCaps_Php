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



Route::get('user/{id}', 'ProfileController@showProfile');

// Route::resource('/', 'HomeController')->name('home');

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');


Route::get('/search', 'CapsController@search') ->name('search');


Route::resource('suppliers', 'SuppliersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('categories', 'CategoriesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('caps', 'CapsController');
