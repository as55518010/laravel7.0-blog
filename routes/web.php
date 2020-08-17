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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // 後台登陸
    Route::get('login', 'LoginController@login');
    // 驗證碼
    Route::get('code', 'LoginController@code');
    // 用戶登入
    Route::post('dologin', 'LoginController@doLogin');
    // 建立後台密碼
    Route::get('crypt/{password}', 'LoginController@crypt');

    Route::group(['middleware' => ['IsLogin']], function () {
        // 後台首頁
        Route::view('index', 'admin.index');
        // 後台歡迎頁
        Route::view('welcome', 'admin.welcome');
        // 後台登出
        Route::get('logout', 'LoginController@logout');
        // 後台用戶模塊相關路由
        Route::resource('user', 'UserController');
    });
});
