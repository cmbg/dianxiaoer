@extends('Home.Layout.layout')
@section('body')
    <body class="page page-id-6 home-style1">
@stop
@section('content')

    <div class="listings-title">
        <div class="container">
            <div class="wrap-title">
                <h1>Home</h1>

                <div class="bread">
                    <div class="breadcrumbs theme-clearfix">
                        <div class="container">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">主页</a>
                                    <span class="go-page"></span>
                                </li>

                                <li class="active">
                                    <span>主页</span>
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
                        <div class="entry-summary">
                            <div data-vc-full-width="true" data-vc-full-width-init="false"
                                 data-vc-stretch-content="true"
                                 class="vc_row wpb_row vc_row-fluid bg-wrap vc_custom_1487642348040 vc_row-no-padding">
                                <div class="container float wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1481518924466">
                                                <div class="wrap-vertical wpb_column vc_column_container vc_col-sm-2">
                                                    <div class="vc_column-inner vc_custom_1481518234612">
                                                        <div class="wpb_wrapper">
                                                            <div class="vc_wp_custommenu wpb_content_element wrap-title">
                                                                <div class="mega-left-title">
                                                                    <strong>Categories</strong>
                                                                </div>

                                                                <div class="wrapper_vertical_menu vertical_megamenu">
                                                                    <div class="resmenu-container">
                                                                        <button class="navbar-toggle" type="button"
                                                                                data-toggle="collapse"
                                                                                data-target="#ResMenuvertical_menu">
                                                                            <span class="sr-only">主题市场</span>
                                                                            <span class="icon-bar"></span>
                                                                            <span class="icon-bar"></span>
                                                                            <span class="icon-bar"></span>
                                                                        </button>


                                                                        <ul id="menu-vertical-menu-1" class="nav vertical-megamenu etrostore-mega etrostore-menures">
                                                                            @foreach($arr as  $k=>$v)

                                                                            <li class="fix-menu dropdown menu-smartphones-tablet etrostore-mega-menu level1">
                                                                                <a href="" class="item-link dropdown-toggle">
																					<span class="have-title">
																						<span class="menu-color" data-color="#efc73a"></span>

																						<span class="menu-title">{{$v->cate_name}}</span>
																					</span>
                                                                                </a>
                                                                                <ul class="dropdown-menu nav-level1 column-3">
                                                                                    <li class="dropdown-submenu column-3 menu-electronics">
                                                                                        {{--<a href="#">--}}
																							{{--<span class="have-title">--}}
																								{{--<span class="menu-title">Electronics</span>--}}
																							{{--</span>--}}
                                                                                        {{--</a>--}}
                                                                                        @foreach($brr[$v->cate_id] as  $m=>$n)

                                                                                        <ul class="dropdown-sub nav-level2">
                                                                                            <li class="menu-laptop-desktop-accessories">
                                                                                                <a href="">
																									<span class="have-title">
																										<span class="menu-title">{{$n['cate_name']}}</span>
																									</span>
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                        @endforeach
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--广告图片区域-->
                                                <div class="wrap-slider wpb_column vc_column_container vc_col-sm-8">
                                                    <div class="vc_column-inner vc_custom_1483000674370">
                                                        <div class="wpb_wrapper">
                                                            <!-- OWL SLIDER 轮播图-->
                                                            <div class="wpb_revslider_element wpb_content_element no-margin">
                                                                <div class="vc_column-inner ">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="wpb_revslider_element wpb_content_element">
                                                                            <div id="main-slider"
                                                                                 class="fullwidthbanner-container"
                                                                                 style="position:relative; width:100%; height:352.8px; margin-top:0px; margin-bottom:0px">
                                                                                <div class="module slideshow no-margin">
                                                                                    @foreach($data1 as $k=>$v)
                                                                                    <div class="item">
                                                                                        <a href="simple_product.html"><img
                                                                                                    src="{{$v->apic}}"
                                                                                                    alt="图片{{$k+1}}正在加载中..."
                                                                                                    class="img-responsive"
                                                                                                    style="height:352.8px;width:780px;"></a>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="loadeding"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- 下面两图片 -->
                                                            <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                                                <div class="wpb_wrapper">
                                                                    <div class="banner">
                                                                        @foreach($data2 as $k=>$v)
                                                                        <a href="{{$v->aurl}}" class="banner{{$k+1}}">
                                                                            <img src="{{$v->apic}}"
                                                                                style="height:175px;width:388px;" alt="正在加载中..." title="{{$v->atitle}}"/>
                                                                        </a>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--右面两张图片-->
                                                <div class="wrap-banner wpb_column vc_column_container vc_col-sm-2">
                                                    <div class="vc_column-inner vc_custom_1483000922579">
                                                        <div class="wpb_wrapper">
                                                            <div class="wpb_single_image wpb_content_element vc_align_center vc_custom_1481518385054">
                                                                <figure class="wpb_wrapper vc_figure">
                                                                    @foreach($data3 as $k=>$v)
                                                                    <a href="#" target="_self"
                                                                       class="vc_single_image-wrapper vc_box_border_grey">
                                                                        <img class="vc_single_image-img"
                                                                             src="{{$v->apic}}"
                                                                             style="width:193px;height:352px" alt="banner1"
                                                                             title="banner1"/>
                                                                    </a>
                                                                    @endforeach
                                                                </figure>
                                                            </div>

                                                            <div class="wpb_single_image wpb_content_element vc_align_center">
                                                                 <figure class="wpb_wrapper vc_figure">
                                                                    @foreach($data4 as $k=>$v)
                                                                    <a href="#" target="_self"
                                                                       class="vc_single_image-wrapper vc_box_border_grey">
                                                                        <img class="vc_single_image-img"
                                                                             src="{{$v->apic}}"
                                                                             style="width:193px;height:175px"
                                                                             alt="banner2"
                                                                             title="banner2"/>
                                                                    </a>
                                                                    @endforeach
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                                <div class="wpb_wrapper">
                                                    <div class="wrap-transport">
                                                        <div class="row">
                                                            <div class="item item-1 col-lg-3 col-md-3 col-sm-6">
                                                                <a href="#" class="wrap">
                                                                    <div class="icon">
                                                                        <i class="fa fa-paper-plane"></i>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h3>Money Back Guarantee</h3>
                                                                        <p>30 Days Money Back</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="item item-2 col-lg-3 col-md-3 col-sm-6">
                                                                <a href="#" class="wrap">
                                                                    <div class="icon">
                                                                        <i class="fa fa-map-marker"></i>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h3>Free Worldwide Shipping</h3>
                                                                        <p>On Order Over $100</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="item item-3 col-lg-3 col-md-3 col-sm-6">
                                                                <a href="#" class="wrap">
                                                                    <div class="icon">
                                                                        <i class="fa fa-tag"></i>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h3>Member Discount</h3>
                                                                        <p>Upto 70 % Discount</p>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <div class="item item-4 col-lg-3 col-md-3 col-sm-6">
                                                                <a href="#" class="wrap">
                                                                    <div class="icon">
                                                                        <i class="fa fa-life-ring"></i>
                                                                    </div>

                                                                    <div class="content">
                                                                        <h3>24/7 Online Support</h3>
                                                                        <p>Technical Support 24/7</p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="vc_row-full-width vc_clearfix"></div>

                            {{--今日特价--}}
                            <div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div id="_sw_countdown_01"
                                                 class="sw-woo-container-slider responsive-slider countdown-slider"
                                                 data-lg="5" data-md="4" data-sm="2" data-xs="1" data-mobile="1"
                                                 data-speed="1000" data-scroll="1" data-interval="5000"
                                                 data-autoplay="false" data-circle="false">
                                                <div class="resp-slider-container">
                                                    <div class="box-title clearfix">
                                                        <h3>今日特价</h3>
                                                        <a href="deals.html">查看全部</a>
                                                    </div>

                                                    <div class="banner-content clearfix">
                                                        <img width="195" height="354" src="images/1903/image-cd.jpg"
                                                             class="attachment-larges size-larges" alt=""
                                                             srcset="images/1903/image-cd.jpg 195w, images/1903/image-cd-165x300.jpg 165w"
                                                             sizes="(max-width: 195px) 100vw, 195px"/>
                                                    </div>

                                                    <div class="slider responsive">
                                                        @foreach($goods as $k=>$v)
                                                        <div class="item-countdown product "
                                                             id="product_sw_countdown_02">
                                                            <div class="item-wrap">
                                                                <div class="item-detail">
                                                                    <div class="item-image-countdown">
                                                                        <span class="onsale">Sale!</span>
                                                                            <a href="#" target="_self"
                                                                               class="vc_single_image-wrapper vc_box_border_grey">
                                                                                <img class="vc_single_image-img"
                                                                                     src="{{$v->pic}}"
                                                                                     style="width:300px;height:320px" alt="banner1"
                                                                                     title="banner1"/>
                                                                            </a>
                                                                        <!-- add to cart, wishlist, compare -->
                                                                        <div class="item-bottom clearfix">
                                                                            <a rel="nofollow" href="#"
                                                                               class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                               title="Add to Cart">Add to cart</a>

                                                                            <a href="javascript:void(0)"
                                                                               class="compare button" rel="nofollow"
                                                                               title="Add to Compare">Compare</a>

                                                                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
                                                                                <div class="yith-wcwl-add-button show"
                                                                                     style="display:block">
                                                                                    <a href="#" rel="nofollow"
                                                                                       class="add_to_wishlist">Add to
                                                                                        Wishlist</a>
                                                                                    <img src="images/wpspin_light.gif"
                                                                                         class="ajax-loading"
                                                                                         alt="loading" width="16"
                                                                                         height="16"
                                                                                         style="visibility:hidden"/>
                                                                                </div>

                                                                                <div class="yith-wcwl-wishlistaddedbrowse hide"
                                                                                     style="display:none;">
                                                                                    <span class="feedback">Product added!</span>
                                                                                    <a href="#" rel="nofollow">Browse
                                                                                        Wishlist</a>
                                                                                </div>

                                                                                <div class="yith-wcwl-wishlistexistsbrowse hide"
                                                                                     style="display:none">
                                                                                    <span class="feedback">The product is already in the wishlist!</span>
                                                                                    <a href="#" rel="nofollow">Browse
                                                                                        Wishlist</a>
                                                                                </div>

                                                                                <div style="clear:both"></div>
                                                                                <div class="yith-wcwl-wishlistaddresponse"></div>
                                                                            </div>

                                                                            <div class="clear"></div>
                                                                            <a href="#" data-fancybox-type="ajax"
                                                                               class="sm_quickview_handler-list fancybox fancybox.ajax">Quick
                                                                                View </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--两张广告大图图片--}}
                            <div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <a href="#" target="_self"
                                                       class="vc_single_image-wrapper vc_box_border_grey">
                                                        <img class="vc_single_image-img" src="images/1903/banner6-1.jpg"
                                                             width="570" height="220" alt="banner6" title="banner6"/>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center banner-none">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <a href="#" target="_self"
                                                       class="vc_single_image-wrapper vc_box_border_grey">
                                                        <img class="vc_single_image-img" src="images/1903/banner7-1.jpg"
                                                             width="570" height="220" alt="banner7" title="banner7"/>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--六张图,和右侧广告--}}
                            <div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div id="slider_sw_woo_slider_widget_1"
                                                 class="responsive-slider woo-slider-default sw-child-cat clearfix"
                                                 data-lg="3" data-md="3" data-sm="2" data-xs="2" data-mobile="1"
                                                 data-speed="1000" data-scroll="1" data-interval="5000"
                                                 data-autoplay="false">
                                                <div class="child-top clearfix" data-color="#ff9901">
                                                    <div class="box-title pull-left">
                                                        <h3>Electronics</h3>

                                                        <button class="navbar-toggle" type="button"
                                                                data-toggle="collapse"
                                                                data-target="#child_sw_woo_slider_widget_1"
                                                                aria-expanded="false">
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                        </button>
                                                    </div>

                                                    <div class="box-title-right clearfix">
                                                        <div class="childcat-content pull-left"
                                                             id="child_sw_woo_slider_widget_1">
                                                            <ul>
                                                                <li><a href="#">Television</a></li>
                                                                <li><a href="#">Air Conditional</a></li>
                                                                <li><a href="#">Laptops & Accessories</a></li>
                                                                <li><a href="#">Accessories for Tablet</a></li>
                                                                <li><a href="#">Headphone</a></li>
                                                            </ul>
                                                        </div>

                                                        <div class="view-all">
                                                            <a href="#">See All<i class="fa  fa-caret-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="content-slider">
                                                    <div class="childcat-slider-content clearfix">
                                                        <!-- Brand -->
                                                        <div class="child-cat-brand pull-left">
                                                            <div class="item-brand">
                                                                <a href="#">
                                                                    <img width="170" height="87"
                                                                         src="images/1903/Brand_1.jpg"
                                                                         class="attachment-170x90 size-170x90" alt=""/>
                                                                </a>
                                                            </div>

                                                            <div class="item-brand">
                                                                <a href="#">
                                                                    <img width="170" height="90"
                                                                         src="images/1903/br5.jpg"
                                                                         class="attachment-170x90 size-170x90" alt=""/>
                                                                </a>
                                                            </div>

                                                            <div class="item-brand">
                                                                <a href="#">
                                                                    <img width="170" height="90"
                                                                         src="images/1903/br2.jpg"
                                                                         class="attachment-170x90 size-170x90" alt=""/>
                                                                </a>
                                                            </div>

                                                            <div class="item-brand">
                                                                <a href="#">
                                                                    <img width="170" height="90"
                                                                         src="images/1903/br3.jpg"
                                                                         class="attachment-170x90 size-170x90" alt=""/>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <!-- slider content -->

                                                        <div class="resp-slider-container">

                                                            <div class="slider responsive">
                                                                @for($i=1;$i<=3;$i++)
                                                                <div class="item product">
                                                                    <div class="item-wrap">
                                                                        @foreach($goods2 as $k=>$v)
                                                                        <div class="item-detail">
                                                                            <div class="item-content">
                                                                                <!-- rating  -->
                                                                                <div class="reviews-content">
                                                                                    <div class="star"></div>
                                                                                    <div class="item-number-rating">0
                                                                                        Review(s)
                                                                                    </div>
                                                                                </div>
                                                                                <!-- end rating  -->

                                                                                <h4>
                                                                                    <a href="simple_product.html"
                                                                                       title="voluptate ipsum">Voluptate
                                                                                        ipsum</a>
                                                                                </h4>

                                                                                <!-- Price -->
                                                                                <div class="item-price">
																						<span>
																							<span class="woocommerce-Price-amount amount">
																								<span class="woocommerce-Price-currencySymbol">$</span>550.00
																							</span>
																						</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="item-img products-thumb">
                                                                                {{--@foreach($goods1 as $k=>$v)--}}
                                                                                    <a href="#" target="_self"
                                                                                       class="vc_single_image-wrapper vc_box_border_grey">
                                                                                        <img class="vc_single_image-img"
                                                                                             src="{{$v->pic}}"
                                                                                             style="width:182px;height:182px" alt="banner1"
                                                                                             title="banner1"/>
                                                                                    </a>
                                                                            {{--@endforeach--}}

                                                                                <!-- add to cart, wishlist, compare -->
                                                                                <div class="item-bottom clearfix">
                                                                                    <a rel="nofollow" href="#"
                                                                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                                                       title="Add to Cart">Add to
                                                                                        cart</a>

                                                                                    <a href="javascript:void(0)"
                                                                                       class="compare button"
                                                                                       rel="nofollow"
                                                                                       title="Add to Compare">Compare</a>

                                                                                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
                                                                                        <div class="yith-wcwl-add-button show"
                                                                                             style="display:block">
                                                                                            <a href="#" rel="nofollow"
                                                                                               class="add_to_wishlist">Add
                                                                                                to Wishlist</a>
                                                                                            <img src="images/wpspin_light.gif"
                                                                                                 class="ajax-loading"
                                                                                                 alt="loading"
                                                                                                 width="16" height="16"
                                                                                                 style="visibility:hidden"/>
                                                                                        </div>

                                                                                        <div class="yith-wcwl-wishlistaddedbrowse hide"
                                                                                             style="display:none;">
                                                                                            <span class="feedback">Product added!</span>
                                                                                            <a href="#" rel="nofollow">Browse
                                                                                                Wishlist</a>
                                                                                        </div>

                                                                                        <div class="yith-wcwl-wishlistexistsbrowse hide"
                                                                                             style="display:none">
                                                                                            <span class="feedback">The product is already in the wishlist!</span>
                                                                                            <a href="#" rel="nofollow">Browse
                                                                                                Wishlist</a>
                                                                                        </div>

                                                                                        <div style="clear:both"></div>
                                                                                        <div class="yith-wcwl-wishlistaddresponse"></div>
                                                                                    </div>

                                                                                    <div class="clear"></div>
                                                                                    <a href="#"
                                                                                       data-fancybox-type="ajax"
                                                                                       class="sm_quickview_handler-list fancybox fancybox.ajax">Quick
                                                                                        View </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                               @endfor

                                                                

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="best-seller-product">
                                                        <div class="box-slider-title">
                                                            <h2 class="page-title-slider">Best sellers</h2>
                                                        </div>

                                                        <div class="wrap-content">
                                                            @foreach($goods as $k=>$v)
                                                            <div class="item">
                                                                <div class="item-inner">
                                                                    <div class="item-img">
                                                                            <a href="#" target="_self"
                                                                               class="vc_single_image-wrapper vc_box_border_grey">
                                                                                <img class="vc_single_image-img"
                                                                                     src="{{$v->pic}}"
                                                                                     style="width:70px;height:70px" alt="banner1"
                                                                                     title="banner1"/>
                                                                            </a>
                                                                    </div>

                                                                    <div class="item-sl pull-left"></div>

                                                                    <div class="item-content">
                                                                        <!-- rating  -->
                                                                        <div class="reviews-content">
                                                                            <div class="star">{{$k+1}}</div>
                                                                            <div class="item-number-rating">
                                                                                Review(s)
                                                                            </div>
                                                                        </div>
                                                                        <!-- end rating  -->

                                                                        <h4>
                                                                            <a href="simple_product.html"
                                                                               title="Sony BRAVIA 4K">Sony BRAVIA 4K</a>
                                                                        </h4>

                                                                        <div class="item-price">
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>600.00
																				</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
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

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
<script type="text/javascript" src="{{asset('Home/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/jquery/js.cookie.min.js')}}"></script>

<!-- OPEN LIBS JS -->
<script type="text/javascript" src="{{asset('Home/js/owl-carousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/slick-1.6.0/slick.min.js')}}"></script>

<script type="text/javascript" src="{{asset('Home/js/yith-woocommerce-compare/jquery.colorbox-min.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/sw_core/isotope.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/sw_core/jquery.fancybox.pack.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/sw_woocommerce/category-ajax.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/sw_woocommerce/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Home/js/js_composer/js_composer_front.min.js')}}"></script>

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
@stop
