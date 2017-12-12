@extends('layouts.admin')
@yield('title')
    <title>后台用户添加页面</title>
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">分类管理</a> &raquo; 添加分类
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/config/'.$config->id)}}" method="post">
            {{csrf_field()}}
            {{ method_field('put')}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>标题：</th>
                    <td>
                        <input type="text" name="title" value="{{$config->title}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>配置项标题必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>名称：</th>
                    <td>
                        <input type="text" name="name" value="{{$config->name}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>配置项名称必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>内容：</th>
                    <td>
                        <input type="text" name="content" value="{{$config->content}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>配置内容名称必须填写</span>
                    </td>


                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="text" class="lg" name="order" value="{{$config->order}}">
                    </td>
                </tr>
                <tr>
                    <th>说明：</th>
                    <td>
                        <textarea id="" cols="30" rows="10" name="tips">{{$config->tips}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script>
        function showTr(obj) {
            switch ($(obj).val()) {
                case 'input':
                    $('.value').show();
                    break;
                case 'textarea':
                    $('.value').show();
                    break;
                case 'radio':
                    $('.value').show();
                    break;
            }
        }

    </script>
@endsection