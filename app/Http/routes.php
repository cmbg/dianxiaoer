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
    return views('Admin.Home_Page', ['title' => '后台主页']);

});

Route::get('tclass','Admin\TclassController@index');

Route::get('/',function()
{
    return 123456;
});
