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
Route::get('admin/index', 'Admin\IndexController@index');
Route::get('admin/info', 'Admin\IndexController@info');
Route::get('admin/logout','Admin\IndexController@logout');

//后台问题模块路由
Route::resource('admin/question','Admin\QuestionController');
//前台问题模块路由
Route::resource('home/question','Home\QuestionController');
//积分模块
Route::resource('admin/point','Admin\PointController');



//后台用户注册
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');
//后台验证码
Route::get('admin/yzm','Admin\LoginController@yzm');


// 分类模块路由





Route::group(['middleware' => ['hasrole'], 'prefix'=>'admin', 'namespace'=>'Admin'],function (){

//    用户授权路由
    Route::get('user/auth/{id}','UserController@auth');
    Route::post('user/doauth','UserController@doauth');

//后台用户路由
    Route::resource('user','UserController');
//    角色授权路由
    Route::resource('role', 'RoleController');
    Route::get('role/auth/{id}', 'RoleController@auth');
    Route::post('role/doauth', 'RoleController@doauth');
//角色管理


//权限管理
    Route::resource('permission', 'PermissionController');

});

Route::get('errors/auth',function(){
    return view('errors.auth');
});


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

// 前台公告
Route::get('home/notice','home\noticeController@index');

// 前台回答问题模块
Route::get('home/answer','home\answerController@index');

Route::post('home/answer/store','home\answerController@store');
Route::get('home/answer/edit/{id}','home\answerController@edit');



//网站配置排序
Route::post('admin/config/changeOrder', 'Admin\ConfigController@changeOrder');
// 网站配置批量修改
Route::post('admin/config/contentchange', 'Admin\ConfigController@ContentChange');
//同步网站配置表中的内容到webconfig配置文件中
Route::get('admin/config/putfile','Admin\ConfigController@PutFile');
// 网站配置路由
Route::resource('admin/config', 'Admin\ConfigController');





