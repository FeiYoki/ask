@extends('layouts.home')
@section('title')
<title>回答问题</title>
@endsection
@section('body')
<div class="top-alert mt-60 clearfix text-center">
    <!--[if lt IE 9]>
    <div class="alert alert-danger topframe" role="alert">你的浏览器实在<strong>太太太太太太旧了</strong>，放学别走，升级完浏览器再说
        <a target="_blank" class="alert-link" href="http://browsehappy.com">立即升级</a>
    </div>
    <![endif]-->

    

                        <div class="alert alert-success" role="alert">
                一封注册验证邮件已经发到您的邮箱 xxooo@qq.com ，请前往邮箱完成注册.<a href="javascript:void(0);" class="send-mail btn btn-default btn-xs ml-5" onclick="$('#email_validate').modal('show');">遇到问题 <i class="fa fa-question"></i></a>
                <button type="button" class="close"></button>
            </div>
            </div>

<div class="wrap">
            <div class="container">
            <div class="row mt-10">
        <div class="col-xs-12 col-md-9 main">
            <div class="widget-question">
                <h4 class="title">
                                        sdasda
                </h4>
                                    <ul class="taglist-inline">
                                            </ul>
                                <div class="description mt-10">
                    <div class="text-fmt ">
                        <p>sdasdadedsd</p>
                    </div>

                    <div class="post-opt mt-10">
                        <ul class="list-inline">
                            <li><a class="comments"  data-toggle="collapse"  href="#comments-question-1" aria-expanded="false" aria-controls="comment-1"><i class="fa fa-comment-o"></i> 0 条评论</a></li>
                                                                                                                                                                <li><a href="#" data-toggle="modal" data-target="#inviteAnswer"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> 邀请回答</a></li>
                                                                                    </ul>
                    </div>

                    <div class="collapse widget-comments mb-20" id="comments-question-1" data-source_type="question" data-source_id="1">
    <div class="widget-comment-list"></div>
        <div class="widget-comment-form row">
            <form class="col-md-12" >
                <div class="form-group">
                    <textarea name="content" placeholder="写下你的评论" class="form-control" id="comment-question-content-1"></textarea>
                </div>
            </form>
            <div class="col-md-12 text-right">
                                <a href="#" class="text-muted collapse-cancel" data-collapse_id="comments-question-1">取消</a>
                                <button type="submit" class="btn btn-primary btn-sm ml-10 comment-btn" id="question-comment-1-btn"  data-token="kJsgMxwrFX5HdIfoXBA92AkAbcZ6FCytZ00TK7EJ" data-source_id="1"  data-source_type="question" data-to_user_id="0">提交评论</button>
            </div>
        </div>
    </div>

                                    </div>


                                            </div>

            <div class="widget-answers mt-15">
                <div class="btn-group pull-right" role="group">
                    <a href="http://localhost/tipask-3.2.1/public/question/1" class="btn btn-default btn-xs  active ">默认排序</a>
                    <a href="http://localhost/tipask-3.2.1/public/question/1?sort=created_at" id="sortby-created" class="btn btn-default btn-xs ">时间排序</a>
                </div>

                <h2 class="h4 post-title"> 1 个回答</h2>

                                <div class="media">





                    <!-- 个人信息以及答案 -->
                    @if(!empty($ans))
                    @foreach($ans as $k => $v)
                    @if($v->status==1)

                    <div class="media-left">
                        <a href="http://localhost/tipask-3.2.1/public/people/1" class="avatar-link user-card" target="_blank">
                            <img class="avatar-40 hidden-xs"  src="http://localhost/tipask-3.2.1/public/image/avatar/1_middle.jpg" alt="admin"></a>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <strong>
                                <a href="http://localhost/tipask-3.2.1/public/people/1" class="mr-5 user-card">admin</a><span class="text-gold">                                </span>
                            </strong>
                                                        <span class="answer-time text-muted hidden-xs">{{$v->date}}</span>
                        </div>
                        <div class="content">
                                                        {!! $v->content !!}
                                                        
                                                        <!-- <img src="{{$v->image}}" width="150px"> -->
                        </div>
                        <style>
                            img{
                                width:200px;
                                height:100px;
                                margin:0px 30px;
                            }
                        </style>
                        <div class="media-footer">
                            <ul class="list-inline mb-20">
                                <li><a class="comments"  data-toggle="collapse"  href="#comments-answer-1" aria-expanded="false" aria-controls="comment-1">0 条评论</a></li>
                                <li>
                                <a href="javascript:;" onclick="editAnswer({{$v->aid}})"><button>编辑</button>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse widget-comments mb-20" id="comments-answer-1" data-source_type="answer" data-source_id="1">
    <div class="widget-comment-list"></div>
        <div class="widget-comment-form row">
        
        </div>
    </div>
                                            </div>
<hr />
                        
                    @endif
                    @endforeach
                    @endif
                        <!-- //个人信息以及答案 -->

                </div>
                <div class="text-center">   
                </div>
            </div>


            

                        <div class="widget-answer-form mt-15">
                      <!-- 文本编辑器 -->
                      <form method="post" action="{{url('home/answer/store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="edit" value="" id="abcd">
                        <!-- <input type="text" size="50" id="art_thumb" name="art_thumb" placeholder="请输入需要上传的图片">
                            <input id="file_upload" name="file_upload[]" type="file" multiple >
                            <br>
                            <img src="" id="img1" alt="" style="width:80px;height:80px">
                            <script type="text/javascript">
                                $(function () {
                                    $("#file_upload").change(function () {
                                        $('img1').show();
                                        uploadImage();
                                    });
                                });
                                function uploadImage() {
                                    // 判断是否有选择上传文件
                                    var imgPath = $("#file_upload").val();
                                    if (imgPath == "") {
                                        alert("请选择上传图片！");
                                        return;
                                    }
                                    //判断上传文件的后缀名
                                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                    if (strExtension != 'jpg' && strExtension != 'gif'
                                        && strExtension != 'png' && strExtension != 'bmp') {
                                        alert("请选择图片文件");
                                        return;
                                    }
                                    var formData = new FormData($('#art_form')[0]);
                                    {{--var formData = new FormData();--}}
                                    {{--formData.append('file_upload', $('#file_upload')[0].files[0]);--}}
                                    {{--formData.append('_token',"{{csrf_token()}}");--}}
                                    $.ajax({
                                        type: "POST",
                                        url: "/admin/upload",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            $('#img1').attr('src','/uploads/'+data);
//                                            $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
//                                            $('#img1').attr('src','http://project193.oss-cn-beijing.aliyuncs.com/'+data);
                                            $('#img1').show();
                                            $('#art_thumb').val('/uploads/'+data);
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                }
                            </script>
 -->

                           

                        

                            
                            <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
                            <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
                            <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                            <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                            <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

                            <script id="editor" name="art_content" type="text/plain" style="width:800px;height:300px;"></script>
                            <script>
                                // 2017-12-08 09:07:39
                                var ue = UE.getEditor('editor', {
                                    toolbars: [
                                ['fullscreen', 'source', 'undo', 'redo', 'bold','italic','underline','blockquote','link','insertorderedlist','insertunorderedlist','simpleupload','insertimage']
//                                全屏           源代码      撤销   重做     加粗    倾斜     引用           链接     有序列表               无序列表
                            ],
                            autoHeightEnabled: true,
                            autoFloatEnabled: true
                        });
                            </script>
                            <script type="text/javascript">
                                function editAnswer(id)
                                {
                                    // alert(id);
                                    $.post("{{url('home/answer/edit')}}/"+id,{"_method":"get","_token":"{{csrf_token()}}"},function(data){
                                             // alert(data);
                                            //document.getElementById('editor').innerHTML = data;
                                           // $('#editor').html(data);
                                           // ue.execCommand( 'inserthtml', data);
                                            //console.log($("#editor"));
                                            ue.setContent(data);
                                            $("#abcd").val(id);
                                    });
                                }
                                

                            </script>
                            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>
           

                        <div class="row mt-20">
                            <div class="col-xs-12 col-md-2">
                                <button type="submit" class="btn btn-primary pull-right">提交回答</button>
                            </div>
                        </div>
                    </form>
                            </div>
            
        </div>
                      

                            <script>
                                var editor = new Simditor({
                                textarea: $('#editor')
                                //optional options
                            });
                                
                            </script>



        <div class="col-xs-12 col-md-3 side">
            <div class="widget-box">
                <ul class="widget-action list-unstyled">
                    <li>
                                                    <button type="button" id="follow-button" class="btn btn-success btn-sm" data-source_type = "question" data-source_id = "1" data-show_num="true"  data-toggle="tooltip" data-placement="right" title="" data-original-title="关注后将获得更新提醒">关注</button>
                                                <strong id="follower-num">1</strong> 关注
                    </li>
                    <li>
                                                    <button id="collect-button" class="btn btn-default btn-sm" data-source_type = "question" data-source_id = "1" > 收藏</button>
                                                <strong id="collection-num">0</strong> 收藏，<strong class="no-stress">7</strong> 浏览
                    </li>
                    <li>
                        <i class="fa fa-clock-o"></i>
                                                <a href="http://localhost/tipask-3.2.1/public/people/2" target="_blank">srk</a>
                                                提出于 46分钟前</li>
                </ul>
            </div>
            <div class="widget-box">
                <h2 class="h4 widget-box__title">相似问题</h2>
                <ul class="widget-links list-unstyled list-text">
                                    </ul>
            </div>
        </div>
    </div>

        <div class="modal" id="appendReward" tabindex="-1" role="dialog" aria-labelledby="appendRewardLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="appendModalLabel">追加悬赏</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success" role="alert" id="rewardAlert">
                        <i class="fa fa-exclamation-circle"></i> 提高悬赏，以提高问题的关注度！
                    </div>

                    <form class="form-inline" id="rewardForm" action="http://localhost/tipask-3.2.1/public/question/1/appendReward" method="post">
                        <input type="hidden"  name="_token" value="kJsgMxwrFX5HdIfoXBA92AkAbcZ6FCytZ00TK7EJ">
                        <div class="form-group">
                            <label for="reward">追加</label>
                            <select class="form-control" name="coins" id="question_coins">
                                <option value="3" selected>3</option><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="30">30</option><option value="50">50</option><option value="80">80</option><option value="100">100</option>
                            </select> 个金币
                        </div>
                        <div class="form-group">
                             （您目前共有 <span class="text-gold">20</span> 个金币）
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" id="appendRewardSubmit">确认追加</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="adoptAnswer" tabindex="-1" role="dialog" aria-labelledby="adoptAnswerLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="adoptModalLabel">采纳回答</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert" id="adoptAnswerAlert">
                        <i class="fa fa-exclamation-circle"></i> 确认采纳该回答为最佳答案？
                    </div>
                    <blockquote id="answer_quote"></blockquote>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" id="adoptAnswerSubmit">采纳该回答</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="inviteAnswer" tabindex="-1" role="dialog" aria-labelledby="inviteAnswerLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="appendModalLabel">邀请回答</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success" role="alert" id="rewardAlert">
                        <i class="fa fa-exclamation-circle"></i> 不知道答案？你还可以邀请他人进行解答，每天可以邀请10次。
                    </div>
                    <form class="invite-popup" id="inviteEmailForm"  action="http://localhost/tipask-3.2.1/public/question/inviteEmail/1" method="get">
                        <div style="position: relative;">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-by="username" href="#by-username" data-toggle="tab">站内邀请</a></li>
                                <li><a data-by="email" href="#by-email" data-toggle="tab">Email 邀请</a></li>
                            </ul>
                            <div class="tab-content invite-tab-content mt-10">
                                <div class="tab-pane active" id="by-username" data-type="username">
                                    <div class="search-user" id="questionSlug">
                                        <input id="invite_word" class="text-28 form-control" type="text" name="word" autocomplete="off" placeholder="搜索你要邀请的人">
                                    </div>
                                    <p class="help-block" id="questionInviteUsers"></p>
                                    <div class="invite-question-modal">
                                        <div class="row invite-question-list" id="invite_user_list">
                                            <div class="text-center" id="invite_loading">
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="by-email" data-type="email">
                                    <div class="mb-10">
                                        <input class="text-28 form-control" type="email" name="sendTo" placeholder="Email 地址">
                                    </div>
                                    <p><textarea class="textarea-13 form-control" name="message" rows="5">我在 Tipask问答网 上遇到了问题「sdasda」 → http://localhost/tipask-3.2.1/public/question/1，希望您能帮我解答 </textarea></p>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer" style="display:none;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary invite-email-btn">确认</button>
                </div>
            </div>
        </div>
    </div>
        </div>
</div>




    <div id="email_validate" class="modal in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">请激活邮箱</h4>
                </div>
                <div class="modal-body clearfix">
                    <div class="alert alert-warning">
                        为了正常使用提问、回答、撰写文章等功能，请验证你的邮箱、激活账号
                    </div>
                    <div class="mt-30 mb-30">
                        <span class="text-muted activate-label pull-left">你的注册邮箱：</span>
                    <span>
                        <strong class="h4 session-mail">xxooo@qq.com</strong>
                        <a href="http://localhost/tipask-3.2.1/public/profile/email" class="ml-10">修改</a>
                    </span>
                    </div>
                    <p class="text-muted">
                        如果你没收到激活邮件，请注意检查垃圾箱，或者
                        <a href="javascript:void(0);" class="send-email-token">重新发送激活邮件</a>
                    </p>
                    <div class="send-email-tips" style="display: none">
                        <div class="alert alert-success">一封验证邮件已经发送至 <strong>xxooo@qq.com</strong>，请登录邮箱根据提示完成操作</div>
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
                    <input type="hidden"  name="_token" value="kJsgMxwrFX5HdIfoXBA92AkAbcZ6FCytZ00TK7EJ">
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
    <script src="http://localhost/tipask-3.2.1/public/static/js/summernote/summernote.min.js"></script>
    <script src="http://localhost/tipask-3.2.1/public/static/js/summernote/lang/summernote-zh-CN.min.js"></script>
    <link href="http://localhost/tipask-3.2.1/public/static/js/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <script type="text/javascript">
        var invitation_timer = null;
        var question_id = "1";
        $(document).ready(function() {
                        /*问题悬赏*/
            $("#appendRewardSubmit").click(function(){
                var user_total_conis = '20';
                var reward = $("#question_coins").val();

                if(reward>parseInt(user_total_conis)){
                    $("#rewardAlert").attr('class','alert alert-warning');
                    $("#rewardAlert").html('金币数不能大于'+user_total_conis);
                }else{
                    $("#rewardAlert").empty();
                    $("#rewardAlert").attr('class','');
                    $("#rewardForm").submit();
                }
            });
           
            /*回答编辑器初始化*/
            $('#answer_editor').summernote({
                lang: 'zh-CN',
                height: 160,
                placeholder:'撰写答案',
                toolbar: [ ['common', ['style','bold','ol','link','picture','clear','fullscreen']] ],
                callbacks: {
                    onChange:function (contents, $editable) {
                        var code = $(this).summernote("code");
                        $("#answer_editor_content").val(code);
                    },
                    onImageUpload:function(files) {
                        upload_editor_image(files[0],'answer_editor');
                    }
                }
            });

            /*评论提交*/
            $(".comment-btn").click(function(){
                var source_id = $(this).data('source_id');
                var source_type = $(this).data('source_type');
                var to_user_id = $(this).data('to_user_id');
                var token = $(this).data('token');
                var content = $("#comment-"+source_type+"-content-"+source_id).val();
                add_comment(token,source_type,source_id,content,to_user_id);
                $("#comment-content-"+source_id+"").val('');
            });


            $(".widget-comments").on('show.bs.collapse', function () {
                load_comments($(this).data('source_type'),$(this).data('source_id'));
            });

            $(".widget-comments").on('hide.bs.collapse', function () {
                clear_comments($(this).data('source_type'),$(this).data('source_id'));
            });

            /*收藏问题或文章*/
            $("#collect-button").click(function(){
                $("#collect-button").button('loading');
                var source_type = $(this).data('source_type');
                var source_id = $(this).data('source_id');
                var collection_num = $("#collection-num").html();
                $.get('/collect/'+source_type+'/'+source_id,function(msg){
                    $("#collect-button").removeClass('disabled');
                    $("#collect-button").removeAttr('disabled');
                    if(msg=='collected'){
                        $("#collect-button").html('已收藏');
                        $("#collection-num").html(parseInt(collection_num)+1);
                    }else{
                        $("#collect-button").html('收藏');
                        $("#collection-num").html(parseInt(collection_num)-1);
                    }
                });
            });

            /*采纳回答为最佳答案*/
            $(".adopt-answer").click(function(){
                var answer_id = $(this).data('answer_id');
                $("#adoptAnswerSubmit").attr('data-answer_id',answer_id);
                $("#answer_quote").html($(this).data('answer_content'));
            });

            $("#adoptAnswerSubmit").click(function(){
                document.location = "/answer/adopt/"+$(this).data('answer_id');
            });

            /*邀请回答模块逻辑处理*/
            /*私信模块处理*/

            $('#inviteAnswer').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget);
                var modal = $(this);
                loadInviteUsers(question_id,'');
                loadQuestionInvitedUsers(question_id,'part');

            });


            $("#invite_word").on("keydown",function(){
                if(invitation_timer){
                    clearTimeout(invitation_timer);
                }
                invitation_timer = setTimeout(function() {
                    var word = $("#invite_word").val();
                    console.log(word);
                    loadInviteUsers(question_id,word);
                }, 500);
            });

            $(".invite-question-list").on("click",".invite-question-item-btn",function(){
                var invite_btn = $(this);
                var question_id = invite_btn.data('question_id');
                var user_id = invite_btn.data('user_id');

                $.ajax({
                    type: "get",
                    url:"/question/invite/"+question_id+"/"+user_id,
                    success: function(data){
                        if(data.code > 0){
                            alert(data.message);
                            return false;
                        }
                        invite_btn.html('已邀请');
                        invite_btn.attr("class","btn btn-default btn-xs invite-question-item-btn disabled");
                        loadQuestionInvitedUsers(question_id,'part');
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });

            $("#inviteAnswer").on("click","#showAllInvitedUsers",function(){
                loadQuestionInvitedUsers(1,'all');
            });

            /*tag切换*/
            $('#inviteAnswer a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var tabBy = $(this).data("by");
                if( tabBy == 'email' ){
                    $("#inviteAnswer .modal-footer").show();
                }else{
                    $("#inviteAnswer .modal-footer").hide();
                }

            });

            /*邀请邮箱回答*/
            $("#inviteAnswer .invite-email-btn").click(function(){
                var formData = $("#inviteEmailForm").serialize();
                $.ajax({
                    type: "post",
                    url: "/question/inviteEmail/1",
                    data:formData,
                    success: function(data){
                        if(data.code>0){
                            alert(data.message);
                        }else{
                            alert("邀请成功，邀请邮件已发送！");
                        }
                        $("#inviteAnswer").modal("hide");

                    },
                    error: function(data){
                        console.log(data);
                        alert("操作出错，请稍后再试");
                        $("#inviteAnswer").modal("hide");
                    }
                });
            });


        });


        /**
         * @param  questionId
         * @param  word
         */
        function loadInviteUsers(questionId,word){
            $.ajax({
                type: "get",
                url: "/ajax/loadInviteUsers",
                data:{question_id:questionId,word:word},
                success: function(data){
                    console.log(data);
                    var inviteItemHtml = '';
                    if(data.code > 0){
                        inviteItemHtml = '<div class="text-center" id="invite_loading"><p>暂无数据</p></div>';
                    }else{
                        $.each(data.message,function(i,item){
                            inviteItemHtml+= '<div class="col-md-12 invite-question-item">' +
                                    '<img src="'+item.avatar+'" />'+
                                    '<div class="invite-question-user-info">'+
                                    '<a class="invite-question-user-name" target="_blank" href="'+item.url+'">'+item.name+'</a>'+
                                    '<span class="invite-question-user-desc">'+item.tag_name+' 标签下有 '+item.tag_answers+' 个回答</span>'+
                                    '</div>';
                            if(item.isInvited>0){
                               inviteItemHtml += '<button type="button" class="btn btn-default btn-xs invite-question-item-btn disabled" data-question_id="1"  data-user_id="'+item.id+'">已邀请</button>';
                            }else{
                               inviteItemHtml += '<button type="button" class="btn btn-default btn-xs invite-question-item-btn" data-question_id="1"  data-user_id="'+item.id+'">邀请回答</button>';
                            }
                            inviteItemHtml += '</div>';
                        });
                    }
                    $("#invite_user_list").html(inviteItemHtml);
                },
                error: function(data){
                    console.log(data);
                    $("#invite_user_list").html('<div class="text-center" id="invite_loading"><p>操作出错</p></div>');

                }
            });
        }

        /*加载已被邀请的用户信息*/
        function loadQuestionInvitedUsers(questionId,type){
            $("#questionInviteUsers").load('/question/'+questionId+'/invitations/'+type);
        }

    </script>



@endsection