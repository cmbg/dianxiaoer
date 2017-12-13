@extends('Home.Layout.layout')
@section('body')
    <body class="page woocommerce-account woocommerce-page">
    <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
    @stop
    @section('content')
        <script src="{{asset('/Admin//bower_components/jquery/dist/jquery.min.js') }}"></script>
        <div class="body-wrapper theme-clearfix">
            <div class="listings-title">
                <div class="container">
                    <div class="wrap-title">
                        <h1>我的鱼塘</h1>
                        <div class="bread">
                            <div class="breadcrumbs theme-clearfix">
                                <div class="container">
                                    <ul class="breadcrumb">
                                        <li>
                                            <a href="{{url('/home/fshop')}}">返回商品列表</a>
                                            <span class="go-page"></span>
                                        </li>

                                        <li class="active">
                                            <span>添加商品</span>
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
                            <div class="entry">
                                <div class="entry-content">
                                    <div class="entry-content">
                                        <div class="woocommerce">

                                            <div class="woocommerce-MyAccount-content" style="margin:0px 100px;">

                                                <form class="edit-account" action="{{ url('/home/fshop') }}"
                                                      method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <p class="form-row form-row-first">
                                                        <small>
                                                            @if(count($errors) > 0)
                                                                    <div class="alert alert-danger">
                                                                @if(is_object($errors))
                                                                    @foreach($errors -> all() as $error)
                                                                        {{$error}}
                                                                    @endforeach
                                                                @elseif (is_string($errors))
                                                                    {{$error}}
                                                                @endif
                                                                    </div>
                                                            @endif
                                                            <small>
                                                                @if(session('msg'))
                                                                    <li style="color:red">{{session('msg')}}</li>
                                                                @endif
                                                            </small>

                                                        </small>
                                                    </p>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">商品类别：</label>
                                                        <select name="tid" id="catid" class="required">
                                                            @foreach($data as $k => $v)
                                                                @if($v->cate_pid == 0)
                                                                    <option disabled=""
                                                                            value="{{$v->cate_id}}">{{$v->cate_names}}</option>
                                                                @else
                                                                    <option value="{{$v->cate_id}}">{{$v->cate_names}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <p class="form-row form-row-last">
                                                        <label for="account_last_name">
                                                            商品名称
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" class="input-text" name="gname"
                                                               id="account_last_name" value="{{old('gname')}}"
                                                               placeholder="小店商品"/>
                                                    </p>

                                                    <div class="clear"></div>

                                                    <p class="form-row form-row-wide">
                                                        <label for="account_email">
                                                            定价 :
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" class="input-text" name="price"
                                                               id="account_email" value="{{old('price') }}"/>
                                                    </p>
                                                    <div class="clear"></div>

                                                    <p class="form-row form-row-wide">
                                                        <label for="account_email">
                                                            图片:
                                                            <span class="required">*</span>
                                                        </label>
                                                        <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
                                                        <input type="text" style="display: none" value="{{old('pic')}}" size="50" id="art_thumb" name="pic">
                                                        <input id="file_upload" name="file_upload" type="file" multiple>
                                                        <br>
                                                        <img src="" id="img1" alt="" style="width:80px;height:80px">
                                                        <script type="text/javascript">
                                                            $(function () {
                                                                $("#file_upload").change(function () {
                                                                    $('img1').show();
                                                                    uploadImage();
                                                                });
                                                            });

                                                            function uploadImage() {
                                                                // 判断是否有选择上传文件
                                                                var imgPath = $("#file_upload").val();
                                                                if (imgPath == "") {
                                                                    layer.msg('选择图片文件', {icon: 5});
                                                                    return;
                                                                }
                                                                //判断上传文件的后缀名
                                                                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                                                if (strExtension != 'jpg' && strExtension != 'gif'
                                                                    && strExtension != 'png' && strExtension != 'bmp') {
                                                                    layer.msg('选择图片文件', {icon: 5});
                                                                    return;
                                                                }
//                                                var formData = new FormData($('#art_form')[0]);
                                                                var formData = new FormData();
                                                                formData.append('file_upload', $('#file_upload')[0].files[0]);
                                                                formData.append('_token', "{{csrf_token()}}");
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "/Admin/Goods/upload",
                                                                    data: formData,
                                                                    async: true,
                                                                    cache: false,
                                                                    contentType: false,
                                                                    processData: false,
                                                                    success: function (data) {
                                                                        $('#img1').attr('src', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/' + data);
//                                            $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
//                                            $('#img1').attr('src','http://project193.oss-cn-beijing.aliyuncs.com/'+data);
                                                                        $('#img1').show();
                                                                        $('#art_thumb').val('http://cmbgl.oss-cn-beijing.aliyuncs.com/' + data);
                                                                    },
                                                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                                                        layer.msg('上传失败，请检查网络后重试！', {icon: 5});
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    </p>
                                                    <div class="clear"></div>

                                                    <p class="form-row form-row-wide">
                                                        <label for="account_email">
                                                            简述 ：
                                                            <span class="required">*</span>
                                                        </label>

                                                    <textarea name="goodsDes" class="common-textarea" id="goodsDes"
                                                                  cols="30"
                                                                  style="width: 98%;"
                                                                  rows="10">{{old('goodsDes')}}</textarea>

                                                    </p>
                                                    <div class="clear"></div>

                                                    <p class="form-row form-row-wide">
                                                        <label for="account_email">
                                                            状态 ：
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input style="display: none;" class="common-text" name="gstatus" size="50"
                                                               checked="" value="0">
                                                        <button id="a" type="button" onclick="$('.common-text').attr('value','0');"
                                                                class="btn btn-block btn-default btn-primary">
                                                            <font
                                                                    style="vertical-align: inherit;"><font
                                                                        style="vertical-align: inherit;">新品</font></font></button>
                                                        <button id="b" type="button" onclick="$('.common-text').attr('value','1');"
                                                                class="btn btn-block btn-default "><font
                                                                    style="vertical-align: inherit;"><font
                                                                        style="vertical-align: inherit;">上架</font></font></button>
                                                        <button id="c" type="button" onclick="$('.common-text').attr('value','2');"
                                                                class="btn btn-block btn-default"><font
                                                                    style="vertical-align: inherit;"><font
                                                                        style="vertical-align: inherit;">下架</font></font></button>
                                                    </p>

                                                    <div class="clear"></div>
                                                    <p>
                                                        <input type="submit" class="btn btn-primary" name="save_account_details"
                                                               value="确认添加"/>
                                                    </p>
                                                </form>
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
        <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('/Admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('/Admin/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('/Admin/dist/js/demo.js') }}"></script>
        {{--<script src="{{ asset('/Huploadify/jquery.Huploadify.js') }}"></script>--}}
        <script src="{{asset('/img_upload/control/js/zyUpload.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('button').on('click', function () {
                if ($('button').hasClass("btn-primary")) {
                    $('button').removeClass("btn-primary");
                } else {
                    $(this).addClass("btn-primary");
                }

            })


        </script>

@stop