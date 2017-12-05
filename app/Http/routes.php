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

// 进入首页路由
Route::get('/admin/index', 'Admin\IndexController@index');
Route::get('/admin/info', 'Admin\IndexController@info');

// 分类模块路由

Route::resource('admin/cate', 'Admin\CateController');
Route::post('admin/cate/changeOrder', 'Admin\CateController@changeOrder');

// 友情链接路由
Route::post('admin/link/changeOrder', 'Admin\LinkController@changeOrder');
Route::resource('admin/link','Admin\LinkController');