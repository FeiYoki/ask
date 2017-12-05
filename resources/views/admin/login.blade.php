@extends('layouts.admin')
@section('title')
	<title>后台登录页</title>
	@stop
@section('content')


	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
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
			<form action="{{ url('admin/dologin') }}" method="post">
				{{ csrf_field() }}
				<ul>
					<li>
					<input type="text" name="username" class="text" value="{{ old('username') }}"/>
                        <span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
                        <span><i class="fa fa-check-square-o"></i></span>
						<img src="{{ url('admin/yzm') }}" alt="" onclick="this.src='{{ url('admin/yzm')}}?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.itxdl.cn" target="_blank">http://www.itxdl.cn</a></p>
		</div>
	</div>

	@stop
