@extends('layouts.admin')
@section('title')
    <title>后台用户添加页面</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">{{config('webconfig.web_title')}}</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">


    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->

        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <div class="alert alert-danger">
                        <ul>
                            @if (count($errors) > 0)

                                @if(is_object($errors))
                                    @foreach ($errors->all() as $error)
                                        <p style="color:red">{{ $error }}</p>
                                    @endforeach
                                @else
                                    <p style="color:red">{{ $errors }}</p>
                                @endif

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
    <form action="{{url('admin/config/contentchange')}}" method="post">
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">ID</th>
                        <th>用户</th>
                        <th>状态</th>
                        <th>积分</th>
                        <th>记录时间</th>
                    </tr>
                {{csrf_field()}}

                @foreach($point as $k=>$v)
                        <tr>
                            <td class="tc">{{$v->id}}</td>
                            <td>{{$v->uid}}</td>
                            <td>{{$v->optxt}}</td>
                            <td>{{$v->points}}</td>
                            <td>{{date('Y-m-d H-i-s',$v->optime)}}</td>
                        </tr>

                    @endforeach

                </table>
                <div class="page_list">
                    {!! $point->render() !!}
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

@endsection