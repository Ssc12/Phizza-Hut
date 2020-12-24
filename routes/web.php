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

Route::get('/', 'PizzaController@home')->name('home');
Route::get('/pizza', 'PizzaController@search');

Route::get('/pizza/add', 'PizzaController@showAddPizzaForm');
Route::get('/pizza/update/{id}', 'PizzaController@showUpdatePizzaForm');
Route::get('/pizza/delete/{id}', 'PizzaController@showDeletePage');
Route::post('/pizza/add', 'PizzaController@addPizza');
Route::post('/pizza/update/{id}', 'PizzaController@updatePizza');
Route::post('/pizza/delete/{id}', 'PizzaController@deletePizza');

Route::get('/login', 'UserController@showLoginForm')->name('login');
Route::post('/login', 'UserController@login');
Route::get('/register', 'UserController@showRegisterForm');
Route::post('/register', 'UserController@register');
Route::get('/logout','UserController@logout')->name('logout');

Route::get('/pizza-info/{id}','PizzaController@pizza');
Route::get('/user/{id}/history', 'TransactionController@showHistory');
Route::get('/all-user-history', 'TransactionController@allUserHistory');

Route::get('/cart/user/{id}','CartController@viewCart')->name('viewCart');
Route::post('/cart/add/pizza/{id}','CartController@addCart');
Route::post('/cart/update/pizza/{id}','CartController@updateCart');
Route::post('/cart/delete/pizza/{id}','CartController@deleteCart');
Route::post('/cart/checkout/','CartController@checkoutCart');
Route::get('/transaction/{id}','TransactionController@transactionDetail');
Route::get('/user/all','UserController@viewAllUser');