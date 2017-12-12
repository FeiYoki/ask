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
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th class="tc">友情链接名</th>
                        <th class="tc">提示url</th>
                        <th class="tc">操作</th>
                    </tr>
                    @foreach($links as $k=>$v)
                        <tr>
                            <td class="tc">
                                <label for=""><input style="width: 35px" type="text" onchange="changeOrder(this,{{$v->lid}})" value="{{$v->order}}"></label>
                            </td>
                            <td class="tc">{{$v->lid}}</td>
                            <td class="tc">{{$v->name}}</td>
                            <td class="tc">{{$v->url}}</td>
                            <td>
                                <a href="{{url('admin/link/'.$v->lid.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="linkDel({{$v->lid}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        {{--<div class="page_nav">
            <div>
                <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a>
                <a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
                <span class="current">8</span>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a>
                <a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a>
                <a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a>
                <span class="rows">11 条记录</span>
            </div>
        </div>--}}



        {{--<div class="page_list">
            <ul>
                <li class="disabled"><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>--}}
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>
//        排序
        function changeOrder(obj, lid) {
//      获取当前排序的ID，cid
//      获取当前记录的排序文本框中的值
        var order = $(obj).val();
            {{--$.post("{{url('admin/cate/changeorder')}}",{'_token':"{{csrf_token()}}","cate_id":cate_id,"cate_order":cate_order},--}}
            $.post(
                "{{ url('admin/link/changeOrder') }}",
                {
                    '_token':"{{csrf_token()}}",
                    "lid": lid,
                    "order": order,
                },
                function (data) {
//                    如果排序成功，提示排序成功
                    if(data.status == 0) {
                        layer.msg(data.msg, {icon: 6});
                        location.href = location.href;
                    }else {
//                        如果排序失败，提示排序失败
                        layer.msg(data.msg, {icon: 5});
                        location.href = location.href;
                    }
                });
        }

//        ajax删除
        function linkDel(id) {
            // 询问框
            layer.confirm('您确认删除吗？',{
                btn:['确认','取消']     //按钮
            },function () {
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get('请求服务器的路径', '携带的参数', 获取执行后的额返回数据);
//                admin/user/1
                $.post("{{ url('admin/link') }}/" + id,
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

