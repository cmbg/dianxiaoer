@extends('Admin.Layouts.layout')
@include('UEditor::head')
@section('content')
    <section class="content-header">
        <link rel="stylesheet" type="text/css" href="{{ asset('/Admin/css/common.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('/Admin/css/main.css')}}"/>
        <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
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
                        <!-- /.box-header -->
                        <section class="content">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title"></h3>



                                    </small>
                                </div>
                                <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
                                <form action="{{ url('Admin/Det/update') }}" method="post" id="myform" name="myform"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <table class="insert-tab" width="100%">
                                        <input type="hidden" name="gid" value="{{$data->gpicinfo->id}}">
                                        <tbody>
                                        <tr>
                                            <th><i class="require-red">*</i>有无验证：</th>
                                            <td>

                                                <input style="display: none" class="common-text1 required" id="title"
                                                       name="scc" size="50" value="0" type="radio">
                                                <button onclick="but()" id="c" type="button"
                                                        class="btn btn-block btn-default"><font
                                                            style="vertical-align: inherit;"><font
                                                                style="vertical-align: inherit;">申请验证</font></font>
                                                </button>
                                                <script>
                                                    function but() {

                                                        $('.common-text1').attr('value', 1);
                                                        layer.msg('请耐心等待');
                                                    }

                                                </script>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>收藏数量：</th>
                                            <td><input class="common-text" name="scl" size="50" value="{{$data->gpicinfo->scl}}"
                                                       type="text"></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>

                                                <script id="ueditor" name="content" type="text/plain"
                                                        style="width:800px;height:300px;">{!! $data->gpicinfo->content !!}}
                                                </script>
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
                                                <input class="btn btn6" onclick="history.go(-1)" value="返回"
                                                       type="button">
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