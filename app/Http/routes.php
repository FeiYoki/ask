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
    return view('welcome');
});
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');
//验证码
Route::get('admin/yzm','Admin\LoginController@yzm');
//生成crypt加密密码的路由
Route::get('admin/llll','Admin\LoginController@crypt');
//后台操作页面
Route::group(['middleware'=>'islogin','prefix'=>'admin','namespace'=>'Admin'],function(){
   Route::get('index','IndexController@index');
   Route::get('logout','IndexController@logout');
   Route::get('info','IndexController@info');
    Route::get('cate','CateController@changeOrder');

    //用户路由
    Route::resource('user','UserController');
    //分类模块路由
    Route::resource('cate','CateController');
    //权限操作页面
    Route::resource('permission','PermissionController');
});
//前台登录路由
Route::get('home/login','Home\LoginController@login');
Route::post('home/dologin','Home\LoginController@dologin');
Route::get('home/index','Home\LoginController@index');
//权限操作页面
