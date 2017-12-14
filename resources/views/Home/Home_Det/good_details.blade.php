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
                        <h1>我的鱼塘</h1>
                        <div class="bread">
                            <div class="breadcrumbs theme-clearfix">
                                <div class="container">
                                    <ul class="breadcrumb">
                                        <li>
                                            <a href="{{url('/home/fshop')}}">返回我的鱼塘</a>
                                            <span class="go-page"></span>
                                        </li>

                                        <li class="active">
                                            <span>添加商品详情</span>
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

                                            <div class="woocommerce-MyAccount-content">

                                                <section class="content-header">
                                                    <link rel="stylesheet" type="text/css" href="{{ asset('/Admin/css/common.css')}}"/>
                                                    <link rel="stylesheet" type="text/css" href="{{ asset('/Admin/css/main.css')}}"/>


                                                    <style>
                                                        .common-text {
                                                            height: 30px;
                                                        }

                                                    </style>

                                                    <section class="content-header">

                                                        {{--<h1>--}}
                                                        {{--{{$title}}--}}
                                                        {{--<small>@if(session('editmsg'))--}}
                                                        {{--<li style="color:red">{{session('editmsg')}}</li>--}}
                                                        {{--@endif--}}
                                                        {{--</small>--}}
                                                        {{--</h1>--}}
                                                        {{--<ol class="breadcrumb">--}}
                                                        {{--<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>--}}
                                                        {{--<li><a href="#">商品管理</a></li>--}}
                                                        {{--<li class="active">商品添加</li>--}}
                                                        {{--</ol>--}}
                                                    </section>

                                                    <!-- /.box-header -->
                                                    <section class="content">
                                                        <div class="box box-warning">
                                                        {{--<div class="box-header with-border">--}}
                                                        {{--<h3 class="box-title">请添加您的商品</h3>--}}
                                                        {{--<small>--}}
                                                        {{--@if(count($errors) > 0)--}}
                                                        {{--@if(is_object($errors))--}}
                                                        {{--@foreach($errors -> all() as $error)--}}
                                                        {{--{{$error}}--}}
                                                        {{--@endforeach--}}
                                                        {{--@elseif (is_string($errors))--}}
                                                        {{--{{$error}}--}}
                                                        {{--@endif--}}
                                                        {{--@endif--}}


                                                        {{--</small>--}}
                                                        {{--</div>--}}

                                                        <!-- text input -->
                                                            <div class="result-wrap">
                                                                <div class="result-content">
                                                                    <form action="{{ url('Admin/Goods') }}" method="post" id="myform"
                                                                          name="myform" enctype="multipart/form-data">
                                                                        {{ csrf_field()  }}

                                                                        <table class="insert-tab" width="100%">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th width="120"><i class="require-red"></i>图片：</th>


                                                                                <td id="gtd">


                                                                                    @foreach($data->gpic as $k => $v)
                                                                                        <input style="display:none"   type="text" class="pid" value="{{$v->gid}}">
                                                                                        <input style="display:none" type="text" value="{{$v->gpic}}" size="50"
                                                                                               id="art_thumb"
                                                                                               name="pic[]">
                                                                                        <img ondblclick="ondb(this)" name="{{$v->id}}" src="{{$v->gpic}}"
                                                                                             id="oldimage" alt=""
                                                                                             style="Float:left; margin-left: 10px; width:80px;height:80px">

                                                                                    @endforeach
                                                                                    <input style="display: none;" type="file" id="file_upload" name="file_upload">

                                                                                </td>
                                                                                <td id="bj"
                                                                                    style="width:80px; background:url('{{asset('/Images/ajax-loader.jpg')}}') no-repeat; background-size: 80px 80px">
                                                                                    <img src="" id="image" alt=""
                                                                                         style="Float:left; margin-left: 10px; width:80px;height:80px">
                                                                                </td>

                                                                                <script src="http://www.lanrenzhijia.com/ajaxjs/jquery.min.js"></script>
                                                                                <script>
                                                                                    $(function () {

                                                                                        var a = $('#gtd').children('img').length;
                                                                                        if (a  == 0) {
                                                                                            layer.msg('请去添加商品');
                                                                                        }
                                                                                        if (a >= 5) {
                                                                                            $('#image').css('display', 'none');
                                                                                            return;
                                                                                        }
                                                                                        $('#bj').on('click', function () {

                                                                                            var a = $('#gtd').children('img').length;
                                                                                            if (a == 5) {
                                                                                                $('#image').css('display', 'none');
                                                                                                return;
                                                                                            } else {
                                                                                                $('#file_upload').click();
                                                                                            }

                                                                                        });
                                                                                        $('#file_upload').change(function () {
                                                                                            var flag = 0;
                                                                                            var id = $('#oldimage').attr('name');
                                                                                            uploadImage(flag,id);

                                                                                        })
                                                                                    })

                                                                                    //双击函数
                                                                                    function ondb(obj) {
                                                                                        $('#file_upload').click();
                                                                                        var flag = 1;
                                                                                        var id = $(obj).attr('name');
                                                                                        $('#file_upload').change(function () {
                                                                                            uploadImage(flag,id);
                                                                                        });
                                                                                    }

                                                                                    function uploadImage(flag, id) {

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
                                                                                        var formData = new FormData();
                                                                                        formData.append('image', $('#file_upload')[0].files[0]);
                                                                                        formData.append('_token', "{{csrf_token()}}");
                                                                                        formData.append('gid', '{{$id}}');
                                                                                        formData.append('flag', flag);
                                                                                        formData.append('id', id);

                                                                                        $.ajax({
                                                                                            type: "post",
                                                                                            url: "{{url('home/Det/uploadpic')}}",
                                                                                            data: formData,
                                                                                            async: true,
                                                                                            cache: false,
                                                                                            contentType: false,
                                                                                            processData: false,
                                                                                            success: function (data) {
//                                                    console.log(data);
                                                                                                location.href = location.href;
                                                                                                layer.msg('添加成功');

                                                                                            },
                                                                                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                                                                                alert("上传失败，请检查网络后重试");

                                                                                            }
                                                                                        });
                                                                                    }
                                                                                </script>

                                                                            </tr>
                                                                            <tr>
                                                                                <th>专家名称</th>

                                                                                <td colspan="2">
                                                                                    {{$data->goodsdetail['scc']}}
                                                                                    @if($data->gpicinfo['scc'] == 1)
                                                                                        <button type="button" style="width:100px;" id="btn"
                                                                                                class="cz bt btn btn-block btn-danger mouses">
                                                                                            已验证
                                                                                        </button>
                                                                                    @else
                                                                                        <button type="button" style="width:100px;" id="btn"
                                                                                                class="cz bt btn btn-block btn-warnin mouses">
                                                                                            未验证
                                                                                        </button>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>收藏数量</th>

                                                                                <td colspan="2">
                                                                                    {{$data->gpicinfo['scl']}}
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>销量</th>

                                                                                <td colspan="2">
                                                                                    {{$data->gpicinfo['count']}} 件
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>商品属性</th>

                                                                                <td colspan="2">
                                                                                    @if(!empty($data->fid))
                                                                                        <butto type="button" class="sj btn btn-block btn-danger btn-success btn-warning"
                                                                                               name="">
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                                    鱼塘
                                                                                                </font></font>
                                                                                        </butto>
                                                                                    @else
                                                                                        <button type="button" class="sj btn btn-block btn-danger btn-success btn-warning"
                                                                                                name="">
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                                    鱼塘商品
                                                                                                </font></font>
                                                                                        </button>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>验证专家姓名</th>

                                                                                <td colspan="2">
                                                                                    刘
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>商品介绍</th>

                                                                                <td colspan="2" >
                                                                                    {{$data->gpicinfo['content']}}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>操作</th>

                                                                                <td colspan="2">
                                                                                    @if(!empty($data->fid))
                                                                                        <a href="{{url('home/Det/edit').'/'.$data->gid}}"> <button  type="button" id="yut" class="sj btn btn-block btn-danger btn-success btn-warning">
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                                    修改小店商品详情

                                                                                                </font></font>
                                                                                        </button>
                                                                                        </a>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                    </section>

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