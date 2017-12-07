
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="GSqPLHblpdRfUWF8YTA2qQGEro60OZ8T6ceCBnKQ" />
    <title>发起提问 - php193问答系统 </title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Tipask Team" />
    <meta name="copyright" content="2016 tipask.com" />

    <!-- Bootstrap -->
    <link href="{{ asset('/static/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/static/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/default/global.css')}}" rel="stylesheet" />
    <link href="{{ asset('/static/js/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{ asset('/static/js/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/static/js/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    {{--<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>--}}
    {{--<![endif]-->--}}
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
                        <span class="input-group-addon btn" >搜索</span>
                    </div>
                </form>
                <ul class="nav navbar-nav">
                    <li ><a href="http://localhost/tipask-3.2.1/public">首页 <span class="sr-only">(current)</span></a></li>

                    {{--<li ><a href="http://localhost/tipask-3.2.1/public/doings">发现</a></li>--}}
                    <li ><a href="http://localhost/tipask-3.2.1/public/questions">问答</a></li>
                    {{--<li ><a href="http://localhost/tipask-3.2.1/public/articles">文章</a></li>--}}
                    {{--<li ><a href="http://localhost/tipask-3.2.1/public/topics">话题</a></li>--}}
                    {{--<li ><a href="http://localhost/tipask-3.2.1/public/shop">商城</a></li>--}}
                </ul>
                <ul class="nav navbar-nav user-menu navbar-right">
                    {{--<li><a href="http://localhost/tipask-3.2.1/public/notifications" class="active" id="unread_notifications"><span class="fa fa-bell-o fa-lg"></span></a></li>--}}
                    {{--<li><a href="http://localhost/tipask-3.2.1/public/messages" class="active" id="unread_messages"><i class="fa fa-envelope-o fa-lg"></i></a></li>--}}
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
            <ol class="breadcrumb">
                <li><a href="http://localhost/tipask-3.2.1/public/questions">问答</a></li>
                <li class="active">发起提问</li>
            </ol>
            <form id="questionForm" method="POST" role="form" action="http://localhost/tipask-3.2.1/public/question/store">
                <input type="hidden" id="editor_token" name="_token" value="GSqPLHblpdRfUWF8YTA2qQGEro60OZ8T6ceCBnKQ" />
                <input type="hidden" id="tags" name="tags" value="" />
                <input type="hidden" name="to_user_id" value="0" />
                <div class="form-group  ">
                    <label for="title"> 请将您的问题告诉我们  :</label>
                    <input id="title" type="text" name="title"   class="form-control input-lg" placeholder="请在这里概述您的问题" value="" />
                </div>

                <div id="titleSuggest" class="panel hide widget-suggest panel-default">
                    <div class="panel-body">
                        <p>
                            <strong>这些问题可能有你需要的答案</strong>
                            <button type="button" class="widget-suggest-close btn btn-default btn-xs ml-10">关闭提示</button>
                        </p>
                        <ul id="suggest-list" class="list-unstyled widget-suggest-list"></ul>
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="question_editor">问题描述(选填)</label>
                    <div id="question_editor"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="0">请选择分类</option>
                                <option value="1">默认分类</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <select id="select_tags" name="select_tags" class="form-control" multiple="multiple" >
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-xs-12 col-md-11">
                        <ul class="list-inline">
                            <li>
                                <select name="price">
                                    <option selected="selected" value="0">0</option><option value="3">3</option><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="30">30</option><option value="50">50</option><option value="80">80</option><option value="100">100</option>
                                </select>&nbsp;金币
                            </li>
                            <li><input type="checkbox" name="hide" value="1" />&nbsp;匿名</li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-1">
                        <input type="hidden" id="question_editor_content"  name="description" value=""  />
                        <button type="submit" class="btn btn-primary pull-right" >发布问题</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>



<footer id="footer">
    <div class="container">
        <div class="text-center">
            <a href="http://localhost/tipask-3.2.1/public">php193问答系统</a><span class="span-line">|</span>
            <a href="mailto:zhangyunfei0033@163.com" target="_blank">联系我们</a><span class="span-line">|</span>
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
                    <input type="hidden"  name="_token" value="GSqPLHblpdRfUWF8YTA2qQGEro60OZ8T6ceCBnKQ">
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
<script src="{{ asset('/static/js/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('/static/css/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
    var is_login = Boolean("1");
</script>
<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('/static/js/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('/static/js/summernote/lang/summernote-zh-CN.min.js') }}"></script>
<script src="{{ asset('/static/js/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
    var suggest_timer = null;
    $(document).ready(function() {
        $('#question_editor').summernote({
            lang: 'zh-CN',
            height: 180,
            placeholder:'您可以在这里继续补充问题细节',
            toolbar: [ ['common', ['style','bold','ol','link','picture','clear','fullscreen']] ],
            callbacks: {
                onChange:function (contents, $editable) {
                    var code = $(this).summernote("code");
                    $("#question_editor_content").val(code);
                },
                onImageUpload: function(files) {
                    upload_editor_image(files[0],'question_editor');
                }
            }
        });

        /*suggest处理*/
        $("#title").keydown(function(){

            if(suggest_timer){
                clearTimeout(suggest_timer);
            }
            suggest_timer = setTimeout(function() {
                var title = $("#title").val();
                if( title.length > 1 ){
                    $.ajax({
                        url: '/question/suggest',
                        type:'post',
                        data:'word='+title,
                        cache: false,
                        success: function(html){
                            if(html == ''){
                                $("#suggest-list").html('<li>没有找到相似问题！</li>');
                                return;
                            }
                            $(".widget-suggest").removeClass("hide");
                            $("#suggest-list").html(html);
                        }
                    });
                }
            }, 500);
        });

        $(".widget-suggest-close").click(function(){
            $(".widget-suggest").addClass("hide");
        });


    });
</script>



</body>
</html>