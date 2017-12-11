
@extends('layouts.admin')

@section('title')
    <title>后台首页</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">

        <form action="" method="post">
            <table class="search_tab">
                <tr>

                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="admin/answer" method="post">
        <div class="result_wrap">
        <div class="result_content">
                <div class="short_wrap">
                    <div class="alert alert-danger">
                        <ul>
                            @if(session('msg'))
                                <li style="color:red">{{session('msg')}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                       
                        
                        <th class="tc">aid</th>
                        <th>qid</th>
                        <th>uid</th>
                        <th>答案内容</th>
                        <th>发布时间</th>
                        <th>状态</th>
                        
                        <th>操作</th>
                    </tr>
                    @foreach($answer as $k=>$v)
                    <tr>
                        <td class="tc">{{$v->aid}}</td>
                        <td>
                            <a href="#">{{$v->qid}}</a>
                        </td>
                        <td>{{$v->uid}}</td>
                        <td>{!! $v->content !!}</td>
                        

                        <td>{{$v->date}}</td>
                        <td id="status">{{$v->status}}</td>
                        <td>
                            
                            <a href="{{asset('admin/answer/'.$v->aid.'/edit')}}">逻辑删除</a>
   
                            <a href="javascript:;" onclick="answerDel({{$v->aid}})">物理删除</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                <style>
                    img{
                        width:150px;
                        height:100px;
                        margin:0px 20px;
                    }
                </style>
                <div class="page_list">
                    @if(empty($input))
                        {!! $answer->render() !!}
                    @else
                        {!! $answer->appends(['keywords=>$v'])->render() !!}
                    @endif
                </div>
            </div>
        </div>
    </form>
    <!-- <div id="abc">123</div> -->
    <script type="text/javascript">
        // $("#abc").click(function()
        //     {
        //         alert($("#abc").html());
        //     });
        // document.write('cbjk');
        // $("#status").dblclick(function(){
        //     if($("#status").html()==1){
        //         $('#status').html(0);
        //     }else{
        //         $('#status').html(1);
        //     }
        // });
        // function visible(id)
        // {
        //     $.post("{{url('admin/answer')}}/"+id+"/edit",{"_method":"get","_token":"{{csrf_token()}}"},function(data){
        //         alert(data);
        //     $(".tc").html(id).next().next().next().next().next().html(data);
        //     })
        // }
        //   function unVisible()
        // {
        //     $("#status").html(1);
        // }

         function answerDel(id)
        {
            layer.confirm('您确认删除吗？', {
              btn: ['删除','取消'] //按钮
            }, function(){
              // layer.msg('已经删除', {icon: 1});
              $.post("{{url('admin/answer')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                    // console.log(data);
                    if(data['error']==0){
                        layer.msg(data['msg'], {icon: 1});
                        var t=setTimeout("location.href = location.href;",2000);
                    }else{
                        layer.msg(data['msg'], {icon: 1});
                        var t=setTimeout("location.href = location.href;",2000);
                    }
              })
            }, function(){
   
            });
        }
    </script>
    <!--搜索结果页面 列表 结束-->
    

@endsection