@extends('layouts.admin')
@section('title')
    <title>后台问题添加页面</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 添加文章
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

        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form id="art_form" action="{{url('admin/question')}}" method="post" enctype="multipart/form-data">
            <table class="add_tab">
                <tbody>
                <tr>
                    {{csrf_field()}}
                    <th><i class="require">*</i>分类：</th>
                    <td>
                        <select name="cid">
                            <option value="">==请选择==</option>
                            @foreach($cates as $k=>$v)
                                @if(!($v->pid))
                                <option value="{{$v->cid}}" disabled >{{$v->cnames}}</option>
                                @else
                                <option value="{{$v->cid}}">{{$v->cnames}}</option>
                                @endif
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>问题标题：</th>
                    <td>
                        <input type="text" class="lg" name="title">
                        <p>标题可以写30个字</p>
                    </td>
                </tr>
                <tr>
                    <th>问题描述：</th>
                    <td>
                        <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
                        <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
                        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                        <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

                        <script id="editor" name="content" type="text/plain" style="width:800px;height:200px;" ></script>
                        <script>
                        var ue = UE.getEditor('editor', {
                            toolbars: [
                                ['fullscreen', 'source', 'undo', 'redo', 'bold','italic','underline','blockquote','link','insertorderedlist','insertunorderedlist','simpleupload','insertimage']
//                                全屏           源代码      撤销   重做     加粗    倾斜        下划线         引用      链接     有序列表               无序列表              单图上传        多图上传
                            ],
                            autoHeightEnabled: true,
                            autoFloatEnabled: true
                        });
                        </script>
                        <style>
                            .edui-default{line-height: 28px;}
                            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                            {overflow: hidden; height:20px;}
                            div.edui-box{overflow: hidden; height:22px;}
                        </style>
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