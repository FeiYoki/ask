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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('admin/index','admin\indexController@index');
Route::get('admin/info','admin\indexController@info');
Route::get('admin/add','admin\indexController@add');

// 后台公告
Route::get('admin/create','admin\noticeController@create');
Route::post('admin/store','admin\noticeController@store');
Route::get('admin/list','admin\noticeController@index');
Route::get('admin/{id}','admin\noticeController@edit');
Route::post('admin/update/{id}','admin\noticeController@update');
Route::delete('admin/notice/{id}','admin\noticeController@destroy');

// 前台回答问题
Route::get('home/answer','home\answerController@index');
Route::post('home/store','home\answerController@store');
