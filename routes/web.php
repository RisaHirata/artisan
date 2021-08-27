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
Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
//課題4用
   Route::get('admin/profile/create', 'Admin\ProfileController@add');
   Route::get('admin/profile/edit', 'Admin\ProfileConroller@edit');

//課題3用
Route::get('XXX', 'xxx\AAAController@bbb');
});
