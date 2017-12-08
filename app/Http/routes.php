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

//后台登录界面
Route::get('admin/login', 'Admin\LoginController@login');
Route::post('admin/dologin', 'Admin\LoginController@doLogin');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::post('Admin/Ajax','Admin\GoodsController@ajax');

//前台登录界面
Route::get('home/login', 'Home\LoginController@login');
Route::post('home/dologin', 'Home\LoginController@doLogin');
Route::get('home/register','Home\LoginController@register');
// Route::get('home/doregister','Home\LoginController@doregister');
Route::post('home/doregister','Home\LoginController@doregister');
//===========================================================================
//商品管理路由
Route::resource('Admin/Goods', 'Admin\GoodsController');
Route::post('Admin/Ajax','Admin\GoodsController@ajax');//点击上架下架状态
//商品详情
//Route::get('Admin/Goods/Details','Admin\DetailsController\sho');

// 商品图片上传
Route::post('Admin/Goods/upload', 'Admin\GoodsController@upload');//商品图片添加路由
Route::get('Admin/Det/create/{id}', 'Admin\DetailsController@create');//添加详情页面
Route::post('Admin/Det/upload', 'Admin\DetailsController@upload');//详情图片添加路由
Route::post('Admin/Det/store/{id}', 'Admin\DetailsController@store');// 添加路由
Route::get('Admin/Det/list/{id}', 'Admin\DetailsController@index'); // 浏览详情页浏览详情页
Route::post('Admin/Det/uploadpic', 'Admin\DetailsController@uploadpic'); // 浏览详图片修改
//

////鱼塘添加商品
//
Route::resource('/home/fshop', 'Home\FshopController');
//前台申请开通鱼塘
Route::get('/home/sfshop', 'Home\SfshopController@index');
Route::post('/home/sfshop', 'Home\SfshopController@add');
//前台塘主对鱼塘商品管理
Route::post('home/fshop/upload', 'Home\FshopController@upload');
Route::post('home/Ajax','Home\FshopController@ajax');//点击上架下架状态
Route::get('home/Det/create/{id}', 'Home\DetController@create');//添加详情页面
Route::post('home/Det/upload', 'home\DetController@upload');//详情图片添加路由
Route::post('home/Det/store/{id}', 'Home\DetController@store');// 添加路由
Route::get('home/Det/list/{id}', 'Home\DetController@index'); // 浏览详情页浏览详情页
Route::post('home/Det/uploadpic', 'Home\DetController@uploadpic'); // 浏览详图片修改
Route::post('home/Det/update', 'Home\DetController@update'); // 浏览详图片修改
Route::get('home/Det/edit/{id}', 'Home\DetController@edit'); // 修改商品详情页面

//==============================================================================

//===============================
    //前台商品展示
Route::get('home/goods/list', 'Home\Good_ListController@index');

//=================================

//后台登录中间件,请把所有后台的路由放在这里!注意删除路径里的admin 和命名空间里的Admin
Route::group(['middleware'=>'islogin','prefix'=>'admin','namespace'=>'Admin'],function (){
    //后台的后台用户管理
    Route::resource('adminuser','AdminUserController');
    Route::post('upload','AdminUserController@upload');
    //后台的前台用户管理
    Route::resource('homeuser','HomeUserController');
   Route::post('homeupload','HomeUserController@upload');
});

Route::post('/admin/adminuserinfo/ajaxStatus', 'Admin\AdminUserInfoAjaxController@ajaxStatus');
Route::post('/admin/homeuserinfo/ajaxStatus', 'Admin\HomeUserInfoAjaxController@ajaxStatus');
Route::post('/admin/homeuserindex/ajaxIdentity', 'Admin\HomeUserInfoAjaxController@ajaxIdentity');
Route::post('/admin/adminuserindex/ajaxIdentity', 'Admin\AdminUserInfoAjaxController@ajaxIdentity');

//后台广告和轮播图管理控制器
Route::resource('/admin/ad', 'Admin\AdController');
//Route::get('/admin/ad/rev/{id}', 'Admin\AdRevController@revision');//显示广告编辑页面
//Route::post('/admin/ad/rev/{id}', 'Admin\AdRevController@revision');//执行广告编辑页面
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
Route::resource('/admin/links', 'Admin\LinksController');
Route::post('/admin/links/limg', 'Admin\linkslimgController@limg');
Route::post('/admin/links/editlimg', 'Admin\linkslimgController@editlimg');
Route::post('/admin/links/ajaxName', 'Admin\LinksAjaxController@ajaxName');
//角色管理
Route::resource('/admin/role', 'Admin\RoleController');


//前台首页
Route::resource('/home/index', 'Home\IndexController');
//前台个人中心
Route::get('/home/my_account','Home\UserController@index');
Route::post('/home/my_account','Home\UserController@update');
//前台个人中心的地址
Route::get('home/my_address','Home\UserController@my_address');
//前台个人中心的修改密码
Route::get('/home/my_password','Home\UserController@password');
Route::post('/home/domy_password','Home\UserController@dopassword');
// 前台个人中心的上传头像
Route::post('/home/upload','Home\UserController@upload');
//前台申请开通鱼塘
Route::get('/home/sfshop', 'Home\SfshopController@index');
Route::post('/home/sfshop', 'Home\SfshopController@add');
//前台塘主对鱼塘商品管理
Route::resource('/home/fshop', 'Home\FshopController');
