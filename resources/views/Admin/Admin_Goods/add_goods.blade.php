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
                <small>这里是商品添加</small>
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
                            {{--@elseif (is_string($errors))--}}
                                {{--{{$error}}--}}
                            @endif
                        @endif


                    </small>
                </div>

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
                                        <input class="common-text required" id="title" name="gname" size="50" value="{{old('gname')}}"
                                               type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <th>定价：</th>
                                    <td><input class="common-text"  name="price" size="50" value="{{old('price')}}" type="text"></td>
                                </tr>
                                <tr>
                                    <th>库存：</th>
                                    <td><input class="common-text" name="goodsNum" size="50" value="{{ old('goodsNum')}} " type="text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>缩略图：</th>
                                    <td><input name="pic" id="" type="file"></td>
                                </tr>
                                <tr>
                                    <th>描述：</th>
                                    <td><textarea name="goodsDes" class="common-textarea" id="content" cols="30"
                                                  style="width: 98%;" rows="10"></textarea></td>
                                </tr>
                                <tr>
                                    <th>状态：</th>
                                    <td><input class="common-text" name="gstatus" size="50" checked="" value="1"
                                               type="radio">
                                        <button type="button" onclick="" class="btn btn-block btn-default btn-info"><font
                                                    style="vertical-align: inherit;"><font
                                                        style="vertical-align: inherit;">新品</font></font></button>
                                        <input class="common-text" name="gstatus" size="50" value="2" type="radio">
                                        <button type="button" class="btn btn-block btn-default btn-success"><font
                                                    style="vertical-align: inherit;"><font
                                                        style="vertical-align: inherit;">上架</font></font></button>

                                        <input id="3" class="common-text" name="gstatus" size="50" checked=""  value="3" type="radio">

                                        <button onclick="document.getElementById("3")" type="button" class="btn btn-block btn-warning"><font
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
@stop