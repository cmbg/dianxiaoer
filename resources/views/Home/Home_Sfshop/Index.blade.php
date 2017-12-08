@extends('Home.Layout.layout')
@section('body')
    <body class="page woocommerce-account woocommerce-page">
@stop
@section('content')
<div class="container float wpb_column vc_column_container vc_col-sm-12" style="height:80px">
</div>
<div class="container float wpb_column vc_column_container vc_col-sm-12">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">

                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6 ">
                        <div class="box-header with-border" >
                            <div class="box-title" style="margin:10px 0px">
                                <h3>某某某,您好,申请鱼塘请在这里填写一些信息.</h3>
                            </div>
                        </div>
                        <form action="/home/sfshop" method="post" role="form" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" ><h4>鱼塘名称</h4></label>
                                    <input type="text" name="acustomer" class="form-control" id="exampleInputName1"
                                           value="" placeholder="">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">开通鱼塘</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<div class="container float wpb_column vc_column_container vc_col-sm-12" style="height:80px">
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
    <script src="{{asset('Home/layui/layui.js')}}"></script>
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