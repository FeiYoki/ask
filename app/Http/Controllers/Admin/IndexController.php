<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    //
    public function logout(Request $request)
    {
        //清空Session里的用户数据
        $request->session()->flush();
        return redirect('admin/login');
    }
    /*
     * 返回后台首页信息的视图
     * */
    public function info()
    {
        return view('admin.info');
    }
}
