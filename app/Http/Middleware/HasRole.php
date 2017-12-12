<?php

namespace App\Http\Middleware;

use App\Http\Model\Role;
use App\Http\Model\User;
use Closure;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        如果当前用户有正在执行的路由的权限就放行，没有就给一个没有权限的提示
//        1.获取当前用户执行，执行的操作对应的路由及控制器的方法
//        当前正在执行的路由对应的控制器及方法名
        $route = \Route::current()->getActionName();

//         dd($route);

//        2.获取当前用户的所有权限
//        获取当前用户
        $uid = session('user')->id;
//        dd($uid);
        $user = User::find($uid);
//        dd($user);
//        2.1获取当前用户拥有的角色
        $roles = $user->role;
//        dd($roles);

//        定义一个数组来存放用户的所有权限
        $arr = [];
//        2.2 根据拥有的角色获取权限
        foreach ($roles as $k => $v) {
//            根据角色找到相关权限的数组
          foreach ($v->permission as $m => $n) {
               $arr[] = $n->description;
           }
        }
//        dd($arr);
//        去除权限中重复的记录
        $arr = array_unique($arr);
//        2.3 判断当前路由对应的控制器及方法是否在用户拥有的权限中

//        如果当前路由对应的控制器及方法在用户拥有的权限中，让其进入页面；如果不在就提示没有权限
        if (in_array($route, $arr)) {
            return $next($request);
        } else {
            return redirect('errors/auth');
        }
    }
}
