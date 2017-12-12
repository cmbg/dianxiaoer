@extends('Home.Layout.layout')
@section('body')
    <body class="page woocommerce-checkout woocommerce-page">
    @stop
    @section('content')
        <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <div style="width:1200px;height:1000px; margin: 0px auto;">

            <style>

                #con {
                    width: 1024px;
                    /*height: 800px;*/
                    /*border:  1px solid #ccc;*/
                    margin: 0 auto;
                }

                #con ul {
                    float: left;
                    width: 240px;
                    /*border: 1px solid #0f0;*/

                }

                .ul li {
                    width: 230px;
                    padding: 10px;
                    border: 1px solid #c00;
                    margin: 10px 0;
                    position: relative;
                }

                .ul li img {
                    width: 100%;
                }

                .price {
                    font-size: 28px;
                    color: #f00;
                }

                .focus {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    background: green;
                    font-size: 14px;
                    width: 50px;
                    height: 30px;
                    line-height: 30px;
                    text-align: center;
                    color: #fff;
                }

            </style>

            <div class="price">
                @if(!empty($cate->cate_name))
                    {{$cate->cate_name}}>>
            @endif
                <span style="font-size:20px" class="price" >
                    @if($gname)
                    {{$gname}}>>
                    @endif
                    <span>
            </div>


            <li id="item" style="display: none;">
                <img onclick="det(this)" name="" src="./uploads/0ab3067d0a45fb4efb3d4ed1f4160523.jpg">
                <h3>秋天小碎花裙子</h3>
                <div>惊爆价：￥<span class="price">78</span>元</div>
                <div><span style="color:red" class="yt"> </span></div>
                <div class="focus">1273</div>     {{csrf_field()}}
                <div><span><button type="button" class="btn btn-block btn-warning btn-sm"><font
                                    style="vertical-align: inherit;"><font style="vertical-align: inherit;">加入购物车</font></font></button></span>
                </div>
            </li>

            <div id="con">
                <ul class="ul">
                </ul>
                <ul class="ul">
                </ul>
                <ul class="ul">
                </ul>
                <ul class="ul">
                </ul>
            </div>

            <script type="text/javascript">

                var p = 2;
                var isDown = false;


                $(function(){
//                    location.href =location.href;
                    var p = 1;
                    ajax(p);
                })


                $(window).on('scroll', function () {

                    if (isDown) return;

                    run();

                });

                run();

                function run() {
                    // 是否应该请求。
                    var vH = $(window).height();
                    console.log(vH);
                    var sH = $(window).scrollTop();
                    sH = sH + 2;
                    console.log(sH);
                    var dH = $(document).height();
                    console.log(dH);
                    if (vH + sH >= dH) {
                        ajax(p)
                        p++;

                    }
                }

                function ajax(p) {
                    $.ajax('{{url('home/goods/ajax')}}', {
                        data: {page: p,'tid':'{{$id}}','gname':'{{$gname}}'},
                        success: function (data) {
                            if (data.length <= 0) {
                                isDown = true;
                                return;
                            }

                            // 解析从服务器返回的数据。
                            for (var i in data.data) {
//                                console.log(data.data[i].fishpond.fishpondname);
                                var newItem = $("#item").clone();
                                newItem.find('img').attr('src', data.data[i].pic);
                                newItem.find('img').attr('name', data.data[i].gid);
                                newItem.find('h3').html(data.data[i].gname);
                                newItem.find('.price').html(data.data[i].price);
                                if(data.data[i].fishpond){
                                    newItem.find('.yt').html(data.data[i].fishpond.fishpondname+'鱼塘');
                                }
//                                newItem.find('.yt').html(data.data[i].cate.cate_name);
                                newItem.find('.focus').html(data.data[i].focus);

                                // 0%4 0
                                // 1%4 1
                                // 2%4 2
                                // 3%4 3
                                // 4%4 0

                                var index = i % 4;
                                $(".ul").eq(index).append(newItem);
                                newItem.show(1000);
                            }
                        },
                        error: function () {
                        },
                        dataType: 'json'
                    });

                };

                function det(obj) {
                    var gid = $(obj).attr('name');

                    window.location.href = "{{url('home/goods/det')}}" + '/' + gid;
                }

            </script>
        </div>
@stop
