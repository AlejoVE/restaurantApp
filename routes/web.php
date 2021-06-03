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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/management', function(){
    return view("management.index");
});

Route::get('/cashier', 'Cashier\CashierController@index');
Route::get('/cashier/getMenusByCategory/{category_id}', 'Cashier\CashierController@getMenusByCategory');
Route::get('/cashier/getTables', 'Cashier\CashierController@getTables')->name('home');
Route::post('/cashier/orderFood', 'Cashier\CashierController@orderFood');

Route::resource('management/category', 'Management\CategoryController');
Route::resource('management/menu', 'Management\MenuController');
Route::resource('management/table', 'Management\TableController');
