<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Islogin
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
        //如果用户登录了,就放行,如果不存在就提示用户错误信息
        if(Session::get('user'))
        {
            return $next($request);
        }else{
            return redirect('admin/login')->with('errors','请先登录');
        }
    }
}
