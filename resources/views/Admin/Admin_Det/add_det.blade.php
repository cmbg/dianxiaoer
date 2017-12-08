@extends('Admin.Layouts.layout')
@include('UEditor::head')
@section('content')
    <section class="content-header">
        <link rel="stylesheet" type="text/css" href="{{ asset('/Admin/css/common.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('/Admin/css/main.css')}}"/>
        <style>
            .common-text {
                height: 30px;
            }

        </style>

        <section class="content-header">

            <h1>
                {{$title}}
                <small>
                    @if(session('msg'))
                        <li style="color:red">{{session('msg')}}</li>
                    @endif
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">详情管理</a></li>
                <li class="active">商品添加</li>
            </ol>
        </section>

        <!-- /.box-header -->
        <section class="content">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$title }}的商品详情</h3>
                    <small>
                        @if(count($errors) > 0)
                            @if(is_object($errors))
                                @foreach($errors -> all() as $error)
                                    {{$error}}
                                @endforeach
                            @elseif (is_string($errors))
                                {{$error}}
                            @endif
                        @endif


                    </small>
                </div>
                <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

                <div class="result-wrap">
                    <div class="result-content">
                        <form action="{{ url('Admin/Det/store').'/'.$id }}" method="post" id="myform" name="myform"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <table class="insert-tab" width="100%">
                                <tbody>
                                <tr>
                                    <th>缩略图：</th>
                                    <td>
                                        <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

                                        <input style="display: none;" type="text" value="" size="50" id="art_thumb" name="pic[]">
                                        <button type="button" style="width:100px;" id="btn" class="cz bt btn btn-block btn-warning mouses">
                                            添加图片
                                        </button>

                                        <input style="display: none;"  type="file" id="file_upload" name="file_upload"  multiple>
                                        <br>


                                        <div id="img">

                                        </div>

                                        <img src="{{asset('/Images/ajax-loader.gif')}}" id="oldimage" alt="" style="Float:left; display: none; margin-left: 10px; width:80px;height:80px">
                                        <script type="text/javascript">

//                                            var image = $('#image').clone();
                                            $(function () {
                                                    $('#btn').on('click', function () {
                                                        var count = $('#img').children('img').length;
                                                        if(count == 5){
                                                            return
                                                        }else {
                                                            $('#file_upload').click();
                                                        }
                                                    });
                                                $('#file_upload').change(function(){
                                                    uploadImage();
                                                });
                                            });

                                            function uploadImage() {

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
                                                $.ajax({
                                                    type: "POST",
                                                    url: "/Admin/Det/upload",
                                                    data: formData,
                                                    async: true,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (data) {
                                                        var image = $('#oldimage').clone();
                                                        image.attr('src', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/' + data)
                                                        $("#img").append(image);
                                                        image.show();
                                                        var pic = $('#art_thumb').clone();
                                                        pic.attr('value','http://cmbgl.oss-cn-beijing.aliyuncs.com/' + data);
                                                        $("#img").append(pic);
                                            },
                                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                                        alert("上传失败，请检查网络后重试");
                                                    }
                                                });
                                            }
                                        </script>

                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>有无验证：</th>
                                    <td>
                                        <input class="common-text required" id="title" name="scc" size="50" value="0" checked="" type="radio">已验证
                                        <input class="common-text required" id="title" name="scc" size="50" value="1" type="radio">待验证
                                    </td>
                                </tr>
                                <tr>
                                    <th>收藏数量：</th>
                                    <td><input class="common-text" name="scl" size="50" value="{{old('scl')}}"
                                               type="text"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>

                                        <script id="ueditor" name="content" type="text/plain"
                                                style="width:800px;height:300px;">{!! old('content') !!}</script>
                                        <script >
                                        var ue = UE.getEditor("ueditor");
                                        ue.ready(function () {
                                            //因为Laravel有防csrf防伪造攻击的处理所以加上此行
                                            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                                        });
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                        <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>

                </div>
        </section>
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
