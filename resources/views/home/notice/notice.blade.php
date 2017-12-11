
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="U1agiXLRqUnZFclosqbopuB5kZKUi8pIUhhut2Ys" />
    <title>  文章   - Tipask问答网 </title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Tipask Team" />
    <meta name="copyright" content="2016 tipask.com" />
    
    <!-- Bootstrap -->
    <link href="http://localhost/tipask-3.2.1/public/static/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="http://localhost/tipask-3.2.1/public/static/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="http://localhost/tipask-3.2.1/public/css/default/global.css?v=20170412" rel="stylesheet" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="top-common-nav  mb-50">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo"><a class="navbar-brand logo" href="http://localhost/tipask-3.2.1/public"></a></div>
            </div>

            <div class="collapse navbar-collapse" id="global-navbar">
                <form class="navbar-form navbar-left" role="search" id="top-search-form" action="http://localhost/tipask-3.2.1/public/search" method="GET">
                    <div class="input-group">
                        <input type="text" name="word" id="searchBox" class="form-control" placeholder="" />
                        <span class="input-group-addon btn" ><span id="search-button" class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                    </div>
                </form>
                <ul class="nav navbar-nav">
                    <li ><a href="http://localhost/tipask-3.2.1/public">首页 <span class="sr-only">(current)</span></a></li>

                                        <li ><a href="http://localhost/tipask-3.2.1/public/doings">发现</a></li>
                                        <li ><a href="http://localhost/tipask-3.2.1/public/questions">问答</a></li>
                    <li  class="active" ><a href="http://localhost/tipask-3.2.1/public/articles">文章</a></li>
                    <li ><a href="http://localhost/tipask-3.2.1/public/topics">话题</a></li>
                    <li ><a href="http://localhost/tipask-3.2.1/public/shop">商城</a></li>
                </ul>
                                    <ul class="nav navbar-nav user-menu navbar-right">
                        <li><a href="http://localhost/tipask-3.2.1/public/notifications" class="active" id="unread_notifications"><span class="fa fa-bell-o fa-lg"></span></a></li>
                        <li><a href="http://localhost/tipask-3.2.1/public/messages" class="active" id="unread_messages"><i class="fa fa-envelope-o fa-lg"></i></a></li>
                        <li class="dropdown user-avatar">
                            <a href="http://localhost/tipask-3.2.1/public/profile/base" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img class="avatar-32 mr-5" alt="admin" src="http://localhost/tipask-3.2.1/public/image/avatar/1_middle.jpg" >
                                <span>admin</span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="http://localhost/tipask-3.2.1/public/admin/index">系统设置</a></li>
                                <li class="divider"></li>
                                
                                <li><a href="http://localhost/tipask-3.2.1/public/people/1">我的主页</a></li>
                                <li><a href="http://localhost/tipask-3.2.1/public/notifications">我的私信</a></li>
                                <li><a href="http://localhost/tipask-3.2.1/public/profile/base">账号设置</a></li>
                                <li class="divider"></li>
                                <li><a href="http://localhost/tipask-3.2.1/public/logout">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                            </div>
        </div>
    </nav>
</div>
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
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">公告</a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    @foreach($notice as $v)
                        <li>{{$v->title}}</li>
                    @endforeach
                    <a href="#">more</a>
                  </ul>
                </div>
            </div>

            <div class="widget-box">
                <h2 class="h4 widget-box-title">热议话题 <a href="http://localhost/tipask-3.2.1/public/topics" title="更多">»</a></h2>
                <ul class="taglist-inline multi">
                                    </ul>
            </div>

        </div>
    </div>
    </div>
</div>



<footer id="footer">
    <div class="container">
                <div class="text-center">
            <a href="http://localhost/tipask-3.2.1/public">Tipask问答网</a><span class="span-line">|</span>
            <a href="mailto:1804477037@qq.com" target="_blank">联系我们</a><span class="span-line">|</span>
                    </div>
        <div class="copyright mt-10">
            Powered By <a href="http://www.tipask.com" target="_blank">Tipask3.2</a> Release 20170412 ©2009-2017 tipask.com
        </div>
    </div>
</footer>


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



</body>
</html>