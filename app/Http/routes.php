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

// 后台回答管理模块
Route::resource('admin/answer','admin\AnswerController');


// 后台公告
Route::get('admin/create','admin\noticeController@create');
Route::post('admin/store','admin\noticeController@store');
Route::get('admin/list','admin\noticeController@index');
Route::get('admin/{id}','admin\noticeController@edit');
Route::post('admin/update/{id}','admin\noticeController@update');
Route::delete('admin/notice/{id}','admin\noticeController@destroy');

// 前台回答问题模块
Route::get('home/answer','home\answerController@index');
Route::post('home/answer/store','home\answerController@store');
Route::get('home/answer/edit/{id}','home\answerController@edit');

// 前台公告
Route::get('home/notice','home\noticeController@index');
