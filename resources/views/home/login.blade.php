<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="keywords" content="">
    <meta name="content" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="{{asset('home/loginstyle/css/login.css')}}">
    <script type="text/javascript" src="{{asset('home/loginstyle/js/jquery-1.8.0.min.js')}}"></script>
</head>
<body class="login_bj" >
<div class="zhuce_body">
    <div class="logo"><a href="#"></a></div>
    <div class="zhuce_kong login_kuang">
        <div class="zc">
            <div class="bj_bai">
                <h3>登录</h3>
                @if(is_object($errors))
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                @else
                    <li style="color:red">{{ $errors }}</li>
                @endif
                <form action="{{ url('home/dologin') }}" method="post">
                    {{ csrf_field() }}
                    <input name="username" type="text" class="kuang_txt" placeholder="手机号">
                    <input name="password" type="text" class="kuang_txt" placeholder="密码">
                    <li>
                        <input type="text" class="code" name="code"/>
                        <span><i class="fa fa-check-square-o"></i></span>
                        <img src="{{ url('admin/yzm') }}" alt="" onclick="this.src='{{ url('admin/yzm')}}?'+Math.random()">
                    </li>
                    <div>
                        <a href="#">忘记密码？</a><input name="" type="checkbox" value="" checked><span>记住我</span>
                    </div>

                    <input name="登录" type="submit" class="btn_zhuce" value="登录">
                </form>
            </div>
            <div class="bj_right">
                <p>使用以下账号直接登录</p>
                <a href="#" class="zhuce_qq">QQ注册</a>
                <a href="#" class="zhuce_wb">微博注册</a>
                <a href="#" class="zhuce_wx">微信注册</a>
                <p>已有账号？<a href="#">立即登录</a></p>

            </div>
        </div>
        <P><a href="http://www.mycodes.net/" target="_blank">源码之家</a></P>
    </div>

</div>

</body>
</html>