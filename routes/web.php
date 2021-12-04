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

Route::get('/', function () {
    return view('welcome');
});
Route::any('order','OrderController@order')->name('order');
Route::any('order_form','OrderController@order_form')->name('order_form');
Route::any('add_order','OrderController@add_order')->name('add_order');
Route::any('revenue','OrderController@revenue')->name('revenue');
Route::get('main_dish_price/{id}', 'OrderController@main_dish_price')->name('main_dish_price');
Route::get('side_dish_price/{id}', 'OrderController@side_dish_price')->name('side_dish_price');
Route::get('desert_price/{id}', 'OrderController@desert_price')->name('desert_price');
Route::get('pdf', 'OrderController@pdf')->name('pdf');
 
