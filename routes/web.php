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

Route::get('/', function () {
    return view('welcome');
});

// 登录页路由
Route::get('admin/login','Admin\LoginController@login');

// 登录操作
Route::post('admin/dologin','Admin\LoginController@doLogin');

// 加密
Route::get('admin/jiami','Admin\LoginController@jiami');

// 跳转到后台首页
Route::get('admin/index','Admin\LoginController@index');
Route::get('admin/welcome','Admin\LoginController@welcome');
