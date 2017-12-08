@extends('Home.Layout.layout')
@section('body')
    <body>
@stop


@section('content')


        <div style="width:1000px; height: 1000px; margin:0px auto; background: url('{{asset('/Home/images/timg.jp')}}') ">

                <link rel="stylesheet" type="text/css" href="{{ asset('/Admin/css/common.css')}}"/>
                <link rel="stylesheet" type="text/css" href="{{ asset('/Admin/css/main.css')}}"/>
                <style>
                    .common-text {
                        height: 30px;
                    }

                </style>


                <!-- /.box-header -->

                        <div class="result-wrap">
                            <div class="result-content">
                                <form action="{{ url('home/fshop') }}" method="post" id="myform" name="myform"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <table class="insert-tab" width="100%">
                                        <tbody>
                                        <tr>
                                            <th colspan="2" style="color: red;">
                                                @if(count($errors) > 0)
                                                    @if(is_object($errors))
                                                        @foreach($errors -> all() as $error)
                                                            {{$error}}
                                                        @endforeach
                                                    @elseif (is_string($errors))
                                                        {{$error}}
                                                    @endif
                                                @endif
                                            </th>
                                        </tr>
                                        <tr>
                                            <th width="120"><i class="require-red">*</i>分类：</th>
                                            <td>
                                                <select name="tid" id="catid" class="required">
                                                    @foreach($data as $k => $v)
                                                        @if($v->cate_pid == 0)
                                                            <option disabled="" value="{{$v->cate_id}}">{{$v->cate_names}}</option>
                                                        @else
                                                            <option value="{{$v->cate_id}}">{{$v->cate_names}}</option>
                                                        @endif

                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><i class="require-red">*</i>商品名称：</th>
                                            <td>
                                                <input class="common-text required" id="title" name="gname" size="50"
                                                       value="{{old('gname')}}"
                                                       type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>定价：</th>
                                            <td><input class="common-text" name="price" size="50" value="{{old('price')}}"
                                                       type="text"></td>
                                        </tr>
                                        <tr>
                                            <th>缩略图：</th>
                                            <td>
                                                <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
                                                <input type="text" size="50" id="art_thumb" name="pic">
                                                <input id="file_upload" name="file_upload" type="file" multiple >
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
                                            <th>简述：</th>
                                            <td><textarea name="goodsDes" class="common-textarea" id="content" cols="30"
                                                          style="width: 98%;" rows="10">{{old('content')}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>状态：</th>
                                            <td><input style="display: none;" class="common-text" name="gstatus" size="50"
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