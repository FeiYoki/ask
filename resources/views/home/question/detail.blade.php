
@extends('layouts.home')
@section('title')
    <title>问题详情</title>
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
                <div class="widget-question">
                    <h4 class="title">
                        {{$question['title']}}
                    </h4>
                    <ul class="taglist-inline">
                    </ul>
                    <div class="description mt-10">
                        <div class="text-fmt ">
                            {!! $question['content'] !!}
                        </div>

                        <div class="post-opt mt-10">
                            <ul class="list-inline">
                                <!-- <li><a class="comments"  data-toggle="collapse"  href="#comments-question-3" aria-expanded="false" aria-controls="comment-3"><i class="fa fa-comment-o"></i> 0 条评论</a></li> -->
                                <li><a href="{{ asset('home/question/'.$question['qid'].'/edit') }}" class="edit" data-toggle="tooltip" data-placement="right" title="" data-original-title="补充细节，以得到更准确的答案"><i class="fa fa-edit"></i> 编辑</a></li>
                                <li><a href="javascript:;" class="edit" onclick="qDel({{$question['qid']}})" ><i class="fa fa-edit"></i> 删除</a></li>
                                <script>

                                    function qDel(id) {

                                        //询问框
                                        layer.confirm('删除问题以及答案会扣除30积分!您确认删除吗？', {
                                            btn: ['确认','取消'] //按钮
                                        }, function(){
                                            //如果用户发出删除请求，应该使用ajax向服务器发送删除请求
                                            $.post("{{url('home/question')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                                                //删除成功
                                                if(data.error == 0){
                                                    layer.msg(data.msg, {icon: 6});
                                                    window.location.href = "{{url('admin/index')}}";
                                                }else{
                                                    layer.msg(data.msg, {icon: 5});
                                                    var t=setTimeout("location.href = location.href;",2000);
                                                }


                                            });
                                        }, function(){

                                        });
                                    }
                                </script>
                                <!-- <li><a href="#" data-toggle="modal" data-target="#appendReward"  ><i class="fa fa-database"></i> 追加悬赏</a></li> -->
                                <!-- <li><a href="#" data-toggle="modal" data-target="#inviteAnswer"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> 邀请回答</a></li> -->
                            </ul>
                        </div>

                        <div class="collapse widget-comments mb-20" id="comments-question-3" data-source_type="question" data-source_id="3">
                            <div class="widget-comment-list"></div>
                            <div class="widget-comment-form row">
                                <form class="col-md-12" >
                                    <div class="form-group">
                                        <textarea name="content" placeholder="写下你的评论" class="form-control" id="comment-question-content-3"></textarea>
                                    </div>
                                </form>
                                <div class="col-md-12 text-right">
                                    <a href="#" class="text-muted collapse-cancel" data-collapse_id="comments-question-3">取消</a>
                                    <button type="submit" class="btn btn-primary btn-sm ml-10 comment-btn" id="question-comment-3-btn"  data-token="svFwja2PS1gWZauwPBVkNlUBOJiw1B3I2QKB7v5Q" data-source_id="3"  data-source_type="question" data-to_user_id="0">提交评论</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="widget-answers mt-15">
                    <div class="btn-group pull-right" role="group">
                    </div>


                    @if(!empty($count))
                        <h2 class="h4 post-title"> {{$count}} 个回答</h2>

                    @endif
                    @if(!empty($answer))
                    @foreach($answer as $k=>$v)

                    <div class="media">
                        <div class="media-left">
                            <a href="http://localhost/tipask/public/people/2" class="avatar-link user-card" target="_blank">
                                {{--<img class="avatar-40 hidden-xs"  src="http://localhost/tipask/public/image/avatar/2_middle.jpg" alt="xxxxxx"></a>--}}
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <strong>
                                    <a href="http://localhost/tipask/public/people/2" class="mr-5 user-card">xxxxxx</a><span class="text-gold">                                </span>
                                </strong>
                                <span class="answer-time text-muted hidden-xs">回答时间 {{$v->date}}</span>
                            </div>
                            <div class="content">
                                {!! $v->content !!}
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
                                    {{--<li><a class="comments"  data-toggle="collapse"  href="#comments-answer-1" aria-expanded="false" aria-controls="comment-1"><i class="fa fa-comment-o"></i> 0 条评论</a></li>--}}
                                    {{--<li><a href="http://localhost/tipask/public/answer/edit/1" data-toggle="tooltip" data-placement="right" title="" data-original-title="继续完善回答内容"><i class="fa fa-edit"></i> 编辑</a></li>--}}
                                    @if($v->bestanswer!==1)
                                    <li><a href="javascript:;" onclick="aBest({{ $v->aid }})" class="adopt-answer" ><i class="fa fa-check-square-o"></i> 采纳</a></li>
                                    @else
                                    <li><b>最佳答案</b></li>
                                    @endif
                                    <li class="pull-right">
                                        {{--<button class="btn btn-default btn-sm btn-support" data-source_id="1" data-source_type="answer"  data-support_num="0"><i class="fa fa-thumbs-o-up"></i> 0</button>--}}
                                    </li>
                                </ul>
                            </div>
                            <script>

                                function aBest(id) {

                                    //询问框
                                    layer.confirm('您确认采纳此答案为最佳答案吗?', {
                                        btn: ['确认','取消'] //按钮
                                    }, function(){
                                        //如果用户发出删除请求，应该使用ajax向服务器发送删除请求
                                        $.post("{{url('home/question/bestanswer')}}/"+id,{"_token":"{{csrf_token()}}"},function(data){
                                            //删除成功
                                            console.log(data);
                                            if(data.error == 0){
                                                layer.msg(data.msg, {icon: 6});
                                                var t=setTimeout("location.href = location.href;",2000);
                                            }else{
                                                layer.msg(data.msg, {icon: 5});
                                                var t=setTimeout("location.href = location.href;",2000);
                                            }


                                        });
                                    }, function(){

                                    });
                                }
                            </script>
                            <div class="collapse widget-comments mb-20" id="comments-answer-1" data-source_type="answer" data-source_id="1">
                                <div class="widget-comment-list"></div>
                                <div class="widget-comment-form row">
                                    <form class="col-md-12" >
                                        <div class="form-group">
                                            <textarea name="content" placeholder="写下你的评论" class="form-control" id="comment-answer-content-1"></textarea>
                                        </div>
                                    </form>
                                    <div class="col-md-12 text-right">
                                        <a href="#" class="text-muted collapse-cancel" data-collapse_id="comments-answer-1">取消</a>
                                        <button type="submit" class="btn btn-primary btn-sm ml-10 comment-btn" id="answer-comment-1-btn"  data-token="svFwja2PS1gWZauwPBVkNlUBOJiw1B3I2QKB7v5Q" data-source_id="1"  data-source_type="answer" data-to_user_id="0">提交评论</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="text-center">

                    </div>

                </div>
                <div class="widget-answer-form mt-15">

                </div>

            </div>

            <div class="col-xs-12 col-md-3 side">
                <div class="widget-box">
                    <ul class="widget-action list-unstyled">
                        <li>
                            <button type="button" id="follow-button" class="btn btn-success btn-sm" data-source_type = "question" data-source_id = "3" data-show_num="true"  data-toggle="tooltip" data-placement="right" title="" data-original-title="亲!已有{{ $question['click'] }}人来看你的问题啦">浏览</button>
                            <strong id="follower-num">{{ $question['click'] }}</strong>
                        </li>
                        <li>
                            {{--<button id="collect-button" class="btn btn-default btn-sm" data-source_type = "question" data-source_id = "3" > 收藏</button>--}}
                            {{--<strong id="collection-num">0</strong> 收藏，<strong class= "no-stress">{{ $question['click'] }}</strong> 浏览--}}
                        </li>
                        <li>
                            <i class="fa fa-clock-o"></i>
                            <a href="http://localhost/tipask/public/people/1" target="_blank">admin</a>
                            提出于 {{ date('Y-m-d',$question['date']) }}</li>
                    </ul>
                </div>
                <div class="widget-box">
                    <h2 class="h4 widget-box__title">相似问题</h2>
                    <ul class="widget-links list-unstyled list-text">
                        @foreach($questions as $k=>$v)
                        <li class="widget-links-item">
                            <a title="{{$v->title}}" href="{{asset('home/question/'.$v->qid.'/detail')}}">{{$v->title}}</a>
                        </li>
                        @endforeach
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

                        <form class="form-inline" id="rewardForm" action="http://localhost/tipask/public/question/3/appendReward" method="post">
                            <input type="hidden"  name="_token" value="svFwja2PS1gWZauwPBVkNlUBOJiw1B3I2QKB7v5Q">
                            <div class="form-group">
                                <label for="reward">追加</label>
                                <select class="form-control" name="coins" id="question_coins">
                                    <option value="3" selected>3</option><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="30">30</option><option value="50">50</option><option value="80">80</option><option value="100">100</option>
                                </select> 个金币
                            </div>
                            <div class="form-group">
                                （您目前共有 <span class="text-gold">0</span> 个金币）
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
        {{--<div class="modal" id="adoptAnswer" tabindex="-1" role="dialog" aria-labelledby="adoptAnswerLabel">--}}
            {{--<div class="modal-dialog" role="document">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        {{--<h4 class="modal-title" id="adoptModalLabel">采纳回答</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<div class="alert alert-warning" role="alert" id="adoptAnswerAlert">--}}
                            {{--<i class="fa fa-exclamation-circle"></i> 确认采纳该回答为最佳答案？--}}
                        {{--</div>--}}
                        {{--<blockquote id="answer_quote"></blockquote>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>--}}
                        {{--<button type="button" class="btn btn-primary" id="adoptAnswerSubmit">采纳该回答</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="modal" id="inviteAnswer" tabindex="-1" role="dialog" aria-labelledby="inviteAnswerLabel">--}}
            {{--<div class="modal-dialog" role="document">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        {{--<h4 class="modal-title" id="appendModalLabel">邀请回答</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<div class="alert alert-success" role="alert" id="rewardAlert">--}}
                            {{--<i class="fa fa-exclamation-circle"></i> 不知道答案？你还可以邀请他人进行解答，每天可以邀请10次。--}}
                        {{--</div>--}}
                        {{--<form class="invite-popup" id="inviteEmailForm"  action="http://localhost/tipask/public/question/inviteEmail/3" method="get">--}}
                            {{--<div style="position: relative;">--}}
                                {{--<ul class="nav nav-tabs">--}}
                                    {{--<li class="active"><a data-by="username" href="#by-username" data-toggle="tab">站内邀请</a></li>--}}
                                    {{--<li><a data-by="email" href="#by-email" data-toggle="tab">Email 邀请</a></li>--}}
                                {{--</ul>--}}
                                {{--<div class="tab-content invite-tab-content mt-10">--}}
                                    {{--<div class="tab-pane active" id="by-username" data-type="username">--}}
                                        {{--<div class="search-user" id="questionSlug">--}}
                                            {{--<input id="invite_word" class="text-28 form-control" type="text" name="word" autocomplete="off" placeholder="搜索你要邀请的人">--}}
                                        {{--</div>--}}
                                        {{--<p class="help-block" id="questionInviteUsers"></p>--}}
                                        {{--<div class="invite-question-modal">--}}
                                            {{--<div class="row invite-question-list" id="invite_user_list">--}}
                                                {{--<div class="text-center" id="invite_loading">--}}
                                                    {{--<i class="fa fa-spinner fa-spin"></i>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="tab-pane" id="by-email" data-type="email">--}}
                                        {{--<div class="mb-10">--}}
                                            {{--<input class="text-28 form-control" type="email" name="sendTo" placeholder="Email 地址">--}}
                                        {{--</div>--}}
                                        {{--<p><textarea class="textarea-13 form-control" name="message" rows="5">我在 php193问答系统 上遇到了问题「22222」 → http://localhost/tipask/public/question/3，希望您能帮我解答 </textarea></p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}

                    {{--</div>--}}
                    {{--<div class="modal-footer" style="display:none;">--}}
                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>--}}
                        {{--<button type="button" class="btn btn-primary invite-email-btn">确认</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
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
                    <input type="hidden"  name="_token" value="svFwja2PS1gWZauwPBVkNlUBOJiw1B3I2QKB7v5Q">
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
<script src="{{ asset('/static/js/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('layer/layer.js')}}"></script>

<script type="text/javascript">
//    var invitation_timer = null;
//    var question_id = "3";
//    $(document).ready(function() {
//        /*问题悬赏*/
//        $("#appendRewardSubmit").click(function(){
//            var user_total_conis = '0';
//            var reward = $("#question_coins").val();
//
//            if(reward>parseInt(user_total_conis)){
//                $("#rewardAlert").attr('class','alert alert-warning');
//                $("#rewardAlert").html('金币数不能大于'+user_total_conis);
//            }else{
//                $("#rewardAlert").empty();
//                $("#rewardAlert").attr('class','');
//                $("#rewardForm").submit();
//            }
//        });
//
//        /*回答编辑器初始化*/
//        $('#answer_editor').summernote({
//            lang: 'zh-CN',
//            height: 160,
//            placeholder:'撰写答案',
//            toolbar: [ ['common', ['style','bold','ol','link','picture','clear','fullscreen']] ],
//            callbacks: {
//                onChange:function (contents, $editable) {
//                    var code = $(this).summernote("code");
//                    $("#answer_editor_content").val(code);
//                },
//                onImageUpload:function(files) {
//                    upload_editor_image(files[0],'answer_editor');
//                }
//            }
//        });

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
//        $("#collect-button").click(function(){
//            $("#collect-button").button('loading');
//            var source_type = $(this).data('source_type');
//            var source_id = $(this).data('source_id');
//            var collection_num = $("#collection-num").html();
//            $.get('/collect/'+source_type+'/'+source_id,function(msg){
//                $("#collect-button").removeClass('disabled');
//                $("#collect-button").removeAttr('disabled');
//                if(msg=='collected'){
//                    $("#collect-button").html('已收藏');
//                    $("#collection-num").html(parseInt(collection_num)+1);
//                }else{
//                    $("#collect-button").html('收藏');
//                    $("#collection-num").html(parseInt(collection_num)-1);
//                }
//            });
//        });

        /*采纳回答为最佳答案*/
//        $(".adopt-answer").click(function(){
//            var answer_id = $(this).data('answer_id');
//            $("#adoptAnswerSubmit").attr('data-answer_id',answer_id);
//            $("#answer_quote").html($(this).data('answer_content'));
//        });
//
//        $("#adoptAnswerSubmit").click(function(){
//            document.location = "/answer/adopt/"+$(this).data('answer_id');
//        });

        /*邀请回答模块逻辑处理*/
        /*私信模块处理*/

//        $('#inviteAnswer').on('show.bs.modal', function (event) {
//
//            var button = $(event.relatedTarget);
//            var modal = $(this);
//            loadInviteUsers(question_id,'');
//            loadQuestionInvitedUsers(question_id,'part');
//
//        });
//
//
//        $("#invite_word").on("keydown",function(){
//            if(invitation_timer){
//                clearTimeout(invitation_timer);
//            }
//            invitation_timer = setTimeout(function() {
//                var word = $("#invite_word").val();
//                console.log(word);
//                loadInviteUsers(question_id,word);
//            }, 500);
//        });
//
//        $(".invite-question-list").on("click",".invite-question-item-btn",function(){
//            var invite_btn = $(this);
//            var question_id = invite_btn.data('question_id');
//            var user_id = invite_btn.data('user_id');
//
//            $.ajax({
//                type: "get",
//                url:"/question/invite/"+question_id+"/"+user_id,
//                success: function(data){
//                    if(data.code > 0){
//                        alert(data.message);
//                        return false;
//                    }
//                    invite_btn.html('已邀请');
//                    invite_btn.attr("class","btn btn-default btn-xs invite-question-item-btn disabled");
//                    loadQuestionInvitedUsers(question_id,'part');
//                },
//                error: function(data){
//                    console.log(data);
//                }
//            });
//        });
//
//        $("#inviteAnswer").on("click","#showAllInvitedUsers",function(){
//            loadQuestionInvitedUsers(3,'all');
//        });
//
//        /*tag切换*/
//        $('#inviteAnswer a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//            var tabBy = $(this).data("by");
//            if( tabBy == 'email' ){
//                $("#inviteAnswer .modal-footer").show();
//            }else{
//                $("#inviteAnswer .modal-footer").hide();
//            }
//
//        });
//
//        /*邀请邮箱回答*/
//        $("#inviteAnswer .invite-email-btn").click(function(){
//            var formData = $("#inviteEmailForm").serialize();
//            $.ajax({
//                type: "post",
//                url: "/question/inviteEmail/3",
//                data:formData,
//                success: function(data){
//                    if(data.code>0){
//                        alert(data.message);
//                    }else{
//                        alert("邀请成功，邀请邮件已发送！");
//                    }
//                    $("#inviteAnswer").modal("hide");
//
//                },
//                error: function(data){
//                    console.log(data);
//                    alert("操作出错，请稍后再试");
//                    $("#inviteAnswer").modal("hide");
//                }
//            });
//        });
//
//
//    });


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
                            inviteItemHtml += '<button type="button" class="btn btn-default btn-xs invite-question-item-btn disabled" data-question_id="3"  data-user_id="'+item.id+'">已邀请</button>';
                        }else{
                            inviteItemHtml += '<button type="button" class="btn btn-default btn-xs invite-question-item-btn" data-question_id="3"  data-user_id="'+item.id+'">邀请回答</button>';
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