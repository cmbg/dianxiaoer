<!DOCTYPE html>
<html lang="en">
<head>
    <title>店小二</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- GOOGLE WEB FONTS -->
    <link rel="stylesheet" href="{{asset('Home/css/font-awesome.min.css')}}">
    <!-- BOOTSTRAP 3.3.7 CSS -->
    <link rel="stylesheet" href="{{asset('Home/css/bootstrap.min.css')}}"/>
    <!-- SLICK v1.6.0 CSS -->
    <link rel="stylesheet" href="{{asset('Home/css/slick-1.6.0/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/jquery.fancybox.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-compare/colorbox.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/owl-carousel/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/owl-carousel/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/js_composer/js_composer.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/woocommerce/woocommerce.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-wishlist/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/custom.css')}}"/>
    <link rel="stylesheet" href="{{asset('Home/css/app-orange.css')}}" id="theme_color"/>
    <link rel="stylesheet" href="" id="rtl"/>
    <link rel="stylesheet" href="{{asset('Home/css/app-responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('layer/skin/layer.css') }}">
      <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
</head>
@yield('body')

<div class="body-wrapper theme-clearfix">
    <header id="header" class="header header-style1">
        <div class="header-top clearfix">
            <div class="container">
                <div class="rows">
                    <!-- SIDEBAR TOP MENU -->
                    <div class="pull-left top1">
                        <div class="widget text-2 widget_text pull-left">
                            <div class="widget-inner">
                                <div class="textwidget">
                                    <div class="call-us"><span>欢迎致电: </span>0123-444-666654123</div>
                                </div>
                            </div>
                        </div>

                        <div class="widget text-3 widget_text pull-left">
                            <div class="widget-inner">
                                <div class="textwidget">
                                    <div id="lang_sel">
                                        <ul class="nav">
                                            <li>
                                                <a class="lang_sel_sel icl-en">
                                                    <img class="iclflag" title="English" alt="en"
                                                         src="{{url('/Home/images/icons/en.png')}}" width="18" height="12"/> English
                                                </a>
                                                <ul>
                                                    <li class="icl-en">
                                                        <a href="#">
                                                            <img class="iclflag" title="English" alt="en"
                                                                 src="{{url('/Home/images/icons/en.png')}}" width="18" height="12"/>
                                                            English
                                                        </a>
                                                    </li>

                                                    <li class="icl-ar">
                                                        <a href="#">
                                                            <img class="iclflag" title="Arabic" alt="ar"
                                                                 src="{{url('/Home/images/icons/ar.png')}}" width="18" height="12"/>
                                                            Arabic
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget woocommerce_currency_converter-2 widget_currency_converter pull-left">
                            <div class="widget-inner">
                                <form method="post" class="currency_converter" action="">
                                    <ul class="currency_w">
                                        <li>
                                            <a href="#" class="">USD</a>
                                            <ul class="currency_switcher">
                                                <li><a href="#" class="reset default active"
                                                       data-currencycode="USD">USD</a></li>
                                                <li><a href="#" class="" data-currencycode="EUR">EUR</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="wrap-myacc pull-right">
                        <div class="sidebar-account pull-left">
                            <div class="account-title">我的账户</div>

                            <div id="my-account" class="my-account">
                                <div class="widget-1 widget-first widget nav_menu-4 widget_nav_menu">
                                    <div class="widget-inner">
                                        <ul id="menu-my-account" class="menu">
                                            <li class="menu-my-account">
                                                <a class="item-link" href="{{url('/home/my_account')}}">
                                                    <span class="menu-title">我的账户</span>
                                                </a>
                                            </li>

                                            <li class="menu-cart">
                                                <a class="item-link" href="{{url('home/goods/list')}}">
                                                    <span class="menu-title">购物车</span>
                                                </a>
                                            </li>

                                            <li class="menu-checkout">
                                                <a class="item-link" href="{{ url('/order') }}">
                                                    <span class="menu-title">我的订单</span>
                                                </a>
                                            </li>
                                            <li>
                                            @if (!empty(session()->get('user')))
                                                <a class="item-link" href="{{url('/home/logout')}}" >
                                                     <span class="menu-title">
                                                     
                                                   退出    </span>
                                                </a>
                                         @else
                                                    <a class="item-link" href="{{url('/home/login')}}" >
                                                     <span class="menu-title">
                                                     登录
                                                    

                                                     </span>
                                                </a>
                                                 @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                               
                            </div>
                        </div>

                        <div class="pull-left top2">
                            <div class="widget-1 widget-first widget nav_menu-2 widget_nav_menu">
                                <div class="widget-inner">
                                    <ul id="menu-checkout" class="menu">
                                        <li class="menu-checkout">
                                            <a class="item-link" href="{{url('/order')}}">
                                                <span class="menu-title">我的订单</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-mid clearfix">
            <div class="container">
                <div class="rows">
                    <!-- LOGO -->
                    <div class="etrostore-logo pull-left">
                        <a href="#">
                            <img src="{{url('/Home/images/icons/logo-orange.png')}}" alt="Shoopy">
                        </a>
                    </div>

                    <div class="mid-header pull-right">
                        <div class="widget-1 widget-first widget sw_top-2 sw_top">
                            <div class="widget-inner">
                                <div class="top-form top-search">
                                    <div class="topsearch-entry">
                                        <form action="{{url('home/goods/list')}}" method="get" action="">
                                            <div>
                                                <input type="text" value="" name="gname"
                                                       placeholder="商品名...">
                                                <div class="cat-wrapper">
                                                    <label class="label-search">
                                                        <select name="cate" class="s1_option">
                                                            <option value="">|---请选择---|</option>
                                                            @foreach($data as $v)
                                                                @if($v->cate_pid != 0)
                                                            <option value="{{$v->cate_id}}">{{$v->cate_keywords}}</option>
                                                                @endif
                                                                @endforeach

                                                        </select>
                                                    </label>
                                                </div>

                                                <button type="submit" title="Search"
                                                        class="fa fa-search button-search-pro form-button"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{--购物车--}}
                        <div class="widget sw_top-3 sw_top pull-left">
                            <div class="widget-inner">
                                <div class="top-form top-form-minicart etrostore-minicart pull-right">
                                    <div class="top-minicart-icon pull-right">
                                        <i class="fa fa-shopping-cart"></i>
                                        <a class="cart-contents" href="cart.html" title="View your shopping cart">
                                            <span class="minicart-number">{{$count}}</span>
                                        </a>
                                    </div>

                                    <div class="wrapp-minicart">
                                        <div class="minicart-padding">
                                            <div class="number-item">
                                                 {{--<span></span>--}}
                                                你购物车里的物品
                                            </div>
                                            @foreach( $carts as $cart)
                                            <ul class="minicart-content">
                                                <li>
                                                    {{--<a href="simple_product.html" class="product-image">--}}
                                                        {{--<img width="100" height="100" src="{{ asset('images/1903/45-150x150.jpg')}}"--}}
                                                             {{--class="attachment-100x100 size-100x100 wp-post-image"--}}
                                                             {{--alt=""--}}
                                                             {{--srcset="images/1903/45-150x150.jpg 150w, images/1903/45-300x300.jpg 300w, images/1903/45-180x180.jpg 180w, images/1903/45.jpg 600w"--}}
                                                             {{--sizes="(max-width: 100px) 100vw, 100px"/>--}}
                                                    {{--</a>--}}

                                                    <div class="detail-item">
                                                        <div class="product-details">
                                                            <h4>
                                                                {{--<a class="title-item" href="simple_product.html">Veniam--}}
                                                                    {{--Dolore</a>--}}
                                                                <a href="{{url('home/cart')}}">{{$cart->name}}</a>
                                                            </h4>

                                                            <div class="product-price">
																	<span class="price">
																		<span class="woocommerce-Price-amount amount">
																			<span class="woocommerce-Price-currencySymbol">$</span>{{$cart->price}}
																		</span>
																	</span>

                                                                <div class="qty">
                                                                    <span class="qty-number">{{$cart->qty}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="product-action clearfix">
                                                                <a href="{{url('home/removecart/'.$cart->rowId)}}" class="btn-remove" title="删除商品">
                                                                    <span class="fa fa-trash-o"></span>
                                                                </a>

                                                                <a class="btn-edit" href="{{url('home/order')}}"
                                                                   title="前往结算">
                                                                    <span class="fa fa-pencil"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach
                                            <div class="cart-checkout">
                                                <div class="price-total">
                                                    <span class="label-price-total">商品总价</span>

                                                    <span class="price-total-w">
															<span class="price">
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">$</span>{{$total}}
																</span>
															</span>
														</span>
                                                </div>

                                                <div class="cart-links clearfix">
                                                    <div class="cart-link">
                                                        <a href="{{url('home/goods/list')}}" title="Cart">继续购物</a>
                                                    </div>

                                                    <div class="checkout-link">
                                                        <a href="{{url('home/cart/del')}}" title="Check Out">清空购物车</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget nav_menu-3 widget_nav_menu pull-left">
                            <div class="widget-inner">
                                <ul id="menu-wishlist" class="menu">
                                    <li class="menu-wishlist">
                                        <a class="item-link" href="#">
                                            <span class="menu-title">Wishlist</span>
                                        </a>
                                    </li>

                                    <li class="yith-woocompare-open menu-compare">
                                        <a class="item-link compare" href="#">
                                            <span class="menu-title">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom clearfix">
            <div class="container">
                <div class="rows">
                    <!-- Primary navbar -->
                    <div id="main-menu" class="main-menu">
                        <nav id="primary-menu" class="primary-menu">
                            <div class="navbar-inner navbar-inverse">
                                <div class="resmenu-container">
                                    <button class="navbar-toggle" type="button" data-toggle="collapse"
                                            data-target="#ResMenuprimary_menu">
                                        <span class="sr-only">Categories</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                    <div id="ResMenuprimary_menu" class="collapse menu-responsive-wrapper">
                                        <ul id="menu-primary-menu" class="etrostore_resmenu">
                                            @foreach($nav as $k=>$v)
                                                <li><a href="{{asset($v->nlink)}}">{{$v->nname}}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>

                                <ul id="menu-primary-menu-1"
                                    class="nav nav-pills nav-mega etrostore-mega etrostore-menures">
                                    @foreach($nav as $k=>$v)
                                        <li><a href="{{asset($v->nlink)}}">{{$v->nname}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- /Primary navbar -->

                    {{--<div class="top-form top-form-minicart etrostore-minicart pull-right">--}}
                        {{--<div class="top-minicart-icon pull-right">--}}
                            {{--<i class="fa fa-shopping-cart"></i>--}}
                            {{--<a class="cart-contents" href="cart.html" title="View your shopping cart">--}}
                                {{--<span class="minicart-number">2</span>--}}
                            {{--</a>--}}
                        {{--</div>--}}

                        {{--<div class="wrapp-minicart">--}}
                            {{--<div class="minicart-padding">--}}
                                {{--<div class="number-item">--}}
                                    {{--There are <span>items</span> in your cart--}}
                                {{--</div>--}}

                                {{--<ul class="minicart-content">--}}
                                    {{--<li>--}}
                                        {{--<a href="simple_product.html" class="product-image">--}}
                                            {{--<img width="100" height="100" src="images/1903/45-150x150.jpg"--}}
                                                 {{--class="attachment-100x100 size-100x100 wp-post-image" alt=""--}}
                                                 {{--srcset="images/1903/45-150x150.jpg 150w, images/1903/45-300x300.jpg 300w, images/1903/45-180x180.jpg 180w, images/1903/45.jpg 600w"--}}
                                                 {{--sizes="(max-width: 100px) 100vw, 100px"/>--}}
                                        {{--</a>--}}

                                        {{--<div class="detail-item">--}}
                                            {{--<div class="product-details">--}}
                                                {{--<h4>--}}
                                                    {{--<a class="title-item" href="simple_product.html">Veniam Dolore</a>--}}
                                                {{--</h4>--}}

                                                {{--<div class="product-price">--}}
														{{--<span class="price">--}}
															{{--<span class="woocommerce-Price-amount amount">--}}
																{{--<span class="woocommerce-Price-currencySymbol">$</span>190.00--}}
															{{--</span>--}}
														{{--</span>--}}

                                                    {{--<div class="qty">--}}
                                                        {{--<span class="qty-number">1</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="product-action clearfix">--}}
                                                    {{--<a href="#" class="btn-remove" title="Remove this item">--}}
                                                        {{--<span class="fa fa-trash-o"></span>--}}
                                                    {{--</a>--}}

                                                    {{--<a class="btn-edit" href="cart.html"--}}
                                                       {{--title="View your shopping cart">--}}
                                                        {{--<span class="fa fa-pencil"></span>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<a href="simple_product.html" class="product-image">--}}
                                            {{--<img width="100" height="100" src="images/1903/22-150x150.jpg"--}}
                                                 {{--class="attachment-100x100 size-100x100 wp-post-image" alt=""--}}
                                                 {{--srcset="images/1903/22-150x150.jpg 150w, images/1903/22-300x300.jpg 300w, images/1903/22-180x180.jpg 180w, images/1903/22.jpg 600w"--}}
                                                 {{--sizes="(max-width: 100px) 100vw, 100px"/>--}}
                                        {{--</a>--}}

                                        {{--<div class="detail-item">--}}
                                            {{--<div class="product-details">--}}
                                                {{--<h4>--}}
                                                    {{--<a class="title-item" href="simple_product.html">Cleaner with--}}
                                                        {{--bag</a>--}}
                                                {{--</h4>--}}

                                                {{--<div class="product-price">--}}
														{{--<span class="price">--}}
															{{--<span class="woocommerce-Price-amount amount">--}}
																{{--<span class="woocommerce-Price-currencySymbol">$</span>350.00--}}
															{{--</span>--}}
														{{--</span>--}}

                                                    {{--<div class="qty">--}}
                                                        {{--<span class="qty-number">1</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="product-action clearfix">--}}
                                                    {{--<a href="#" class="btn-remove" title="Remove this item">--}}
                                                        {{--<span class="fa fa-trash-o"></span>--}}
                                                    {{--</a>--}}

                                                    {{--<a class="btn-edit" href="cart.html"--}}
                                                       {{--title="View your shopping cart">--}}
                                                        {{--<span class="fa fa-pencil"></span>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}

                                {{--<div class="cart-checkout">--}}
                                    {{--<div class="price-total">--}}
                                        {{--<span class="label-price-total">Total</span>--}}

                                        {{--<span class="price-total-w">--}}
												{{--<span class="price">--}}
													{{--<span class="woocommerce-Price-amount amount">--}}
														{{--<span class="woocommerce-Price-currencySymbol">$</span>540.00--}}
													{{--</span>--}}
												{{--</span>--}}
											{{--</span>--}}
                                    {{--</div>--}}

                                    {{--<div class="cart-links clearfix">--}}
                                        {{--<div class="cart-link">--}}
                                            {{--<a href="cart.html" title="Cart">View Cart</a>--}}
                                        {{--</div>--}}

                                        {{--<div class="checkout-link">--}}
                                            {{--<a href="checkout.html" title="Check Out">Check Out</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="mid-header pull-right">
                        <div class="widget sw_top">
								<span class="stick-sr">
									<i class="fa fa-search" aria-hidden="true"></i>
								</span>

                            <div class="top-form top-search">
                                <div class="topsearch-entry">
                                    <form role="search" method="get" class="form-search searchform" action="">
                                        <label class="hide"></label>
                                        <input type="text" value="" name="s" class="search-query"
                                               placeholder="Keyword here..."/>
                                        <button type="submit" class="button-search-pro form-button">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer default theme-clearfix">
        <!-- Content footer -->
        <div class="container">
            <div class="vc_row wpb_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div id="sw_testimonial01" class="testimonial-slider client-wrapper-b carousel slide "
                                 data-interval="0">
                                <div class="carousel-cl nav-custom">
                                    <a class="prev-test fa fa-angle-left" href="#sw_testimonial01" role="button"
                                       data-slide="prev"><span></span></a>
                                    <a class="next-test fa fa-angle-right" href="#sw_testimonial01" role="button"
                                       data-slide="next"><span></span></a>
                                </div>

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="item-inner">
                                            <div class="image-client pull-left">
                                                <a href="#" title="">
                                                    <img width="127" height="127" src="{{ asset('images/1903/tm3.jpg')}}"
                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                         alt=""/>
                                                </a>
                                            </div>

                                            <div class="client-say-info">
                                                <div class="client-comment">
                                                    In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit....
                                                </div>

                                                <div class="name-client">
                                                    <h2><a href="#" title="">Jerry</a></h2>
                                                    <p>Web Developer</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-inner">
                                            <div class="image-client pull-left">
                                                <a href="#" title="">
                                                    <img width="127" height="127" src="{{ asset('images/1903/tm1.png')}}"
                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                         alt=""/>
                                                </a>
                                            </div>

                                            <div class="client-say-info">
                                                <div class="client-comment">
                                                    In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit....
                                                </div>

                                                <div class="name-client">
                                                    <h2>
                                                        <a href="#" title="">David Gand</a>
                                                    </h2>

                                                    <p>Designer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item ">
                                        <div class="item-inner">
                                            <div class="image-client pull-left">
                                                <a href="#" title="">
                                                    <img width="127" height="127" src="{{ asset('images/1903/tm2.png')}}"
                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                         alt=""/>
                                                </a>
                                            </div>

                                            <div class="client-say-info">
                                                <div class="client-comment">
                                                    In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit....
                                                </div>

                                                <div class="name-client">
                                                    <h2>
                                                        <a href="#" title="">Taylor Hill</a>
                                                    </h2>

                                                    <p>Developer</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-inner">
                                            <div class="image-client pull-left">
                                                <a href="#" title="">
                                                    <img width="127" height="127" src="{{ asset('images/1903/tm3.jpg')}}"
                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                         alt=""/>
                                                </a>
                                            </div>

                                            <div class="client-say-info">
                                                <div class="client-comment">
                                                    In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit....
                                                </div>

                                                <div class="name-client">
                                                    <h2>
                                                        <a href="#" title="">JOHN DOE</a>
                                                    </h2>

                                                    <p>Designer</p>
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

            <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"
                 class="vc_row wpb_row vc_row-fluid footer-style1 vc_row-no-padding">
                <div class="container float wpb_column vc_column_container vc_col-sm-12">
                    <img src="{{asset('/Home/images/guanfang.png')}}"
                         style="width:1500px;">

                    {{--关于我们--}}
                    <div class="vc_wp_custommenu wpb_content_element wrap-cus">
                        <div class="widget widget_nav_menu">
                            <ul id="menu-infomation" class="menu">

                                <li class="menu-about-us">
                                    <a class="item-link" href="#">
                                        <span class="menu-title">关于我们</span>
                                    </a>
                                </li>
                                <li class="menu-about-us">
                                    <a class="item-link" href="#">
                                        <span class="menu-title">关于我们</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="vc_wp_custommenu wpb_content_element wrap-cus">
                        <div class="widget widget_nav_menu">
                            <ul id="menu-infomation" class="menu">
                                @foreach($links as $k=>$v)
                                <li class="menu-about-us">
                                    <a class="item-link" href="{{$v->lurl}}">
                                       <img style="height:31px;width:50px" src="{{$v->limg}}" />
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_row-full-width vc_clearfix"></div>
        </div>
    </footer>
</div>

<!-- DIALOGS -->
<div class="modal fade" id="search_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog block-popup-search-form">
        <form role="search" method="get" class="form-search searchform" action="">
            <input type="text" value="" name="s" class="search-query" placeholder="Enter your keyword..."/>

            <button type="submit" class="fa fa-search button-search-pro form-button"></button>

            <a href="javascript:void(0)" title="Close" class="close close-search" data-dismiss="modal">X</a>
        </form>
    </div>
</div>

<div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog block-popup-login">
        <a href="javascript:void(0)" title="Close" class="close close-login" data-dismiss="modal">Close</a>

        <div class="tt_popup_login">
            <strong>Sign in Or Register</strong>
        </div>

        <form action="" method="post" class="login">
            <div class="block-content">
                <div class="col-reg registered-account">
                    <div class="email-input">
                        <input type="text" class="form-control input-text username" name="username" id="username"
                               placeholder="Username"/>
                    </div>

                    <div class="pass-input">
                        <input class="form-control input-text password" type="password" placeholder="Password"
                               name="password" id="password"/>
                    </div>

                    <div class="ft-link-p">
                        <a href="#" title="Forgot your password">Forgot your password?</a>
                    </div>

                    <div class="actions">
                        <div class="submit-login">
                            <input type="submit" class="button btn-submit-login" name="login" value="Login"/>
                        </div>
                    </div>
                </div>

                <div class="col-reg login-customer">
                    <h2>NEW HERE?</h2>

                    <p class="note-reg">Registration is free and easy!</p>

                    <ul class="list-log">
                        <li>Faster checkout</li>

                        <li>Save multiple shipping addresses</li>

                        <li>View and track orders and more</li>
                    </ul>

                    <a href="create_account.html" title="Register" class="btn-reg-popup">Create an account</a>
                </div>
            </div>
        </form>
        <div class="clear"></div>
    </div>
</div>

<a id="etrostore-totop" href="#"></a>

<div id="subscribe_popup" class="subscribe-popup" style="background: url(images/icons/bg_newsletter.jpg)">
    <div class="subscribe-popup-container">
        <h2>Join our newsletter</h2>
        <div class="description">Subscribe now to get 40% of on any product!</div>
        <div class="subscribe-form">
            <form id="mc4wp-form-2" class="mc4wp-form mc4wp-form-275" method="post" data-id="275" data-name="">
                <div class="mc4wp-form-fields">
                    <div class="newsletter-content">
                        <input type="email" class="newsletter-email" name="EMAIL" placeholder="Your email" required=""/>
                        <input class="newsletter-submit" type="submit" value="Subscribe"/>
                    </div>
                </div>
                <div class="mc4wp-response"></div>
            </form>
        </div>

        <div class="subscribe-checkbox">
            <label for="popup_check">
                <input id="popup_check" name="popup_check" type="checkbox"/>
                <span>Don't show this popup again!</span>
            </label>
        </div>

        <div class="subscribe-social">
            <div class="subscribe-social-inner">
                <a href="#" class="social-fb">
                    <span class="fa fa-facebook"></span>
                </a>

                <a href="#" class="social-tw">
                    <span class="fa fa-twitter"></span>
                </a>

                <a href="#" class="social-gplus">
                    <span class="fa fa-google-plus"></span>
                </a>

                <a href="#" class="social-pin">
                    <span class="fa fa-instagram"></span>
                </a>

                <a href="#" class="social-linkedin">
                    <span class="fa fa-pinterest-p"></span>
                </a>
            </div>
        </div>
    </div>
</div>
@yield('js')
