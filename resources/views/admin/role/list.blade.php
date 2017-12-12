@extends('layouts.admin')
@yield('title')
<title>后台浏览分类</title>
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->


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

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th class="tc">角色名称</th>
                        <th class="tc">角色描述</th>
                        <th class="tc">操作</th>
                    </tr>
                    @foreach($roles as $k=>$v)
                        <tr>
                            <td class="tc">{{$v->rid}}</td>
                            <td class="tc">{{$v->name}}</td>
                            <td class="tc">{{$v->description}}</td>
                            <td>
                                <a href="{{url('admin/role/auth/'.$v->rid)}}">授权</a>
                                <a href="{{url('admin/role/'.$v->rid.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="roleDel({{$v->rid}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>

//        ajax删除
        function roleDel(id) {
            // 询问框
            layer.confirm('您确认删除吗？',{
                btn:['确认','取消']     //按钮
            },function () {
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get('请求服务器的路径', '携带的参数', 获取执行后的额返回数据);
//                admin/user/1
                $.post("{{ url('admin/role') }}/" + id,
                    {
                        "_method": "delete",
                        "_token": "{{csrf_token()}}"
                    },
                    function (data) {
//                        alert(data);
//                        如果删除成功，提示删除成功
                        if(data.error==0) {
                            layer.msg(data.msg, {icon:6});
                            var t = setTimeout("location.href = location.href;", 2000);
                        }else {
                            layer.msg(data.msg, {icon:5});
                            var t = setTimeout("location.href = location.href;", 2000);
                        }

                    });
            })
        }

    </script>

