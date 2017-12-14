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
                                    <th width="120"><i class="require-red">*</i>分类：</th>


                                    <td id="demo" class="demo">
                                        <input type="hidden" id="it" name="_token" value="{{csrf_token()}}">
                                    </td>



                                </tr>
                                <tr>
                                    <th width="120"><i class="require-red">*</i>分类：</th>
                                    <td >
                                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js') }}"></script>
                                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js') }}"> </script>
                                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js') }}"></script>

                                        <script id="editor" type="text/plain" style="width:800px;height:500px;"></script>
                                        <script>

                                            var ue = UE.getEditor('editor')
                                        </script>
                                    </td>
                                    <style>
                                        .edui-default{line-height: 28px;}
                                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                        {overflow: hidden; height:20px;}
                                        div.edui-box{overflow: hidden; height:22px;}
                                    </style>


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