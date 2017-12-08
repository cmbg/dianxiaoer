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
                                            <input  type="text" class="pid" value="{{$v->gid}}">
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
                                            $('#image').on('click', function () {

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
                                                uploadImage(flag);

                                            })
                                        })

                                        //双击函数
                                        function ondb(obj) {
                                            $('#file_upload').click();
                                            var flag = 1;
                                            var id = $(obj).attr('name');
                                            $('#file_upload').change(function () {
                                                uploadImage(flag, id);
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
                                            var gid = $('#pid').val()
                                            formData.append('image', $('#file_upload')[0].files[0]);
                                            formData.append('_token', "{{csrf_token()}}");
                                            formData.append('gid', gid);
                                            formData.append('flag', flag);
                                            formData.append('id', id);

                                            $.ajax({
                                                type: "POST",
                                                url: "/Admin/Det/uploadpic",
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
                                        @if(empty($data->fid))
                                            <butto type="button" class="sj btn btn-block btn-danger btn-success btn-warning"
                                                    name="">
                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                        {{$data->fishpond['fishpondname']}} 的鱼塘
                                                    </font></font>
                                            </butto>
                                        @else
                                            <button type="button" class="sj btn btn-block btn-danger btn-success btn-warning"
                                                    name="">
                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                        后台普通商品
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

                                    <td colspan="2">
                                        {{$data->gpicinfo['content']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>操作</th>

                                    <td colspan="2">
                                        @if(empty($data->fid))
                                            <button  type="button" id="yut" class="sj btn btn-block btn-danger btn-success btn-warning">
                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                        小店鱼塘

                                                    </font></font>
                                            </button>

                                        @else
                                            <a href="{{url('Admin/Det/create').'/'.$data->gid}}"> <button type="button" class="sj btn btn-block btn-danger btn-success btn-warning"
                                                    name="">
                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                        添加修改详情
                                                    </font></font>
                                            </button>
                                           </a>
                                        @endif
                                    </td>
                                </tr>
                                <script>
                                    $(function(){
                                        $("#yut").on('click', function (){

                                            layer.msg('这是鱼塘商品看看得了');
                                        })
                                        //console.log("错误信息"+res.msg);

                                    })

                                </script>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

        </section>

        @stop
        @section('js')
            {{--Huploadify 图片上传 --}}
            <link rel="stylesheet" href="{{ asset('/Huploadify/Huploadify.css') }}">
            <link rel="stylesheet" href="{{ asset('\img_upload\control\css\zyUpload.css') }}" type="text/css">
            <script src="{{ asset('/Huploadify/jquery.js') }}"></script>
            <script src="{{ asset('/Huploadify/jquery.Huploadify.js') }}"></script>
            {{-- zyUpload图片上传 --}}
            {{--引用控制层插件样式--}}

            <script src="http://www.lanrenzhijia.com/ajaxjs/jquery.min.js"></script>
            {{--引用核心层插件--}}
            <script src="{{asset('/img_upload/core/zyFile.js') }}"></script>
            {{--引用控制层插件--}}
            <script src="{{asset('/img_upload/control/js/zyUpload.js') }}"></script>
            {{--引用初始化JS--}}
            <script src="{{asset('/img_upload/core/jq22.js') }}"></script>


@stop