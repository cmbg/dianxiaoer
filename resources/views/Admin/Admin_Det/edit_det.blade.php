@extends('Admin.Layouts.layout')

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
                <small>@if(session('editmsg'))
                        <li style="color:red">{{session('editmsg')}}</li>
                        @endif
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">商品管理</a></li>
                <li class="active">商品添加</li>
            </ol>
        </section>

        <!-- /.box-header -->
        <section class="content">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">请添加您的商品</h3>
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

                <!-- text input -->
                <div class="result-wrap">
                    <div class="result-content">
                        <form action="{{ url('Admin/Goods'.'/'.$data->gid) }}" method="post" id="myform"
                              name="myform" enctype="multipart/form-data">
                            {{ csrf_field()  }}
                            {{method_field('put')}}
                            <table class="insert-tab" width="100%">
                                <tbody>
                                <tr>
                                    <th width="120"><i class="require-red">*</i>分类：</th>
                                    <td>
                                        <select name="tid" id="catid" class="required">

                                            <option disabled="" value="27">|--图书</option>
                                            <option value="33">&nbsp;&nbsp;&nbsp;&nbsp;|--黄皮书</option>
                                            <option value="28">|--食品</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>商品名称：</th>
                                    <td>
                                        <input class="common-text required" id="title" name="gname" size="50"
                                               value="{{$data-> gname}}"
                                               type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th>定价：</th>
                                    <td><input class="common-text" name="price" size="50" value="{{$data->price}}"
                                               type="text"></td>
                                </tr>
                                <tr>
                                    <th>缩略图：</th>
                                    <td>
                                        <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
                                        <input type="text" size="50" id="art_thumb" value="{{$data->pic}}" name="pic">
                                        <input id="file_upload" name="file_upload" type="file" multiple >
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
//                                                var formData = new FormData($('#art_form')[0]);
                                                var formData = new FormData();
                                                formData.append('file_upload', $('#file_upload')[0].files[0]);
                                                formData.append('_token',"{{csrf_token()}}");
                                                $.ajax({
                                                    type: "POST",
                                                    url: "/Admin/Goods/upload",
                                                    data: formData,
                                                    async: true,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function(data) {
                                                        $('#img1').attr('src','http://cmbgl.oss-cn-beijing.aliyuncs.com/'+data);
//                                            $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
//                                            $('#img1').attr('src','http://project193.oss-cn-beijing.aliyuncs.com/'+data);
                                                        $('#img1').show();
                                                        $('#art_thumb').val('http://cmbgl.oss-cn-beijing.aliyuncs.com/'+data);
                                                    },
                                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                        alert("上传失败，请检查网络后重试");
                                                    }
                                                });
                                            }
                                        </script>

                                    </td>
                                </tr>
                                <tr>
                                    <th>描述：</th>
                                    <td><textarea name="goodsDes" class="common-textarea" id="content" cols="30"
                                                  style="width: 98%;" rows="10">{{$data->goodsDes}}</textarea></td>
                                </tr>
                                <tr>
                                    <th>状态：</th>
                                    <td>
                                        <input class="common-text" name="gstatus" size="50"
                                               @if($data->gstatus == 0)checked @endif value="0"
                                               type="radio">新品
                                        <input class="common-text" name="gstatus" size="50"
                                               @if($data->gstatus == 1)checked @endif  value="1" type="radio">上架
                                        <input class="common-text" name="gstatus" size="50"
                                               @if($data->gstatus == 2)checked @endif  value="2" type="radio">下架
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
            <script src="{{ asset('/Huploadify/jquery.Huploadify.js') }}"></script>

@stop