@extends('layouts.admin')
@section('body')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
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
        <form action="{{asset('admin/store')}}" method="post">
       {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="title">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th>详细内容：</th>
                        <td>
                             <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
                            <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
                            <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                            <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                            <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

                            <script id="editor" name="art_content" type="text/plain" style="width:800px;height:300px;"></script>
                            <script>
                                var ue = UE.getEditor('editor');
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
