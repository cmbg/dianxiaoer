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
//后台登录界面
Route::get('admin/login', 'Admin\LoginController@login');
Route::post('admin/dologin', 'Admin\LoginController@doLogin');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::post('Admin/Ajax','Admin\GoodsController@ajax');

//后台登录中间件,请把所有后台的路由放在这里!注意删除路径里的admin 和命名空间里的Admin
//Route::group(['middleware'=>'islogin','prefix'=>'admin','namespace'=>'Admin'],function (){
    //后台的后台用户管理
    Route::resource('admin/adminuser','Admin\AdminUserController');
    //后台的前台用户管理
    Route::resource('homeuser','HomeUserController');
   
//});


Route::get('admin/adminuser/auth/{id}', 'Admin\AdminUserController@auth');//显示用户授权路由界面
Route::post('admin/adminuser/doauth', 'Admin\AdminUserController@doauth');//执行用户授权路由

//Route::group(['middleware'=>'hasrole'],function (){
//后台广告和轮播图管理控制器
Route::resource('/admin/ad', 'Admin\AdController');
Route::post('/admin/ad/ajaxStatus', 'Admin\AdAjaxController@ajaxStatus');//修改广告的状态
Route::post('/admin/ad/ajaxName', 'Admin\AdAjaxController@ajaxName');//执行广告中客户信息的修改

//后台鱼塘管理控制器
Route::resource('/admin/fishpond', 'Admin\FishpondController');
Route::post('/admin/fishpond/ajaxStatus', 'Admin\FishpondAjaxController@ajaxStatus');
Route::post('/admin/fishpond/ajaxName', 'Admin\FishpondAjaxController@ajaxName');

//后台操作前台导航栏
Route::resource('/admin/nav', 'Admin\NavController');
Route::post('/admin/nav/ajaxLinks', 'Admin\NavAjaxController@ajaxLinks');
Route::post('/admin/nav/ajaxName', 'Admin\NavAjaxController@ajaxName');
Route::post('/admin/nav/ajaxPai', 'Admin\NavAjaxController@ajaxPaixu');
//});
//后台操作前台友情链接
Route::resource('/admin/links', 'Admin\LinksController');
Route::post('/admin/links/limg', 'Admin\linkslimgController@limg');
Route::post('/admin/links/editlimg', 'Admin\linkslimgController@editlimg');
Route::post('/admin/links/ajaxName', 'Admin\LinksAjaxController@ajaxName');

//角色管理
Route::resource('/admin/role', 'Admin\RoleController');
Route::get('admin/role/auth/{id}', 'Admin\RoleController@auth');//显示角色授权路由界面
Route::post('admin/role/doauth', 'Admin\RoleController@doauth');//执行角色授权路由

//权限管理
Route::resource('/admin/permission', 'Admin\PermissionController');

//后台订单管理
Route::resource('/admin/order', 'Admin\OrderController');
Route::get('/admin/order/give/{id}', 'Admin\OrderController@give');

//前台首页
Route::resource('/home/index', 'Home\IndexController');
Route::get('/home/order', 'Home\OrderController@index');

//前台申请开通鱼塘
Route::get('/home/sfshop', 'Home\SfshopController@index');
Route::post('/home/sfshop', 'Home\SfshopController@add');

//前台塘主对鱼塘商品管理
Route::resource('/home/fshop', 'Home\FshopController');
