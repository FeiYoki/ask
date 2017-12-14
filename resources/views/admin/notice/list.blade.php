@extends('layouts.admin')
@section('body')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="{{asset('admin/list')}}" method="get">
            {{csrf_field()}}
            <table class="search_tab">
                <tr>
                    
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" value="{{$input}}" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
                    <div class="alert alert-danger">
                        <ul>
                            <!-- @if(session('msg'))
                                <li style="color:red">{{session('msg')}}</li>
                            @endif -->
                        </ul>
                    </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>内容</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($notice as $v)
                    <tr>
                    
                        <td class="tc">{{$v->nid}}</td>
                        <td>{{$v->title}}</td>
                        <td>{{$v->content}}</td>
                        <td>{{$v->date}}</td>
                        <td>
                            <a href="{{asset('admin/'.$v->nid)}}">修改</a>
                            <a href="javascript:;"onclick="noticeDel({{$v->nid}})">删除</a>
                        </td>
                    
                    </tr>
                    @endforeach
                   
                </table>
                <div class="page_list">
                    @if(empty($input))
                        {!! $notice->render() !!}
                    @else
                        {!! $notice->appends(['keywords'=>$input])->render() !!}
                    @endif
                </div>
                <style>
                    .page_list ul li span{
                        padding:6px 12px;
                    }
                </style>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>

        //询问框
        function noticeDel(id)
        {
            layer.confirm('您确认删除吗？', {
              btn: ['删除','取消'] //按钮
            }, function(){
              // layer.msg('已经删除', {icon: 1});
              $.post("{{url('admin/notice')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                    // console.log(data);
                    if(data['error']==0){
                        layer.msg(data['msg'], {icon: 1});
                        var t=setTimeout("location.href = location.href;",2000);
                    }else{
                        layer.msg(data['msg'], {icon: 1});
                        var t=setTimeout("location.href = location.href;",2000);
                    }
              })
            }, function(){
   
            });
        }
    </script>
@endsection