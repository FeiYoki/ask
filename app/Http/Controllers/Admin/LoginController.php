<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
require_once app_path().'\Org\code\Code.class.php';
use App\Org\code\Code;
class LoginController extends Controller
{
    /* *
     *  返回后台登录页面
     * @auth  tangyang
     * @date  2017-11-28
     * @return  view
      */
    public function login()
    {
        return view('admin.login');
    }
    public function yzm()
    {
        $code = new Code();
        $code->make();
    }

    /*
     * 登录逻辑处理
     *
     * */
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
            return redirect('admin/login')->withErrors($validator)->withInput();
        }
        //登录逻辑判断
        //1.首先判断验证码是否正确
        $admincode = strtolower(Session::get('code'));//把验证码转化为小写
        $usercode = strtolower($input['code']);
        if(  $usercode != $admincode){
            return redirect('admin/login')->with('errors','验证码错误')->withInput();
        }

        //2.判断是否有此用户
        $user = User::where('name',$input['username'])->first();
        if(!$user){
            return redirect('admin/login')->with('errors','用户名不存在')->withInput();
        }
        //3.判断密码是否正确
        //前台用户输入的密码 $input['password']
        //后台用户输入的密码 $user->password
        if(Crypt::decrypt($user->password) != trim($input['password']))
        {
            return redirect('admin/login')->with('errors','密码错误')->withInput();
        }
        //4.登录成功,将数据保存到session中，用于判断用户是否登录,以及获取用户信息
        Session::put('user',$user);
        return redirect('admin/index');

    }
    //密码加密----这段代码没用,只是用作生成一个加密字符串
    public function llll()
    {
        $str = '123456';
        $cry = Crypt::encrypt($str);
        return $cry;
    }
}
