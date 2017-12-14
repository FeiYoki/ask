@extends('layouts.admin')
@section('title')
    <title>后台用户积分添加</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">

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
        <form action="{{url('admin/point')}}" method="post">
            <table class="add_tab">
                <tbody>
                <tr>
                    {{csrf_field()}}
                    <th><i class="require">*</i>UID:</th>
                    <td>
                        <input type="text" name="uid" value="">
                        <span>操作用户的ID</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>积分数：</th>
                    <td>
                        <input type="text" name="points">
                        <span><i class="fa fa-exclamation-circle yellow"></i>积分数必须为正整数</span>
                    </td>
                </tr>
                <tr>
                    <th>类型：</th>
                    <td>
                        <input type="radio" name="optxt" value="reward" checked ">奖励　
                        <input type="radio" name="optxt" value="punish" ">惩罚

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
        function showTr(obj){
            switch($(obj).val()){
                case 'input':
                    $('.field_value').hide();
                    break;
                case 'textarea':
                    $('.field_value').hide();
                    break;

                case 'radio':
                    $('.field_value').show();
            }

        }
    </script>
@endsection