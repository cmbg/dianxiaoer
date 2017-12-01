<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
    return view('Admin.Home_Page', ['title' => '后台首页']);
});

Route::resource('Admin/Goods', 'Admin\GoodsController');
//后台登录界面
Route::get('admin/login', 'Admin\LoginController@login');
Route::post('admin/dologin', 'Admin\LoginController@doLogin');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');

//后台登录中间件,请把所有后台的路由放在这里!注意删除路径里的admin 和命名空间里的Admin
Route::group(['middleware'=>'islogin','prefix'=>'admin','namespace'=>'Admin'],function (){
//后台的后台用户管理
Route::resource('adminuser','AdminUserController');
//后台的前台用户管理
Route::resource('homeuser','HomeUserController');
//后台广告管理控制器
Route::resource('ad', 'AdController');
//后台轮播图管理控制器
Route::resource('slid', 'SlidController');
});


//前台首页
Route::resource('/home/index', 'Home\IndexController');
Route::get('crypt','Admin\Login\LoginController@crypt');