@extends('layouts.fei-home')
@section('title')
    <title>我的题问</title>
@endsection
@section('body')

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
                <form class="navbar-form navbar-left" role="search" id="top-search-form" action="http://localhost/tipask-3.2.1/public/search" method="GET">
                    <div class="input-group">
                        {{csrf_field()}}
                        <input type="text" name="word" id="searchBox" class="form-control" placeholder="" />
                        <span class="input-group-addon btn" >搜索</span>
                    </div>
                </form>
                <ul class="nav navbar-nav">
                    <li ><a href="http://localhost/tipask-3.2.1/public">首页 <span class="sr-only">(current)</span></a></li>

                    {{--<li ><a href="http://localhost/tipask-3.2.1/public/doings">发现</a></li>--}}
                    <li ><a href="http://localhost/tipask-3.2.1/public/questions">问答</a></li>
                    {{--<li ><a href="http://localhost/tipask-3.2.1/public/articles">文章</a></li>--}}
                    {{--<li ><a href="http://localhost/tipask-3.2.1/public/topics">话题</a></li>--}}
                    {{--<li ><a href="http://localhost/tipask-3.2.1/public/shop">商城</a></li>--}}
                </ul>
                <ul class="nav navbar-nav user-menu navbar-right">
                    {{--<li><a href="http://localhost/tipask-3.2.1/public/notifications" class="active" id="unread_notifications"><span class="fa fa-bell-o fa-lg"></span></a></li>--}}
                    {{--<li><a href="http://localhost/tipask-3.2.1/public/messages" class="active" id="unread_messages"><i class="fa fa-envelope-o fa-lg"></i></a></li>--}}
                    <li class="dropdown user-avatar">
                        <a href="http://localhost/tipask-3.2.1/public/profile/base" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img class="avatar-32 mr-5" alt="admin" src="http://localhost/tipask-3.2.1/public/image/avatar/1_middle.jpg" >
                            <span></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="http://localhost/tipask-3.2.1/public/admin/index">系统设置</a></li>
                            <li class="divider"></li>

                            <li><a href="http://localhost/tipask-3.2.1/public/people/1">我的主页</a></li>
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
<div class="top-alert mt-60 clearfix text-center">
    <!--[if lt IE 9]>
    <div class="alert alert-danger topframe" role="alert">你的浏览器实在<strong>太太太太太太旧了</strong>，放学别走，升级完浏览器再说
        <a target="_blank" class="alert-link" href="http://browsehappy.com">立即升级</a>
    </div>
    <![endif]-->



</div>

<div class="wrap">
    <div class="container">
        <div class="row mt-10">
            <ol class="breadcrumb">
                <li><a href="http://localhost/tipask-3.2.1/public/questions">问答</a></li>
                <li class="active">发起提问</li>
            </ol>
            <form id="questionForm" method="POST" role="form" action="{{url('home/question')}}">
                {{csrf_field()}}
                {{--<input type="hidden" id="editor_token" name="_token" value="GSqPLHblpdRfUWF8YTA2qQGEro60OZ8T6ceCBnKQ" />--}}
                {{--<input type="hidden" id="tags" name="tags" value="" />--}}
                {{--<input type="hidden" name="to_user_id" value="0" />--}}
                <input type="hidden" name="click" value="0" />
                <div class="form-group  ">
                    <label for="title"> 请将您的问题告诉我们  :</label>
                    <input id="title" type="text" name="title"   class="form-control input-lg" placeholder="请在这里概述您的问题" value="" />
                </div>

                <div id="titleSuggest" class="panel hide widget-suggest panel-default">
                    <div class="panel-body">
                        <p>
                            <strong>这些问题可能有你需要的答案</strong>
                            <button type="button" class="widget-suggest-close btn btn-default btn-xs ml-10">关闭提示</button>
                        </p>
                        <ul id="suggest-list" class="list-unstyled widget-suggest-list"></ul>
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="question_editor">问题描述(选填)</label>
                    <div id="question_editor">

                        <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
                        <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
                        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                        <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

                        <script id="editor" name="content" type="text/plain" style="width:1170px;height:180px;"></script>
                        <script>
                        var ue = UE.getEditor('editor', {
                            toolbars: [
                                ['fullscreen', 'source', 'undo', 'redo', 'bold','italic','underline','blockquote','link','insertorderedlist','insertunorderedlist','simpleupload','insertimage']
                            ],
                            autoHeightEnabled: true,
                            autoFloatEnabled: true
                        });
                        </script>
                        <style>
                            .edui-default{line-height: 28px;}
                            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                            {overflow: hidden; height:20px;}
                            div.edui-box{overflow: hidden; height:22px;}
                        </style>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <select name="cid" id="category_id" class="form-control">
                                <option value="">请选择分类</option>
                                @foreach($cates as $k=>$v)
                                    @if(!($v->pid))
                                        <option value="{{$v->cid}}" disabled >{{$v->cnames}}</option>
                                    @else
                                        <option value="{{$v->cid}}">{{$v->cnames}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{--<div class="col-md-7">--}}
                        {{--<div class="form-group">--}}
                            {{--<select id="select_tags" name="select_tags" class="form-control" multiple="multiple" >--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

                <div class="row mt-20">
                    <div class="col-xs-12 col-md-11">
                        <ul class="list-inline">
                            {{--<li>--}}
                                {{--<select name="price">--}}
                                    {{--<option selected="selected" value="0">0</option><option value="3">3</option><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="30">30</option><option value="50">50</option><option value="80">80</option><option value="100">100</option>--}}
                                {{--</select>&nbsp;金币--}}
                            {{--</li>--}}
                            {{--<li><input type="checkbox" name="hide" value="1" />&nbsp;匿名</li>--}}
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-1">
                        {{--<input type="hidden" id="question_editor_content"  name="description" value=""  />--}}
                        <button type="submit" class="btn btn-primary pull-right" >发布问题</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>



<footer id="footer">
    <div class="container">
        <div class="text-center">
            <a href="http://localhost/tipask-3.2.1/public">php193问答系统</a><span class="span-line">|</span>
            <a href="mailto:zhangyunfei0033@163.com" target="_blank">联系我们</a><span class="span-line">|</span>
        </div>
        <div class="copyright mt-10">
            Powered By <a href="http://www.tipask.com" target="_blank">Tipask3.2</a> Release 20170412 ©2009-2017 tipask.com
        </div>
    </div>
</footer>
@endsection
