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
    return view('auth.login');
});


Route::get('/index' ,'Controller@index')->name('index');
Route::get('/book/{id}' ,'Controller@book')->name('book');
Route::get('/slot/{id}' ,'Controller@getSlots')->name('get.slot');
Route::post('/store' ,'Controller@store')->name('store');

Route::get('/ccc' ,'AppController@slot')->name('get.slot');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
