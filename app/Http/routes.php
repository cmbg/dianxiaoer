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


Route::get('Admin/index','Admin\IndexController@index');



//分类路由
Route::resource('Admin/Cate/list','Admin\Cate\CateController');
//修改分类排序
Route::post('Admin/Cate/changeorder','Admin\Cate\CateController@changeOrder');

//模块二 购物车相关路由  start

Route::resource('shop', 'Home\ShopController');
//Route::controller('shop', 'Home\ShopController');
Route::get('/addcart/{id}', 'Home\ShopController@addcart');
Route::get('/cart', 'Home\ShopController@cart')->name('cart');
Route::get('/shop/removecart/{id}', 'Home\ShopController@getRemovecart');
Route::get('/del', 'Home\ShopController@destroy');

//订单路由
Route::resource('order','Home\OrderController');
//底单成功路由
Route::resource('Home/payment','Home\PaymentController');

Route::resource('Admin/Goods', 'Admin\GoodsController');
//后台登录界面
Route::get('admin/login', 'Admin\LoginController@login');
Route::post('admin/dologin', 'Admin\LoginController@doLogin');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::post('Admin/Ajax','Admin\GoodsController@ajax');

//后台登录中间件,请把所有后台的路由放在这里!注意删除路径里的admin 和命名空间里的Admin
Route::group(['middleware'=>'islogin','prefix'=>'admin','namespace'=>'Admin'],function (){
    //后台的后台用户管理
    Route::resource('adminuser','AdminUserController');
    //后台的前台用户管理
    Route::resource('homeuser','HomeUserController');
   
});



//后台广告和轮播图管理控制器
Route::resource('/admin/ad', 'Admin\AdController');
//ajax请求数据广告
Route::post('/admin/ad/ajaxStatus', 'Admin\AdAjaxController@ajaxStatus');
Route::post('/admin/ad/ajaxName', 'Admin\AdAjaxController@ajaxName');
//后台鱼塘管理控制器
Route::resource('/admin/fishpond', 'Admin\FishpondController');
//ajax请求数据鱼塘
Route::post('/admin/fishpond/ajaxStatus', 'Admin\FishpondAjaxController@ajaxStatus');
Route::post('/admin/fishpond/ajaxName', 'Admin\FishpondAjaxController@ajaxName');
//后台操作前台导航栏
Route::resource('/admin/nav', 'Admin\NavController');
Route::post('/admin/nav/ajaxLinks', 'Admin\NavAjaxController@ajaxLinks');
Route::post('/admin/nav/ajaxName', 'Admin\NavAjaxController@ajaxName');
//后台操作前台友情链接
Route::resource('/admin/links', 'Admin\linksController');



//前台首页
Route::resource('/home/index', 'Home\IndexController');
//前台申请开通鱼塘
Route::get('/home/sfshop', 'Home\SfshopController@index');
Route::post('/home/sfshop', 'Home\SfshopController@add');
//前台塘主对鱼塘商品管理
Route::resource('/home/fshop', 'Home\FshopController');
Route::get('crypt','Admin\Login\LoginController@crypt');


