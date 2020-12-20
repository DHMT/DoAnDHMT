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

route::get('trangchu',[
	'as'=>'trangchu',
	'uses'=>'DK@trangchu'
]);

route::get('product_type/{type}',[
	'as'=>'product_type',
	'uses'=>'DK@producttype'
]);

route::get('product/{id}',[
	'as'=>'product',
	'uses'=>'DK@product'
]);

route::get('contact',[
	'as'=>'contact',
	'uses'=>'DK@contact'
]);

route::get('about',[
	'as'=>'about',
	'uses'=>'DK@about'
]);

route::get('them/{id}',[
	'as'=>'them',
	'uses'=>'DK@them'
]);

route::get('xoa/{id}',[
	'as'=>'xoa',
	'uses'=>'DK@xoa'
]);

route::get('dathang',[
	'as'=>'dathang',
	'uses'=>'DK@dathang'
]);

route::post('dathang',[
	'as'=>'dathang',
	'uses'=>'DK@mua'
]);