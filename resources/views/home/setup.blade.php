@extends('layouts.lrf')
@section('title')
    <title>注册页面</title>
@stop
@section('body')
    <div class="col-md-6 col-md-offset-3 bg-white login-wrap">
        <h1 class="h4 text-center text-muted login-title">创建新账号</h1>
        <form role="form" id="registerForm" action="{{ url('home/doreg') }}" method="post">
            {{ csrf_field() }}
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
            <div class="form-group ">
                <label class="required">姓名</label>
                <input type="text" class="form-control" name="uname" value="{{ old('uname') }}" required  placeholder="姓名">
            </div>
            <div class="form-group ">
                <label class="required">手机号</label>
                <input type="text" class="form-control" name="telphone" value="" required placeholder="请输入手机号">
            </div>
            <div class="form-group ">
                <label for="mobile" class="required control-label">短信验证码</label>
                <div class="row">
                    <div class="col-xs-6">
                        <input name="code" id="code" type="text" maxlength="6" placeholder="收到的手机验证码"  class="form-control" value="{{old('code')}}" />
                    </div>
                    <div class="col-xs-6"><button class="btn btn-xl btn-default btn-send-code" data-mobile_id="mobile" data-send_type="register"  data-toggle="modal" data-target="#verify_code_modal" type="button">发送验证码</button></div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="required">密码</label>
                <input type="password" class="form-control" name="password" required placeholder="不少于 6 位">
            </div>
            <div class="form-group ">
                <label for="" class="required">确认密码</label>
                <input type="password" class="form-control" name="password_confirmation" required placeholder="不少于 6 位">
            </div>
            <div class="form-group">
                <input type="checkbox" value="1" checkbox="true">
                同意并接受 <a href="" target="_blank" data-toggle="modal" data-target="#register_license_modal">《服务条款》</a>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">注册</button>
            </div>
        </form>
    </div>



    <div class="modal fade " id="register_license_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title text-center">Tipask问答网服务条款</h4>
                </div>
                <div class="modal-body">
                    <div style="height: 450px;overflow:scroll;">
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路
                        阿里的刷卡缴费老师的解放路






                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center col-md-12 login-link">
        <a href="{{ url('home/login') }}">用户登录</a>
@endsection