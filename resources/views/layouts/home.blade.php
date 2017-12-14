<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @yield('title')
    <meta name="author" content="php193 ask team" />
    <meta name="copyright" content="2017 ask.com" />
    <!-- Bootstrap -->
    <link href="{{ asset('/static/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/static/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/default/global.css')}}" rel="stylesheet" />
    <link href="{{ asset('/static/js/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/static/js/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="top-common-nav  mb-50">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo"><a class="navbar-brand logo" href="http://localhost/tipask-3.2.1/public"></a></div>
            </div>

            <div class="collapse navbar-collapse" id="global-navbar">
                <form class="navbar-form navbar-left" role="search" id="top-search-form" action="{{asset('home/research/search')}}" method="post">
                {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" name="word" id="searchBox" class="form-control" placeholder="" />
                        <span class="input-group-addon btn" ><span id="search-button" class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                    </div>
                </form>
                <ul class="nav navbar-nav">
                    <li ><a href="http://localhost/tipask-3.2.1/public">首页 <span class="sr-only">(current)</span></a></li>

                                        <li ><a href="http://localhost/tipask-3.2.1/public/doings">发现</a></li>
                                        <li ><a href="http://localhost/tipask-3.2.1/public/questions">问答</a></li>
                    <li ><a href="http://localhost/tipask-3.2.1/public/articles">文章</a></li>
                    <li ><a href="http://localhost/tipask-3.2.1/public/topics">话题</a></li>
                    <li ><a href="http://localhost/tipask-3.2.1/public/shop">商城</a></li>
                </ul>
                                    <ul class="nav navbar-nav user-menu navbar-right">
                       
                        <li class="dropdown user-avatar">
                            <a href="http://localhost/tipask-3.2.1/public/profile/base" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img class="avatar-32 mr-5" alt="feng" src="http://localhost/tipask-3.2.1/public/image/avatar/3_middle.jpg" >
                                <span>feng</span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                
                                <li><a href="http://localhost/tipask-3.2.1/public/people/3">我的主页</a></li>
                                <li><a href="http://localhost/tipask-3.2.1/public/notifications">我的私信</a></li>
                                <li><a href="http://localhost/tipask-3.2.1/public/profile/base">账号设置</a></li>
                                <li class="divider"></li>
                                <li><a href="http://localhost/tipask-3.2.1/public/logout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                            </div>
        </div>
    </nav>
</div>


@section('body')
@show


<footer id="footer">
    <div class="container">
                <div class="text-center">
            <a href="http://localhost/tipask-3.2.1/public">Tipask问答网</a><span class="span-line">|</span>
            <a href="mailto:1804477037@qq.com" target="_blank">联系我们</a><span class="span-line">|</span>
                    </div>
        <div class="copyright mt-10">
            Powered By <a href="http://www.tipask.com" target="_blank">Tipask3.2</a> Release 20170412 ©2009-2017 tipask.com
        </div>
    </div>
</footer>


</body>
</html>