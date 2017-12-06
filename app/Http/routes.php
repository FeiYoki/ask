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


Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');
//验证码
Route::get('admin/yzm','Admin\LoginController@yzm');
//后台操作页面
Route::group(['middleware'=>'islogin','prefix'=>'admin','namespace'=>'Admin'],function(){
   Route::get('index','IndexController@index');
   Route::get('logout','IndexController@logout');
  
    

    //用户路由
    Route::resource('user','UserController');
   

 
});
//前台登录路由
Route::get('home/login','Home\LoginController@login');
Route::post('home/dologin','Home\LoginController@dologin');
//
