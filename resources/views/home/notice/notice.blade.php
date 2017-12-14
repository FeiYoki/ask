@extends('layouts.home')
@section('title')
<title>公告</title>
@endsection
@section('body')
<div class="top-alert mt-60 clearfix text-center">
    <!--[if lt IE 9]>
    <div class="alert alert-danger topframe" role="alert">你的浏览器实在<strong>太太太太太太旧了</strong>，放学别走，升级完浏览器再说
        <a target="_blank" class="alert-link" href="http://browsehappy.com">立即升级</a>
    </div>
    <![endif]-->

    

    </div>

<div class="wrap">
    <div class="container">
        <div class="row mt-10">
            <div class="col-xs-12 col-md-9 main">
                <table class="table table-hover">
                    <tr>
                        <th>标题</th>
                        <th>内容</th>
                        <th>更新时间</th>
                    </tr>
                @foreach($notice as $v)
                    <tr>
                        <td>{{$v->title}}</td>
                        <td>{{$v->content}}</td>
                        <td>{{$v->date}}</td>
                    </tr>
                @endforeach
                <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>



                <div class="stream-list blog-stream">
                
            </div>
                <div class="page_list">
                    
                        {!! $notice->render() !!}
                    
                    
                </div>
            <div class="text-center">
                
            </div>
        </div><!-- /.main -->
        <div class="col-xs-12 col-md-3 side">
            <div class="side-alert alert alert-warning">
                <p>今天，有什么经验需要分享呢？</p>
                <a href="http://localhost/tipask-3.2.1/public/article/create" class="btn btn-primary btn-block mt-10">立即撰写</a>
            </div>
            <div class="widget-user-nav">
        <div class="row">
            <div class="col-sm-6 col-xs-6 widget-nav-item ">
                <a  class="widget-nav-item-link" href="http://localhost/tipask-3.2.1/public/people/1/questions">
                    我的提问
                </a>
            </div>








            <div class="col-sm-6 widget-nav-item ">
                <a class="widget-nav-item-link " href="http://localhost/tipask-3.2.1/public/people/1/answers">
                    我的回答
                </a>
            </div>
            

            <div class="col-sm-6 col-xs-6 widget-nav-item ">
                <a id="inviteCount" class="widget-nav-item-link" href="http://localhost/tipask-3.2.1/public/questionInvitation">
                    受邀回答
                </a>
            </div>
            <div class="col-sm-6 col-xs-6  widget-nav-item ">
                <a id="inviteCount" class="widget-nav-item-link" href="http://localhost/tipask-3.2.1/public/people/1/questions">
                    我的文章
                </a>
            </div>
            <div class="col-sm-6 col-xs-6 widget-nav-item ">
                <a class="widget-nav-item-link" href="http://localhost/tipask-3.2.1/public/people/1/collected/questions">
                    我的收藏
                </a>
            </div>
            <div class="col-sm-6 col-xs-6 widget-nav-item ">
                <a class="widget-nav-item-link" href="http://localhost/tipask-3.2.1/public/people/1/followed/questions">
                    我关注的
                </a>
            </div>
        </div>
    </div>

            <div class="widget-box">
                <h2 class="h4 widget-box__title">推荐文章</h2>
                <ul class="widget-links list-unstyled list-text">
                                    </ul>
            </div>

            <div class="widget-box">
                <div class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="a">公告</a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    @foreach($notice as $v)
                        <li class="content">{{$v->title}}</li>
                    @endforeach
                    <a href="#" id="more">more>>></a>
                  </ul>
                </div>
            </div>


                <style>
                    .content{
                        margin:10px;
                        line-height: 15px;
                        width:160px;
                    }
                    #more{
                        float:right;
                        text-decoration: none;
                    }
                    #a{
                        text-decoration: none;
                    }
                </style>



            <div class="widget-box">
                <h2 class="h4 widget-box-title">热议话题 <a href="http://localhost/tipask-3.2.1/public/topics" title="更多">»</a></h2>
                <ul class="taglist-inline multi">
                                    </ul>
            </div>

        </div>
    </div>
    </div>
</div>




<div class="modal fade" id="sendTo_message_model" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">发送私信</h4>
            </div>
            <div class="modal-body">
                <form name="messageForm" id="sendTo_message_form">
                    <input type="hidden"  name="_token" value="U1agiXLRqUnZFclosqbopuB5kZKUi8pIUhhut2Ys">
                    <input type="hidden" id="to_user_id" name="to_user_id" value="0" />
                    <div class="form-group">
                        <label for="to_user_name" class="control-label">发给:</label>
                        <span id="to_user_name"></span>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">内容:</label>
                        <textarea class="form-control" id="message-text" name="content"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" id="sendTo_submit">发送</button>
            </div>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://localhost/tipask-3.2.1/public/static/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://localhost/tipask-3.2.1/public/static/css/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    var is_login = Boolean("1");
</script>
<script src="http://localhost/tipask-3.2.1/public/js/global.js?v=20170412"></script>


@endsection