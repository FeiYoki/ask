@extends('layouts.admin')
@section('title')
    <title>后台问题显示</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    <div class="search_wrap">
        <form action="{{url('admin/question')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th style="width:100px;"></th>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" value="{{$request->keywords}}" placeholder="请输入想要查找的关键词"></td>
                    <td><input type="submit"  value="查询"></td>
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
                    <div class="alert alert-danger">
                        @if (count($errors) > 0)

                            @if(is_object($errors))
                                @foreach ($errors->all() as $error)
                                    <p style="color:red">{{ $error }}</p>
                                @endforeach
                            @else
                                <p style="color:red">{{ $errors }}</p>
                            @endif

                        @endif
                    </div>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>点击</th>
                        <th>发布时间</th>
                        <th>分类</th>
                        <th>操作</th>
                    </tr>
                    @foreach($question as $k=>$v)
                        <tr>
                            <td class="tc">{{$v->qid}}</td>
                            <td>
                                <a href="#">{{$v->title}}</a>
                            </td>
                            <td>{{$v->click}}</td>
                            <td>{{date('Y-m-d H:i:s',$v->date)}}</td>
                            <td>{{$v->cate->cname}}</td>
                            <td>
                                <a href="{{url('admin/question/'.$v->qid.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="qDel({{$v->qid}})">删除</a>
                            </td>
                        </tr>
                    @endforeach

                </table>

                <div class="page_list">
                    {!! $question->render() !!}
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

        function qDel(id) {

            //询问框
            layer.confirm('您确认删除问题以及答案吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                //如果用户发出删除请求，应该使用ajax向服务器发送删除请求
                $.post("{{url('admin/question')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                    //删除成功
                    if(data.error == 0){
                        layer.msg(data.msg, {icon: 6});
                        var t=setTimeout("location.href = location.href;",2000);
                    }else{
                        layer.msg(data.msg, {icon: 5});
                        var t=setTimeout("location.href = location.href;",2000);
                    }


                });
            }, function(){

            });
        }
    </script>
@endsection