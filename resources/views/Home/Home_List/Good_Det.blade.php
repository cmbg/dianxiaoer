@extends('Home.Layout.layout')
@section('body')
    <body class="page woocommerce-checkout woocommerce-page">
    @stop
    @section('content')
        <link rel="stylesheet" href="{{asset('det/css/minified.css')}}">
        <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{asset('det/js/modernizr.min.js')}}"></script>
        <!-- PARTICULAR PAGES CSS FILES -->
        <link rel="stylesheet" href="{{asset('det/css/jquery.nouislider.css')}}">
        <link rel="stylesheet" href="{{asset('det/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('det/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('det/css/innerpage.css')}}">
        <!-- // PARTICULAR PAGES CSS FILES -->
        <link rel="stylesheet" href="{{asset('det/css/responsive.css')}}">
        <style>
            #main-menu {
                padding: 15px 250px 14px;
        </style>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        <div style="margin:10px" class="container">
            <div class="row" style="    margin-left: 40px;">
                <!-- PRODUCT PREVIEW -->
                <div class="col-xs-12 col-sm-4">

                    <div class="product-preview">
                        <div class="big-image">
                            <a href="javascript:;" data-toggle="lightbox">
                                <img id="pic" src="{{$input->pic}}" alt="">
                            </a>
                        </div>
                        <ul class="thumbs unstyled clearfix">
                            @foreach($input->gpic as $v)
                                <li><a href="javascript:;">
                                        <img  onclick="gpic(this)" src="{{$v->gpic}}" >
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <script>

                                function gpic(obj) {
                                    var gpic = $(obj).attr('src');
                                    console.log(gpic);
                                    $('#pic').attr('src',gpic);

                                }


                    </script>

                </div>
                <!-- // PRODUCT PREVIEW -->
                <div class="space40 visible-xs"></div>
                <!-- PRODUCT DETAILS -->
                <div class="col-xs-12 col-sm-8">
                    <section class="product-details add-cart">
                        <header class="entry-header">
                            <h2 class="entry-title uppercase">{{$input->gname}}</h2>
                        </header>
                        <article class="entry-content">
                            <figure>
                                <span class="entry-price inline-middle">￥{{$input->price}}</span>
                                <span class="entry-review-count inline-middle">( 专家建议价 )</span>

                                <ul class="entry-meta unstyled">
                                    <li>
                                        <span class="key">分类:</span>
                                        <span class="value">{{$input->cate->cate_name}}</span>
                                    </li>
                                    <li>
                                        <span class="key">点击量:</span>
                                        <span class="value">{{$input-> focus}}</span>
                                    </li>

                                    <li>
                                        <span class="key">评价分数:</span>
                                        <span class="value">{{$input->score}}</span>
                                    </li>
                                    <li>
                                        <span class="key">销量:</span>
                                        <span class="value">@if(empty($input-> count))
                                                0 @else {{$input->count}} @endif </span>
                                    </li>
                                    <li>
                                        <span class="key">有无验证:</span>
                                        <span class="value">@if(empty($input->gpicinfo)||empty($input->gpicinfo->zid )) 无验证 @else
                                                已验证@endif</span>
                                    </li>
                                    <li>
                                        <span class="key">综合分数:</span>
                                        <span class="value">@if(empty($input->gpicinfo)||empty($input->gpicinfo->score))
                                                0   @else {{$input->gpicinfo->score}} @endif </span>
                                    </li>
                                    <li>
                                        <span class="key">商品收藏量:</span>
                                        <span id="scl" class="value">@if(empty($input->gpicinfo)||empty($input->gpicinfo->scl)) 0 @else {{$input->gpicinfo->scl}} @endif</span>
                                    </li>
                                </ul>
                                <figcaption class="m-b-sm">
                                    <h5 class="subheader uppercase">商品简介:</h5>
                                    <p>{{$input->goodsDes}}</p>
                                </figcaption>

                                <div class="row">
                                    <div class="space30 visible-xs"></div>
                                    <div class="col-xs-12 col-sm-6">
                                        <li>
                                            <span class="key">小二来自 :</span>
                                            <span style="color:red;" class="value">  @if($input->fid == 0)
                                                    店小二商品 @else{{$input->fishpond->fishpondname}} 鱼塘 @endif</span>
                                        </li>


                                    </div>
                                </div>
                                <li>
                                    <span class="key">购买数量:</span>
                                    <span class="value"><style>
                                        #p-m-8-1 {
                                            width: 56px;
                                            height: 36px;
                                            border: 1px solid #999;
                                            margin-left: 20px;
                                            margin-top: 20px;
                                            display: inline-block;
                                        }

                                        #p-cnt {
                                            width: 35px;
                                            height: 31px;
                                            text-align: center;
                                            float: left;
                                        }

                                        #pn-add {
                                            width: 17px;
                                            height: 14px;
                                            border: 0px;
                                            margin: 0px;
                                            float: right;
                                        }

                                        #pn-dec {
                                            width: 17px;
                                            height: 18px;
                                            border: 0px;
                                            float: right;
                                        }
                                    </style>
                                    <span><div id="p-m-8-1">
    				<input id="p-cnt" type="text" name="cnt" value="1">
                                            <button type="button" id="pn-add">+</button>
                                            <button type="button" id="pn-dec">-</button>
                    <script>
                        var jia = document.getElementById('pn-add');
                        var jian = document.getElementById('pn-dec');
                        var num = document.getElementById('p-cnt');

                        var scl = $('#scl').html();

                        jia.onclick = function () {
                            //alert(num.value);
                            if (num.value >= scl) {
                                return;
                            }
                            num.value++;

                        };
                        jian.onclick = function () {

                            num.value--;
                            if (num.value <= 1) {
                                num.value = 1;
                            }
                        }

                    </script>
    				<div style="clear:both;"></div>
    			</div></span>

                                    <div class="clearfix"></div>
</span>
                                </li>
                                <ul class="inline-li li-m-r-l m-t-lg">
                                    <li>
                                        <a href="#" class="btn btn-default btn-lg btn-round add-to-cart">
                                            加入购物车>></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-default btn-lg btn-round add-to-cart">
                                            立即购买>></a>
                                    </li>
                                </ul>

                            </figure>
                        </article>
                    </section>
                </div>
                <div class="m-t-lg">
                    <ul class="nav nav-tabs">
                        <li class="active des"><a data-toggle="tab">商品详情</a></li>
                        <li class="des"><a data-toggle="tab">评价</a></li>
                    </ul>
                    <script>
                        $('.des').on('click', function () {
                            $('.des').toggleClass('active');
                            $('.det').toggleClass('active');

                        })
                    </script>

                    <div class="tab-content">
                        <div class="det tab-pane fade in active " id="product-description">
                            @if(empty($input->gpicinfo)||empty($input->gpic->content))主人很懒@else{!! $input->gpicinfo->content !!}@endif
                        </div>
                        <div class="det tab-pane fade in  " id="product-reviews">
                            DFLKJASDHFKJASHDLKF
                        </div>
                    </div>
                </div>
            </div>




@stop