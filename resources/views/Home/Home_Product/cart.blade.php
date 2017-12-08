@extends('Home.Layout.layout')

@section('body')
    <body class="page woocommerce-cart woocommerce-page">
@stop

@section('content')

<div class="listings-title">
    <div class="container">
        <div class="wrap-title">
            <h1>Cart</h1>
            <div class="bread">
                <div class="breadcrumbs theme-clearfix">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                                <span class="go-page"></span>
                            </li>

                            <li class="active">
                                <span>Cart</span>
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
        <div id="contents" role="main" class="main-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="entry-summary">
                        <div class="woocommerce">
                            <form action="" method="post">
                                <table class="shop_table shop_table_responsive cart" cellspacing="0">
                                    <thead>
                                    <tr>
                                        {{--<th class="product-name">商品</th>--}}
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">商品</th>
                                        <th class="product-price">单价</th>
                                        <th class="product-quantity">数量</th>
                                        {{--<th class="product-subtotal">总价</th>--}}
                                        <th class="product-thumbnail">删除</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach( $carts as $cart)
                                        <tr class="cart_item">


                                            <td class="product-thumbnail">
                                                <a href="simple_product.html">
                                                    {{--<img width="180" height="180" src="/photoes/p{{$cart->id}}.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="images/1903/56-180x180.jpg 180w, images/1903/56-150x150.jpg 150w, images/1903/56-300x300.jpg 300w, images/1903/56.jpg 600w" >--}}
                                                </a>
                                            </td>

                                            <td class="product-name" data-title="Product">
                                                <a href="simple_product.html">{{$cart->name}}</a>
                                            </td>

                                            <td class="product-price" data-title="Price">
                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$cart->price}}</span>
                                            </td>

                                            <td class="product-quantity" data-title="Quantity">
                                                {{$cart->qty}}
                                                {{--<div class="quantity">--}}
                                                {{--<input type="number" step="1" min="0" max="" name="" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">--}}
                                                {{--</div>--}}
                                            </td>

                                            {{--<td class="product-subtotal" data-title="Total">--}}
                                            {{--<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">${{$total}}</span></span>--}}
                                            {{--</td>--}}
                                            <td class="product-remove">
                                                <a href="/shop/removecart/{{$cart->rowId}}" class="remove" title="Remove this item"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <a href="/shop"> <button type="button" class="btn btn-default">
                                                    <span class="fa fa-shopping-cart"></span> 继续购物
                                                </button>
                                            </a></td>
                                        <td>   <a href="/del"> <button type="button" class="btn  btn-danger">
                                                    <span class="fa fa-shopping-cart"></span> 清空购物车
                                                </button>
                                            </a> </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">
                                <div class="products-wrapper">
                                    <div class="cart_totals ">
                                        <h2>购物车总计</h2>

                                        <table cellspacing="0" class="shop_table shop_table_responsive">
                                            <tbody>
                                            <tr class="cart-subtotal">
                                                <th>商品总数</th>
                                                <td data-title="Subtotal">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{$count}}</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>商品总价</th>
                                                <td data-title="Total">
                                                    <strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{$total}}</span></strong>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        <div class="wc-proceed-to-checkout">
                                            <a href="/order" class="checkout-button button alt wc-forward">前往结算</a>
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

<script type="text/javascript" src="http://dianxiaoer.com/Home/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/jquery/js.cookie.min.js"></script>

<!-- OPEN LIBS JS -->
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/slick-1.6.0/slick.min.js"></script>

<script type="text/javascript" src="http://dianxiaoer.com/Home/js/yith-woocommerce-compare/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/sw_core/isotope.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/sw_core/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/sw_woocommerce/category-ajax.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/sw_woocommerce/jquery.countdown.min.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/js_composer/js_composer_front.min.js"></script>

<script type="text/javascript" src="http://dianxiaoer.com/Home/js/plugins.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/megamenu.min.js"></script>
<script type="text/javascript" src="http://dianxiaoer.com/Home/js/main.min.js"></script>
<script src="http://dianxiaoer.com/Home/layui/layui.js"></script>
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