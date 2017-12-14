@extends('layouts.home')
@section('title')
    <title>搜索一下</title>
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
                    <div class="container mt-20">
            <div class="row">
                <div class="container">
                    <ul class="search-category nav nav-pills">
                        <li  class="active"  ><a href="http://localhost/tipask-3.2.1/public/search/questions?word=sd">问答</a></li>
                        <li ><a href="http://localhost/tipask-3.2.1/public/search/articles?word=sd">文章</a></li>
                        <li ><a href="http://localhost/tipask-3.2.1/public/search/tags?word=sd">标签</a></li>
                        <li ><a href="http://localhost/tipask-3.2.1/public/search/users?word=sd">用户</a></li>
                    </ul>
                    <form action="{{asset('home/research/search')}}" class="row" method="post">
                    {{csrf_field()}}
                        <div class="col-md-9">
                            <input class="input-lg form-control" type="text" name="word" value="@if(!empty($input)){{$input}}@endif" placeholder="输入关键字搜索">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">搜索</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 main search-result">

                    @foreach($res as $k=>$v)
                    <section class="widget-question">
                        
                        <h2 class="h4" id="title">
                          	<a href="{{asset('home/question/'.$v->qid.'/detail')}}"> 
                                {{$v->title}}
                            </a>
                        </h2>
                        
                        <p class="excerpt">{!! $v->content !!}</p>
                        <div id="xxoo">{!! date('Y-m-d H:i:s',$v->date) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! $v->cname !!}</div>
                        
                    </section>
                    @endforeach
						<style>
                            #xxoo{
                                font-size:7px;
                                color:#B9CACC;
                            }
                            #title{
                                font-size:20px;
                            }

                        </style>


					<div class="page_list">
                    @if(empty($input))
                        {!! $res->render() !!}
                    @else
                        {!! $res->appends(['word'=>$input])->render() !!}
                    @endif
                	</div>


                    <div class="text-center">
                        
                    </div>
                </div>
                <div class="col-md-3 side">
                    <ul class="list-unstyled">
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
                    <input type="hidden"  name="_token" value="p8eq1rEiPA6SPUNr18xKos92AHaMHnDmLPh22B0t">
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