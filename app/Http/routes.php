<?php
//
///*
//|--------------------------------------------------------------------------
//| Application Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register all of the routes for an application.
//| It's a breeze. Simply tell Laravel the URIs it should respond to
//| and give it the controller to call when that URI is requested.
//|
// */
//
//Route::get('/', function () {
//
////	 return 1111;
//    return view('Admin.Home_Page', ['title' => '后台主页']);
//
//});
//
////Route::resource('Admin/list','Admin\TclassController@index');
//
//Route::get('Admin/index','Admin\IndexController@index');
////分类路由
//
//Route::resource('Admin/Cate/list','Admin\Cate\CateController');
//
//
////修改分类排序
//Route::post('Admin/Cate/changeorder','Admin\Cate\CateController@changeOrder');
////Route::post('cate/changeorder','CateController@changeOrder');
////=================================================================================
////商品管理路由
//Route::resource('Admin/Goods', 'Admin\GoodsController');
//Route::post('Admin/Ajax','Admin\GoodsController@ajax');//修改上架下架状态
////商品详情
////Route::get('Admin/Goods/Details','Admin\DetailsController\sho')
//
//// 商品图片上传
//Route::post('Admin/Goods/upload', 'Admin\GoodsController@upload');//商品图片添加路由
//Route::get('Admin/Det/create/{id}', 'Admin\DetailsController@create');//添加详情页面
//Route::post('Admin/Det/upload', 'Admin\DetailsController@upload');//详情图片添加路由
//Route::post('Admin/Det/store/{id}', 'Admin\DetailsController@store');// 添加路由
//Route::get('Admin/Det/list/{id}', 'Admin\DetailsController@index'); // 浏览详情页浏览详情页
//Route::post('Admin/Det/uploadpic', 'Admin\DetailsController@uploadpic'); // 浏览详图片修改
//
//
////==============================================================================
////鱼塘添加商品
//
Route::resource('/home/fshop', 'Home\FshopController');
////前台申请开通鱼塘
////Route::get('/home/sfshop', 'Home\SfshopController@index');
////Route::post('/home/sfshop', 'Home\SfshopController@add');
////前台塘主对鱼塘商品管理
//
//
//
//
////==================================================================
////后台登录界面
//Route::get('admin/login', 'Admin\LoginController@login');
//Route::post('admin/dologin', 'Admin\LoginController@doLogin');
//Route::get('admin/yzm', 'Admin\LoginController@yzm');
//Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');
//
//
////后台登录中间件,请把所有后台的路由放在这里!注意删除路径里的admin 和命名空间里的Admin
//Route::group(['middleware'=>'islogin','prefix'=>'admin','namespace'=>'Admin'],function (){
//    //后台的后台用户管理
//    Route::resource('adminuser','AdminUserController');
//    //后台的前台用户管理
//    Route::resource('homeuser','HomeUserController');
//
//});
//
////后台广告管理控制器
//Route::resource('/admin/ad', 'Admin\AdController');
//Route::resource('ad', 'AdController');
////后台轮播图管理控制器
//Route::resource('slid', 'SlidController');
//
////前台首页
//Route::resource('/home/index', 'Home\IndexController');
////ajax请求数据广告
//Route::post('/admin/ad/ajaxStatus', 'Admin\AdAjaxController@ajaxStatus');
//Route::post('/admin/ad/ajaxName', 'Admin\AdAjaxController@ajaxName');
////后台鱼塘管理控制器
//
////=============================
////修改删除以前路由
////============================
//
////前台首页
//Route::resource('/home/index', 'Home\IndexController');
////前台申请开通鱼塘
////=====
//
////=======
//
//Route::get('crypt','Admin\Login\LoginController@crypt');
