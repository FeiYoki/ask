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

Route::get('home/index','Home\IndexController@index');

Route::get('home/answer','Home\answerController@index');

Route::get('home/question','Home\questionController@index');

Route::get('home/content','Home\contentController@index');

Route::get('home/interest','Home\interestController@index');

Route::get('home/person','Home\personController@index');

Route::get('home/search','Home\searchController@index');

Route::get('admin/index','admin\indexController@index');

Route::get('admin/info','admin\indexController@info');

Route::get('admin/add','admin\indexController@add');




Route::get('admin/create','admin\noticeController@create');

Route::post('admin/store','admin\noticeController@store');

Route::get('admin/list','admin\noticeController@index');

Route::get('admin/{id}','admin\noticeController@edit');

Route::post('admin/update/{id}','admin\noticeController@update');

Route::delete('admin/notice/{id}','admin\noticeController@destroy');