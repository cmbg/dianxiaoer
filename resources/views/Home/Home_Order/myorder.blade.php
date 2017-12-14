@extends('Home.Layout.layout')
@section('body')
    <meta name="format-detection" content="telephone=no">
    <link type="text/css" rel="stylesheet" href="{{asset('/Home/css/css/commonbak.css')}}" source="widget">
    <link rel="stylesheet" href="{{asset('/Home/css/css/myjd.order2015bak.css')}}">
    <link rel="stylesheet" href="{{asset('/Home/css/css/alpha3bak.css')}}">
    <link charset="utf-8" rel="stylesheet" href="{{asset('/Home/css/css/tipsbak.css')}}">
    <body class="page woocommerce-account woocommerce-page">
    @stop
    @section('content')
        <div class="listings-title">
            <div class="container">
                <div class="wrap-title">
                    <h1>我的订单</h1>
                    <div class="bread">
                        <div class="breadcrumbs theme-clearfix">
                            <div class="container">
                                <ul class="breadcrumb">
                                    <li>
                                        <a href="{{url('/home/index')}}">主页</a>
                                        <span class="go-page"></span>
                                    </li>

                                    <li class="active">
                                        <span>我的订单</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="post-6 page type-page status-publish hentry">
                        <div class="entry-content">
                            <div class="entry-content">
                                <div class="woocommerce">
                                    <div class="woocommerce-MyAccount-content">
                                        <div class="mod-main mod-comm lefta-box" id="order02">
                                            <div class="mt">
                                                <ul class="extra-l">
                                                    <li class="fore1"><a href="{{url('/home/myorder')}}"
                                                                         class="txt curr">所有订单</a></li>
                                                    <li><a href="{{url('/home/myorder/1')}}"
                                                           id="ordertoPay" clstag="click|keycount|orderinfo|waitPay"
                                                           class="txt">未发货</a><em>{{$res1}}</em></li>
                                                    <li><a href="{{url('/home/myorder/2')}}"
                                                           id="ordertoReceive"
                                                           clstag="click|keycount|orderinfo|waitReceive"
                                                           class="txt">待收货</a><a
                                                                href="{{url('/home/myorder/2')}}"><em>{{$res2}}</em></a>
                                                    </li>
                                                    <li><a href="{{url('/home/myorder/3')}}"
                                                           id="ordertoComment" class="txt"
                                                           clstag="click|keycount|orderinfo|daipingjia">待评价</a><a
                                                                href="{{url('/home/myorder/3')}}"><em>{{$res3}}</em></a>
                                                    </li>
                                                </ul>
                                                <div class="extra-r">
                                                    <div class="search">
                                                        <form action="{{url('/home/myorder')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="text" class="input-text" style="width:200px" name="oid"  placeholder="订单号" value="{{$request->oid}}">
                                                            <button type="submit">搜索</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mc">
                                                <table class="td-void order-tb">
                                                    <colgroup>
                                                        <col class="number-col">
                                                        <col class="consignee-col">
                                                        <col class="amount-col">
                                                        <col class="status-col">
                                                        <col class="operate-col">
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="order-detail-txt ac">订单详情</div>
                                                        </th>
                                                        <th>收货人</th>
                                                        <th>金额</th>
                                                        <th>
                                                            <div>
                                                                <div class="order-detail-txt ac">状态</div>
                                                            </div>
                                                        </th>
                                                        {{--<th>操作</th>--}}
                                                    </tr>
                                                    </thead>

                                                    <tbody id="tb-43244043248">
                                                    @if(!empty($order))
                                                    @foreach($order as $k=>$v)
                                                    <tr class="sep-row">
                                                        <td colspan="5"></td>
                                                    </tr>

                                                    <tr class="tr-th">
                                                        <td colspan="5">
                                                            <span class="gap"></span>
                                                            <span class="dealtime" title="2016-11-01 23:43:57">{{$v[0]->ontime}}</span>
                                                            <span class="number">订单号：{{$k}}</span>
                                                            <div class="tr-operate">
                                                                <span class="order-shop">
                                                                <span class="shop-txt"></span>
                                                                </span>
                                                                <span class="order-shop">
                                                                <span class="shop-txt"></span>
                                                                </span>
                                                                @if($v[0]->status == 3)<a href="javascript:;" onclick="del('{{$k}}');"><span>删除</span><a>@endif
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <tr class="tr-bd" id="track43244043248" oty="0,1,70">
                                                        <td style="padding:0px;">
                                                            <!--  每一种商品  -->
                                                            @foreach($v as $m=>$n)
                                                            <div style="padding:14px 0;border:1px solid #e5e5e5;border-collapse:collapse;">
                                                                <div class="goods-item p-11362614">
                                                                    <div class="p-img">
                                                                        <a href="{{asset('/home/goods/det/'.$n->gid)}}"
                                                                           clstag="click|keycount|orderinfo|order_product"
                                                                           target="_blank">
                                                                            <img class="" src="{{$n->pic}}"
                                                                                 title="{{$n->gname}}" data-lazy-img="done" width="60px"
                                                                                 height="100px">
                                                                        </a>
                                                                    </div>
                                                                    <div class="p-msg">
                                                                        <div class="p-name"><a
                                                                                    href="{{asset('/home/goods/det/'.$n->gid)}}"
                                                                                    class="a-link"
                                                                                    clstag="click|keycount|orderinfo|order_product"
                                                                                    target="_blank"
                                                                                    title="{{$n->gname}}">{{$n->gname}}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="goods-repair">x{{$n->bcnt}}</div>
                                                                <div class="goods-repair">￥{{$n->bprice}}</div>
                                                                <div class="clr"></div>
                                                            </div>
                                                                @endforeach
                                                        </td>

                                                        <!--  订单的其它内容  -->
                                                        <td>
                                                            <div >
                                                                <span class="txt">{{$v[0]->name}}</span><b></b>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="amount">
                                                                <strong></strong> <br>
                                                                <span>总额 ￥{{$v[0]->oprice}}</span> <br>
                                                                <strong></strong> <br>
                                                                <span class="ftx-13">{{$v[0]->pay}}</span>
                                                                <strong></strong> <br>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="status">
                                                                <span class="order-status ftx-04">
                                                                    @if($v[0]->status == 1)
                                                                    <span style="color:red;">正在出库</span>
                                                                    @elseif($v[0]->status == 2)
                                                                    <a href="javascript:;" onclick="setBtn('{{$k}}');"><span style="color:red;">确认收货</span><a>
                                                                    @elseif($v[0]->status == 3)
                                                                    <span style="color:blue;">完成交易</span>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!--  其它内容结束   -->
                                                    </tbody>
                                                    @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop

    @section('js')
        <script type="text/javascript" src="{{asset('Home/js/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript"
                src="{{asset('Home/js/jquery/jquery-migrate.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Home/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript"
                src="{{asset('Home/js/jquery/js.cookie.min.js')}}"></script>

        <!-- OPEN LIBS JS -->
        <script type="text/javascript"
                src="{{asset('Home/js/owl-carousel/owl.carousel.min.js')}}"></script>
        <script type="text/javascript"
                src="{{asset('Home/js/slick-1.6.0/slick.min.js')}}"></script>

        <script type="text/javascript"
                src="{{asset('Home/js/yith-woocommerce-compare/jquery.colorbox-min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Home/js/sw_core/isotope.js')}}"></script>
        <script type="text/javascript"
                src="{{asset('Home/js/sw_core/jquery.fancybox.pack.js')}}"></script>
        <script type="text/javascript"
                src="{{asset('Home/js/sw_woocommerce/category-ajax.js')}}"></script>
        <script type="text/javascript"
                src="{{asset('Home/js/sw_woocommerce/jquery.countdown.min.js')}}"></script>
        <script type="text/javascript"
                src="{{asset('Home/js/js_composer/js_composer_front.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('Home/js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('Home/js/megamenu.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('Home/js/main.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
        <script type="text/javascript">
            var sticky_navigation_offset_top = $("#header .header-bottom").offset().top;
            var sticky_navigation = function () {
                var scroll_top = $(window).scrollTop();
                if (scroll_top > sticky_navigation_offset_top) {
                    $("#header .header-bottom").addClass("sticky-menu");
                    $("#header .header-bottom").css({"top": 0, "left": 0, "right": 0});
                } else {
                    $("#header .header-bottom").removeClass("sticky-menu");
                }
            };
            sticky_navigation();
            $(window).scroll(function () {
                sticky_navigation();
            });

            $(document).ready(function () {
                $(".show-dropdown").each(function () {
                    $(this).on("click", function () {
                        $(this).toggleClass("show");
                        var $element = $(this).parent().find("> ul");
                        $element.toggle(300);
                    });
                });
            });
        </script>

        <!--[if gte IE 9]><!-->
        <script type="text/javascript">
            var request, b = document.body, c = 'className', cs = 'customize-support',
                rcs = new RegExp('(^|\\s+)(no-)?' + cs + '(\\s+|$)');
            request = true;

            b[c] = b[c].replace(rcs, ' ');
            // The customizer requires postMessage and CORS (if the site is cross domain)
            b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
        </script>
        <!--<![endif]-->
    </body>
    </html>
    <script>
        function setBtn($oid) {
            console.log($oid);
            $.ajax(
                {
                    url: '/home/myorder/status',
                    data: {oid: $oid, _token: "{{csrf_token()}}"},
                    type: 'post',
                    success: function (data) {
                        location.href = location.href;
                    },
                    error: function () {

                    },
                    dataType: 'json'
                }
            );
        }
    </script>
    <script>
        function del(node) {
            //询问框
            layer.confirm('您确认删除吗？', {
                btn: ['确认', '取消'] //按钮
            }, function () {
                //如果用户发出删除请求，应该使用ajax向服务器发送删除请求
                //$.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                //admin/user/1
                $.post("{{url('/home/myorder/delete')}}", {
                    "oid": node,
//                    "_method": "delete",
                    "_token": "{{csrf_token()}}"
                }, function (data) {
//                  console.log(data);
                    //data是json格式的字符串，在js中如何将一个json字符串变成json对象
                    //var res =  JSON.parse(data);
                    //删除成功
                    if (data.error == 0) {
                        //console.log("错误号"+res.error);
                        //console.log("错误信息"+res.msg);
                        layer.msg(data.msg, {icon: 6});
                        var t = setTimeout("location.href = location.href;", 1000);
//                                                            location.href = location.href;
                    } else {
                        layer.msg(data.msg, {icon: 5});
                        var t = setTimeout("location.href = location.href;", 1000);
//                                                            location.href = location.href;
                    }
                });
            }, function () {

            });
        }
    </script>
@stop
@section('myorder')



@stop
