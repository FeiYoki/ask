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
        <form action="{{url('admin/link')}}" method="post">
            <table class="add_tab">
                <tbody>

                <tr>
                    {{csrf_field()}}
                    <th><i class="require">*</i>链接名称：</th>
                    <td>
                        <input type="text" class="lg" name="name" value="{{old('name')}}">
                        <p>标题可以写30个字</p>
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>链接url：</th>
                    <td>
                        <input type="text" class="lg" name="url" value="{{old('url')}}">
                        <p>标题可以写30个字</p>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>链接排序：</th>
                    <td>
                        <input type="text" class="lg" name="order" value="{{old('order')}}">
                        <p>标题可以写30个字</p>
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
@endsection