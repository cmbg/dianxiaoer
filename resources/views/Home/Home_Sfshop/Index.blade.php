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
                                <h3>{{$uname}}: 您好,申请鱼塘请在这里填写一些信息.</h3>
                            </div>
                        </div>
                        @if(session('info'))
                            <div class="alert alert-danger">
                            <small class="tishi"><span class="text-red">{{session('info')}}</span></small>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/home/sfshop" method="post" role="form" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" ><h4>鱼塘名称</h4></label>
                                    <input type="text" name="fishpondname" class="form-control" id="exampleInputName1"
                                           value="{{old('fishpondname')}}" placeholder="">
                                    <div class="form-group">
                                        <label for="exampleInputFile">鱼塘头像</label>
                                        <input type="text" name="imgfile" class="form-control" id="art_thumb"
                                               value="" readonly>
                                        {{--<input type="text" size="100" id="art_thumb" name="art_thumb" readonly>--}}
                                        <input id="file_upload" name="limg" type="file">
                                        <br>
                                        <img src="" id="img1" alt="" style="width:80px;height:80px">
                                    </div>
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

    <script type="text/javascript">
        $(function () {
            $("#file_upload").change(function () {
                $('#img1').show();
                uploadImage();
            });
        });

        function uploadImage() {
            // 判断是否有选择上传文件
            var imgPath = $("#file_upload").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }
            //  var formData = new FormData($('#art_form')[0]);
            var formData = new FormData();
            formData.append('file_upload', $('#file_upload')[0].files[0]);
            formData.append('_token', "{{csrf_token()}}");
            $.ajax({
                type: "POST",
                url: "/home/sfshop/imgfile",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
//                    $('#img1').attr('src', '/uploads/' + data);
//                  $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
//                  $('#img1').attr('src','http://project193.oss-cn-beijing.aliyuncs.com/'+data);
                    $('#img1').attr('src',data);
                    $('#img1').show();
                    $('#art_thumb').val(data);
//                  $('#art_thumb').val('/uploads/' + data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }
    </script>
@stop
