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
Route::post('Admin/Ajax','Admin\GoodsController@ajax');

Route::get('admin/login', 'Admin\Login\LoginController@login');
Route::post('admin/dologin', 'Admin\Login\LoginController@doLogin');
Route::get('admin/yzm', 'Admin\Login\LoginController@yzm');
Route::get('/code/captcha/{tmp}', 'Admin\Login\LoginController@captcha');
//后台广告管理控制器
Route::resource('/admin/ad', 'Admin\AdController');
//后台轮播图管理控制器
Route::resource('/admin/slid', 'Admin\SlidController');

//前台首页
Route::resource('/home/index', 'Home\IndexController');
