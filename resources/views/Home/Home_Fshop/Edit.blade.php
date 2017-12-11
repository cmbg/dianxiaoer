@extends('Home.Layout.layout')
@section('body')
    <body class="page woocommerce-account woocommerce-page">
    <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
    @stop
    @section('content')
        <script src="{{asset('/Admin//bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
        <div class="body-wrapper theme-clearfix">
            <div class="listings-title">
                <div class="container">
                    <div class="wrap-title">
                        <h1>我的账户</h1>
                        <div class="bread">
                            <div class="breadcrumbs theme-clearfix">
                                <div class="container">
                                    <ul class="breadcrumb">
                                        <li>
                                            <a href="#">主页</a>
                                            <span class="go-page"></span>
                                        </li>

                                        <li class="active">
                                            <span>我的账户</span>
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
                                    <header>
                                        <h2 class="entry-title">我的账户</h2>
                                    </header>

                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <nav class="woocommerce-MyAccount-navigation">
                                                <ul>
                                                    <li class="is-active">
                                                        <a href="{{url('home/my_account')}}">我的鱼塘</a>
                                                    </li>

                                                    <li>
                                                        <a href="{{url('home/my_password')}}">修改密码</a>
                                                    </li>

                                                    <li>
                                                        <a href="{{url('home/my_address')}}">地址</a>
                                                    </li>

                                                    <li>
                                                        <a href="http://demo.smartaddons.com/templates/html/etrostore/account_details.html">账户详细资料</a>
                                                    </li>

                                                    <li>
                                                        <a href="create_account.html">退出</a>
                                                    </li>
                                                </ul>
                                            </nav>

                                            <div class="woocommerce-MyAccount-content">

                                                <form class="edit-account" action="{{ url('/home/fshop'.'/'.$data->gid) }}"
                                                      method="post" enctype="multipart/form-data">

                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <p class="form-row form-row-first">
                                                        <label for="account_first_name">
                                                            <span>
                                                                @if(count($errors) > 0)
                                                                    @if(is_object($errors))
                                                                        @foreach($errors -> all() as $error)
                                                                            {{$error}}
                                                                        @endforeach
                                                                    @elseif (is_string($errors))
                                                                        {{$error}}
                                                                    @endif
                                                                @endif
                                                            </span>
                                                            <small>@if(session('editmsg'))
                                                                    <li style="color:red">{{session('editmsg')}}</li>
                                                                @endif
                                                            </small>
                                                        </label>

                                                    </p>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">类别：</label>
                                                        <select name="tid" id="catid" class="required">
                                                                @foreach($tree as $v)
                                                                    @if($v->cate_id == $data->tid)
                                                                        <option selected value="{{$v->cate_id}}">{{$v->cate_names}}</option>
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
                                                               id="account_last_name" value="{{$data-> gname}}"
                                                               placeholder="小店商品"/>
                                                    </p>

                                                    <div class="clear"></div>

                                                    <p class="form-row form-row-wide">
                                                        <label for="account_last_name">
                                                            定价 :
                                                            <span class="required">*</span>
                                                        </label>

                                                        <input type="text" class="input-text" name="price"
                                                               id="account_last_name" value="{{$data->price}}"/>
                                                    </p>
                                                    <div class="clear"></div>

                                                    <p class="form-row form-row-wide">
                                                        <label for="account_last_name">
                                                            图片:
                                                            <span class="required">*</span>
                                                        </label>
                                                        <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
                                                        <input type="text" size="50" id="art_thumb" name="pic" value="{{$data->pic}}">
                                                        <input id="file_upload" name="file_upload" type="file">
                                                        <br>
                                                        <img src="{{$data->pic}}" id="img1" alt="" style="width:80px;height:80px">
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
                                                                    layer.msg('请选择上传图片！', {icon: 5});
                                                                    return;
                                                                }
                                                                //判断上传文件的后缀名
                                                                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                                                if (strExtension != 'jpg' && strExtension != 'gif'
                                                                    && strExtension != 'png' && strExtension != 'bmp') {
                                                                    layer.msg('请选择上传图片！', {icon: 5});
                                                                    return;
                                                                }
//                                                var formData = new FormData($('#art_form')[0]);
                                                                var formData = new FormData();
                                                                formData.append('file_upload', $('#file_upload')[0].files[0]);
                                                                formData.append('_token', "{{csrf_token()}}");
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "/home/fshop/upload",
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
                                                                        layer.msg("上传失败，请检查网络后重试", {icon: 5});

                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    </p>
                                                    <div class="clear"></div>

                                                    <p class="form-row form-row-wide">
                                                        <label for="account_last_name">
                                                            简述 ：
                                                            <span class="required">*</span>
                                                        </label>

                                                        <textarea name="goodsDes" class="input-text" id="content"
                                                                  cols="30"
                                                                  style="width: 98%;"
                                                                  rows="10">{{$data->goodsDes}}</textarea>
                                                    </p>
                                                    <div class="clear"></div>

                                                    <p class="form-row form-row-wide">
                                                        <label for="account_last_name">
                                                            状态 ：
                                                            <span class="required"></span>
                                                        </label>
                                                        <input class="common-text" name="gstatus" size="50"
                                                               @if($data->gstatus == 0)checked @endif value="0"
                                                               type="radio">新品
                                                        <input class="common-text" name="gstatus" size="50"
                                                               @if($data->gstatus == 1)checked @endif  value="1" type="radio">上架
                                                        <input class="common-text" name="gstatus" size="50"
                                                               @if($data->gstatus == 2)checked @endif  value="2" type="radio">下架
                                                    </p>


                                                    <div class="clear"></div>
                                                    <p>
                                                        <input type="submit" class="button" name=""
                                                               value="确认修改"/>
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