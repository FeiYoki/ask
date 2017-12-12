
@extends('layouts.admin')

@section('title')
    <title>后台首页</title>
@endsection
@section('body')

	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="#" class="active">首页</a></li>
				<li><a href="#">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>

			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>

            
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>公告操作</h3>
                <ul class="sub_menu">
                    <li><a href="{{asset('admin/list')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>查询公告</a></li>
                    <li><a href="{{asset('admin/create')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>增加公告</a></li>
                </ul>
            </li>

			<li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>答案管理</h3>
                <ul class="sub_menu">
                    <li><a href="{{asset('admin/answer')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>修改答案</a></li>
                    
                </ul>
            </li>

            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>分类模块</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/cate/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>
                    <li><a href="{{ url('admin/cate/') }}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
                </ul>
            </li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>问题管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/question/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加问题</a></li>
					<li><a href="{{ url('admin/question/') }}" target="main"><i class="fa fa-fw fa-list-ul"></i>问题列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>积分管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/point/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加积分</a></li>
					<li><a href="{{ url('admin/point/') }}" target="main"><i class="fa fa-fw fa-list-ul"></i>积分列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>友情链接模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/link/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加友情链接</a></li>
					<li><a href="{{ url('admin/link/') }}" target="main"><i class="fa fa-fw fa-list-ul"></i>友情链接列表</a></li>
				</ul>
			</li>


			<li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>用户模块</h3>
                <ul class="sub_menu">
                    <li><a href="{{ url('admin/user/create') }}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加用户</a></li>
                    <li><a href="{{ url('admin/user/') }}" target="main"><i class="fa fa-fw fa-list-ul"></i>用户列表</a></li>
                </ul>
            </li>

			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>网站配置模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/config/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加网站配置</a></li>
					<li><a href="{{ url('admin/config/') }}" target="main"><i class="fa fa-fw fa-list-ul"></i>网站配置列表</a></li>
				</ul>
			</li>


			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>角色模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/role/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加角色</a></li>
					<li><a href="{{ url('admin/role/') }}" target="main"><i class="fa fa-fw fa-list-ul"></i>角色列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>权限模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/permission/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加权限</a></li>
					<li><a href="{{ url('admin/permission/') }}" target="main"><i class="fa fa-fw fa-list-ul"></i>权限列表</a></li>
				</ul>
			</li>



        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">

		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>

	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.itxdl.cn">http://www.itxdl.cn</a>.
	</div>
	<!--底部 结束-->

@endsection

