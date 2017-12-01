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

//	 return 1111;
    return view('Admin.Home_Page', ['title' => '后台主页']);

});

//Route::resource('Admin/list','Admin\TclassController@index');

Route::get('Admin/index','Admin\IndexController@index');
//分类路由

Route::resource('Admin/Cate/list','Admin\Cate\CateController');

//修改分类排序
Route::post('Admin/Cate/changeorder','Admin\Cate\CateController@changeOrder');
//Route::post('cate/changeorder','CateController@changeOrder');


Route::resource('Admin/Goods', 'Admin\GoodsController');

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

//ajax请求数据广告
Route::post('/admin/ad/ajaxStatus', 'Admin\AdAjaxController@ajaxStatus');
Route::post('/admin/ad/ajaxName', 'Admin\AdAjaxController@ajaxName');
//后台鱼塘管理控制器
Route::resource('/admin/fshop', 'Admin\FshopController');

//前台首页
Route::resource('/home/index', 'Home\IndexController');
//前台申请开通鱼塘
Route::get('/home/sfshop', 'Home\SfshopController@index');
Route::post('/home/sfshop', 'Home\SfshopController@add');
//前台鱼塘管理
Route::resource('/home/fshop', 'Home\FshopController');
