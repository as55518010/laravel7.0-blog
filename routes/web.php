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

// Route::get('/{url}', function ($url) {
//     return view('welcome');
// })->where(['url'=>'.*']);

Route::view('admin/index', 'admin.index');
// 後台登陸路由
Route::get('admin/login', 'Admin\LoginController@login');
// 驗證碼路由
Route::get('admin/code', 'Admin\LoginController@code');
// 用戶登入
Route::post('admin/dologin', 'Admin\LoginController@doLogin');

Route::get('admin/crypt/{password}', 'Admin\LoginController@crypt');
