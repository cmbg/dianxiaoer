
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
    <style>
        .commentbox {
            width: 900px;
            margin: 20px auto;
        }
        .vc_row {
            margin-left: -15px;
            margin-right: -185px;
        }

        .mytextarea {
            width: 100%;
            overflow: auto;
            word-break: break-all;
            height: 100px;
            color: #000;
            font-size: 1em;
            resize: none;
        }

        .comment-list {
            width: 900px;
            margin: 20px auto;
            clear: both;
            padding-top: 20px;
        }

        .comment-list .comment-info {
            position: relative;
            margin-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
        }

        .comment-list .comment-info header {
            width: 10%;
            position: absolute;
        }

        .comment-list .comment-info header img {
            width: 100%;
            border-radius: 50%;
            padding: 5px;
        }

        .comment-list .comment-info .comment-right {
            padding: 5px 0px 5px 11%;
        }

        .comment-list .comment-info .comment-right h3 {
            margin: 5px 0px;
        }

        .comment-list .comment-info .comment-right .comment-content-header {
            height: 25px;
        }

        .comment-list .comment-info .comment-right .comment-content-header span, .comment-list .comment-info .comment-right .comment-content-footer span {
            padding-right: 2em;
            color: #aaa;
        }

        .comment-list .comment-info .comment-right .comment-content-header span, .comment-list .comment-info .comment-right .comment-content-footer span.reply-btn, .send, .reply-list-btn {
            cursor: pointer;
        }

        .comment-list .comment-info .comment-right .reply-list {
            border-left: 3px solid #ccc;
            padding-left: 7px;
        }

        .comment-list .comment-info .comment-right .reply-list .reply {
            border-bottom: 1px dashed #ccc;
        }

        .comment-list .comment-info .comment-right .reply-list .reply div span {
            padding-left: 10px;
        }

        .comment-list .comment-info .comment-right .reply-list .reply p span {
            padding-right: 2em;
            color: #aaa;
        }
    </style>



<div id="container" name="{{$id}}">
    <div class="commentbox">
        <textarea cols="80" rows="50" placeholder="来说几句吧......" class="mytextarea" id="content"></textarea>
        <div class="btn btn-info pull-right" id="comment">评论</div>
    </div>

    <div class="comment-list">

        @foreach($comment as $k => $v)
            @if($v->gid == $id && $v->pid == 0)

                <div class="comment-info">
                    <header><img src="{{$v->HomeUser->avatar}}"></header>
                    <div class="comment-right">
                        <h3>{{$v->HomeUser->uname}}</h3>
                        <div class="comment-content-header"><span><i
                                        class="glyphicon glyphicon-time"></i>{{$v->msgDate}} </span><span><i
                                        class="glyphicon glyphicon-map-marker"></i>北京</span></div>
                        <p class="content">{{$v->content}}</p>
                        <div class="comment-content-footer">
                            <div class="row">
                                <div class="col-md-10">
                                    <span><i class="glyphicon glyphicon-pushpin"></i> 来自:北京 </span><span><i
                                                class="glyphicon glyphicon-globe"></i>北美 </span>
                                </div>
                                <div class="col-md-2"><span id="vpid" name="{{$v->id}}"  class="reply-btn">回复</span></div>
                            </div>
                        </div>

                        <div class="reply-list">
                            @foreach($comment as $n => $m)
                                @if($v->id == $m->pid)
                                    <div  class="reply">
                                        <div><a href="javascript:void(0)"></a>{{$m->HomeUser->uname}}:<a href="javascript:void(0)">@\{{$v->HomeUser->uname}}</a><span >{{$m->content}}</span></div>
                                        <p><span>{{$m->msgDate}}</span> <span id="mpid" name="{{$m->pid}}" title="{{$m->id}}" class="reply-list-btn">回复</span></p>
                                    </div>

                                @endif
                                @foreach ($comment as $d => $p)
                                    @if($v-> id == $m-> pid  && $p->path == $m->pid && $p->path != 0 )
                                        <div id="url" name="{{url('home/com/reply')}}"  class="reply">
                                            <div><a href="javascript:void(0)">{{$p->HomeUser->uname}}</a>:<a
                                                        href="javascript:void(0)">@\{{$m->HomeUser->uname}}</a><span >{{$m->content}}</span>
                                            </div>
                                            <p><span>{{$p->msgDate}}</span> <span id="pid" name="{{$p->pid}}" title="{{$p->id}}" class="reply-list-btn">回复</span></p>
                                        </div>



                                    @endif
                                @endforeach
                            @endforeach
                        </div>


                    </div>

                </div>
            @endif
        @endforeach

    </div>
</div>

<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script src="{{asset('comment/js/jquery.comment.js')}}"></script>
<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
<script>


    //初始化数据
    {{--var arr = [--}}
            {{--@foreach($comment as $k => $v)--}}
            {{--@if($v->gid == 81 && $v->pid == 0)--}}
        {{--{--}}
            {{--id:{{$v->id}},--}}
            {{--img: "{{$v->HomeUser->avatar}}",--}}
            {{--replyName: "{{$v->HomeUser->uname}}",--}}
            {{--beReplyName: "",--}}
            {{--content: "{{$v->content}}",--}}
            {{--time: "{{$v->msgDate}}",--}}
            {{--address: "",--}}
            {{--osname: "",--}}
            {{--browse: "",--}}
            {{--replyBody: [--}}
                    {{--@if ($v->gid = 81 && $v->pid)--}}

                    {{--@foreach($comment as $n => $m)--}}
                    {{--@if($v->id == $m->pid)--}}

                {{--{--}}
                    {{--id:{{$m->id}},--}}
                    {{--img: "{{$m->HomeUser->avatar}}",--}}
                    {{--replyName: "{{$m->HomeUser->uname}}",--}}
                    {{--beReplyName: "{{$v->HomeUser->uname}}",--}}
                    {{--content: "{{$m->content}}",--}}
                    {{--time: "{{$m->msgDate}}",--}}
                    {{--address: "",--}}
                    {{--pid: "{{$m->pid}}",--}}
                    {{--osname: "",--}}
                    {{--browse: ""--}}
                {{--},--}}
                    {{--@endif--}}


                    {{--@foreach ($comment as $d => $p)--}}
                    {{--@if($v-> id == $m-> pid  && $p->path == $m->pid)--}}
                {{--{--}}
                    {{--id:{{$p->id}},--}}
                    {{--img: "{{$p->HomeUser->avatar}}",--}}
                    {{--replyName: "{{$p->HomeUser->uname}}",--}}
                    {{--beReplyName: "{{$m->HomeUser->uname}}",--}}
                    {{--content: "{{$p->content}}",--}}
                    {{--time: "{{$p->msgDate}}",--}}
                    {{--address: "",--}}
                    {{--pid: "{{$p->pid}}",--}}
                    {{--osname: "",--}}
                    {{--browse: ""--}}
                {{--},--}}
                {{--@endif--}}
                {{--@endforeach--}}
                {{--@endforeach--}}

            {{--]--}}
        {{--},--}}
        {{--@endif--}}
        {{--@endforeach  ]--}}
    var arr = [{id:1,img:"./images/img.jpg",replyName:"帅大叔",beReplyName:"匿名",content:"同学聚会，看到当年追我的屌丝开着宝马车带着他老婆来了，他老婆是我隔壁宿舍的同班同学，心里后悔极了。",time:"2017-10-17 11:42:53",address:"深圳",osname:"",browse:"谷歌",replyBody:[]}]
    $(function () {
        $(".comment-list").addCommentList({data: arr, add: ""});
        $("#comment").click(function () {
            var obj = new Object();
            obj.img = "{{asset('comment/images/img.jpg')}}";
            obj.home_ame = "帅哥";
            var com = obj.content = $("#content").val();
            obj.browse = "深圳";
            obj.osname = "win10";
            obj.replyBody = "";
            $(".comment-list").addCommentList({data: [], add: obj});
            $.ajax({
                url: '{{url('home/com/ajax')}}',
                type: 'post',
                data: {'_token': '{{csrf_token()}}', 'content': com, 'gid': '{{$id}}'},
                success: function (data) {
                    location.href = location.href;
                }

            })
        });
    })



</script>
</body>
</html>