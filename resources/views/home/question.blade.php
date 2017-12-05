@extends('layouts.home')
@section('title')
<title>搜狗问问-搜狗旗下最大互动问答社区</title>
@endsection

    <link rel="stylesheet" type="text/css" href="css/style_b69695e.css" />
            <link rel="stylesheet" type="text/css" href="css/style_d0e3af4.css" />
@section('body')

<div id="container">
    <div class="content">
        <div class="aside">
            <!-- 精彩回答 -->
            <div class="aside-section">
                <div class="aside-ask">
                    <h3 class="aside-ask-tit">提问的正确姿势</h3>
                    <ol class="aside-ask-lst">
                        <li><span>①</span> 问题要具体、语句通顺，不寻求模糊空洞的答案。广告等违反社区规则的提问将被删除并给予处罚。</li>
                        <li><span>②</span> 句式、标点符号使用严谨，问题尽量不含有与问题本身无关的词语（如：跪求大神，急急急）。</li>
                        <li><span>③</span> 打上正确的标签、添加悬赏将有助于更快地获得满意回答。</li>
                    </ol>
                </div>
            </div>
            <!-- //精彩回答 -->
        </div>

        <div class="main">
            <div class="ask-wrap">
                                                    <h1 class="ask-tit">描述您的问题</h1>
                                <div class="popup-tit">问题描述<span class="popup-tit-required">（必填）<i>*</i></span></div>
                <!-- 默认态：ipt-default;
                     输入状态：ipt-cur;
                     输入有误状态：ipt-err;-->
                <!-- 标题-激活 -->
                <div class="ipt-box ipt-cur">
                    <input type="text" id="ask_title" placeholder="一句话描述您的问题" class="popup-txtarea textarea" data-maxlength="40">
                    <div class="ipt-limit wordsLimit">可以输入<em>40</em>个字</div>
                    <div class="prompt-box err_tips hide"></div>
                    <!-- 答案列表 -->
                    <div class="ipt-lst-question same_question_box hide">
                        <div class="ipt-tit-question"><a href="javascript:;" class="btn-ipt-tit-question close_same_question">关闭</a>您的问题可能已经有了答案：</div>
                        <ul class="popup-lst-question same_question_list"></ul>
                    </div>
                    <!-- //答案列表 -->
                </div>
                <!-- //标题-激活 -->
                <div class="desc_ask">
                    <div class="ipt-bar"><span class="ipt-bar-txt">问题补充说明：</span></div>
                    <div class="ipt-box">
                        <textarea id="ask_content" cols="30" rows="3" placeholder="在这里继续补充您的问题细节" class="popup-txtarea popup-txtarea-h4 textarea" data-maxlength="200"></textarea>
                        <div class="ipt-limit wordsLimit">可以输入<em>200</em>个字</div>
                    </div>
                </div>
                <div class="ipt-bar ask_opera">
                    <a href="javascript:;" class="ipt-add-thumb add_pic" style="position: relative;"><i></i>添加图片
                        <form style="position: absolute;left:0;top:0;filter:alpha(opacity=0);opacity:0;" id="uploadImgForm" enctype="multipart/form-data" target="uploadImgIfr" name="uploadImg" method="post" action="/submit/qun/upload-pic-ie8">
                            <div style="display:none;"><input type="hidden" name="formids" value="If_1,pic"><input type="hidden" name="submitmode" value="submit"><input type="hidden" name="submitname" value=""><input type="hidden" name="If_1" value="F"></div>
                            <input accept="image/*" type="file" name="pic" id="pic" style="width:82px;height:19px;overflow: hidden;cursor:pointer;" multiple>
                        </form>
                        <iframe id="uploadImgIfr" name="uploadImgIfr" src="javascript:void((function(){document.open();document.domain='sogou.com';document.close()})());" style="display: none;"></iframe>
                    </a>
                </div>
                <!-- 图片 -->
                <div id="picShowWrap" class="hide">
                    <div class="pic-area">
                        <div class="picWrap"></div>
                        <div class="pic-section add_ask_image"><a href="javascript:;" class="pic-tab-more"><i></i>还可添加<em id="ask_uploadImage_num">5</em>张</a></div>
                    </div>
                    <div class="pic-area-txt">上传说明: 每张图片大小不超过5M，格式为jpg、bmp、png</div>
                </div>
                <!-- //图片 -->
                <div class="popup-tit">问题标签<span class="ipt-rgt-txt">正确的标签能够获得更专业的回答</span></div>
                <div class="ipt-box ipt-default select_tags">
                    <div class="ipt-srch-box tag_search_wrap">
                        <i class="ipt-srch-icon">搜索</i>
                        <input type="text" placeholder="搜索标签" class="ipt-popup-srch placeholder-txt tag_search_inp">
                        <ul class="popup-lst tag_search_box"></ul>
                    </div>
                </div>
                <div class="popup-tit">问题悬赏</div>
                <!-- 问题悬赏 -->
                <div class="popup-reward score_list ">
                    <a href="javascript:;" class="btn-popup-reward select_score">
                        <i class="arr-popup-reward"></i>
                        <i class="ico-popup-reward"></i>
                        <em class="score_val" data-oldscore="0"> 0 </em>
                    </a>
                    <ul class="popup-reward-lst">
                        <li><a href="javascript:;" class="score_sel"><i class="ico-popup-reward"></i>0</a></li>
                        <li><a href="javascript:;" class="score_sel"><i class="ico-popup-reward"></i>5</a></li>
                        <li><a href="javascript:;" class="score_sel"><i class="ico-popup-reward"></i>10</a></li>
                        <li><a href="javascript:;" class="score_sel"><i class="ico-popup-reward"></i>20</a></li>
                        <li><a href="javascript:;" class="score_sel"><i class="ico-popup-reward"></i>30</a></li>
                        <li><a href="javascript:;" class="score_sel"><i class="ico-popup-reward"></i>50</a></li>
                    </ul>
                                            <div class="popup-reward-txt">您目前<br>问豆为: <em class="emphasis-clr2 userMoney">32</em></div>
                                    </div>
                <!-- //问题悬赏 -->
                <div id="validCodeWrap"></div>
                <!-- ft-bar -->
                <div class="ft-bar">
                    <div class="ft-btn-box">
                        <a href="javascript:;" id="submit_question" class="btn-reply-submit">提&nbsp;&nbsp;&nbsp;&nbsp;交</a>
                    </div>
                    <!-- 短信验证 -->
                    <div class="btn-anonymous" id="smsVerify">
                    </div>
                    <div class="btn-anonymous">
                        <input type="checkbox" id="ask_anonymous">
                        <label for="ask_anonymous">匿名</label>
                    </div>
                </div>
                <!-- //ft-bar -->
            </div>
        </div>
    </div>
</div>



<script>
    var _gtag = _gtag || {};

    _gtag = {
        static_files_prefix: '/sf',
        userId: '715573738',
        uid: '39856031',
        orig: 253,
        userName: '%E3%8A%A3%20live%E3%80%82',
        traceId: 'ef4143b6abc77c8cb01f57275f99bf77',
        isLogin : true,
        bindPhone:'185****3766',
        userMoney: '32',
        search_url : '/s/?w=',
        ajax: {
            smartbox: 'http://sugg.search.wenwen.sogou.com/service-search/ajax/smartbox'
        },
        captcha: false,
        helperSelf: 'false' === 'true'
    };

</script>

<script crossorigin="anonymous" src="js/jquery-1.11.1.min.js"></script>
<script crossorigin="anonymous" src="js/polyfill.min.js"></script>

<script crossorigin="anonymous" src="js/preact.min.js"></script><script crossorigin="anonymous" src="js/main.js"></script>
<script crossorigin="anonymous" src="js/main.js"></script>
<script crossorigin="anonymous" src="js/main.js"></script>
<script crossorigin="anonymous" src="js/main.js"></script>
<script crossorigin="anonymous" src="js/main_752fbf3.js"></script>

<script crossorigin="anonymous" src="js/main_3c72742.js"></script>

@endsection