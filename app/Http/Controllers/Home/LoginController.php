<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\HomeUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('home/index');
    }
    public function login()
    {

        return view('home.login');
    }
    public function dologin(Request $request)
    {
        //1获取用户提交的数据
        $input = $request->except("_token");
        //2.对数据进行后台验证

        //Validator::make(要验证的数据,验证规则,提示验证信息)
        //验证规则
        $rule = [
            'username' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
            'password' => 'required|between:3,20',
        ];
        $mess = [
            'username.required'=>'用户名必须输入',
            'username.regex'=>'用户名必须汉字字母下划线',
            'username.between'=>'用户名必须在5到20位之间',
            'password.required'=>'密码必须输入',
            'password.between'=>'密码必须在5到20位之间'
        ];


        $validator =  Validator::make($input,$rule,$mess);
        if ($validator->fails()) {
            return redirect('home/login')->withErrors($validator)->withInput();
        }
        //登录逻辑判断
        //1.首先判断验证码是否正确
        $homecode = strtolower(Session::get('code'));//把验证码转化为小写
        $usercode = strtolower($input['code']);
        if(  $usercode != $homecode){
            return redirect('home/login')->with('errors','验证码错误')->withInput();
        }

        //2.判断是否有此用户
        $user = HomeUser::where('uname',$input['username'])->first();
        if(!$user){
            return redirect('home/login')->with('errors','用户名不存在')->withInput();
        }
        //3.判断密码是否正确
        //前台用户输入的密码 $input['password']
        //后台用户输入的密码 $user->password
        if(Crypt::decrypt($user->password) != trim($input['password']))
        {
            return redirect('home/login')->with('errors','密码错误')->withInput();
        }
        //4.登录成功,将数据保存到session中，用于判断用户是否登录,以及获取用户信息
        Session::put('user',$user);
        return redirect('home/index');

    }

}
