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
    <form action="{{url('admin/link')}}" method="get">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                 <div>
                     <th width="70">链接名称：</th>
                     <td><input type="text" name="name" ></td>
                     <th>链接URL：</th>
                     <td><input type="text" name="url" ></td>
                     <input type="submit" value="查询">
                 </div>
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                    @if(session('msg'))
                        <small class="tishi"><span class="text-red" style="color:red;font-size:30px">{{session('msg')}}</span></small>
                    @endif
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div >
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @if(is_object($errors))
                                @foreach ($errors->all() as $error)
                                    <li style="color:red">{{ $error }}</li>
                                @endforeach
                            @else
                                <li style="color:red">{{ $errors }}</li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
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



        <style>
            table{table-layout: fixed;word-break: break-all; word-wrap: break-word; //表格固定布局}

            .award-name{-o-text-overflow:ellipsis;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:100%; //超出部分显示省略号}

        </style>

        <div class="page_nav" style=" margin-left:455px;">
            {{--{{var_dump($request->all())}}--}}
                {!! $links->appends($request->all())->render() !!}
        </div>

        <style>
            .page_list ul li span{
                padding:6px 12px;
            }
        </style>
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

$(".tishi").fadeOut(2000);
    </script>
@endsection

