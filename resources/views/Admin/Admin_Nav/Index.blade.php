@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            前台导航栏管理
            <small>列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="#">前台导航栏管理</a></li>
            <li class="active">列表</li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button onclick="add();" class="btn bg-olive  margin">添加
                        </button>
                        <small class="box-title">在这里你可以对前台导航栏进行一些管理(双击修改).</small>
                        <small id="info"></small>
                        @if(session('info'))
                            <small class="tishi"><span class="text-red">{{session('info')}}</span></small>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="search-wrap">
                                <div class="search-content">

                                    <form action="{{url('admin/nav')}}" method="get">
                                        <table class="search-tab">
                                            <tr>
                                                <th width="55">名字:</th>

                                                <td><input class="common-text" placeholder="名称关键字" name="nname" value="{{$request->nname}}"
                                                           id="" type="text"></td>
                                                <th>
                                                    每页条数：
                                                    <select name="num">
                                                        <option value="5"
                                                                @if($request['num'] == 5)  selected  @endif
                                                        >5
                                                        </option>
                                                        <option value="10"
                                                                @if($request['num'] == 10)  selected  @endif
                                                        >10
                                                        </option>
                                                    </select>
                                                </th>
                                                <td width="10"></td>

                                                <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="row" style="height:20px;">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable"
                                           role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">

                                                排序
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">

                                                ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                名字

                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">

                                                目标地址
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                操作

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="form" role="row" class="odd" style="display: none">
                                            <form action="{{url('/admin/nav')}}" method="post" role="form"
                                                  enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <td>添加:</td>
                                                <td><input type="text" name="nname" class="form-control"
                                                           id="exampleInputName1" value="" placeholder=""></td>
                                                <td><input type="text" name="nlink" class="form-control"
                                                           id="exampleInputName1" value="" placeholder=""></td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary">确认添加</button>
                                                </td>
                                            </form>
                                        </tr>

                                        @foreach($data1 as $k=>$v)
                                            <tr role="row" class="odd">
                                                <td class="paixu">{{$v->paixu}}</td>
                                                <td class="nid">{{$v->nid}}</td>
                                                <td class="nname">{{$v->nname}}</td>
                                                <td class="nlink">{{$v->nlink}}</td>
                                                <td class="navedit">
                                                    <button type="button" onclick="sendBtn({{$v->nid}});"
                                                            class="btn btn-primary">删除
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <script>
                                            function add() {
                                                $('.form').show();
                                            }
                                            function sendBtn(node) {
                                                //询问框
                                                layer.confirm('您确认删除吗？', {
                                                    btn: ['确认', '取消'] //按钮
                                                }, function () {
                                                    //如果用户发出删除请求，应该使用ajax向服务器发送删除请求
                                                    //$.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                                                    //admin/user/1
                                                    $.post("{{url('admin/nav')}}/" + node, {
                                                        "_method": "delete",
                                                        {{--"_token": "{{csrf_token()}}"--}}
                                                    }, function (data) {
//                                                        console.log(data);
                                                        //data是json格式的字符串，在js中如何将一个json字符串变成json对象
                                                        //var res =  JSON.parse(data);
                                                        //删除成功
                                                        if (data.error == 0) {
                                                            //console.log("错误号"+res.error);
                                                            //console.log("错误信息"+res.msg);
                                                            layer.msg(data.msg, {icon: 6});
                                                            var t = setTimeout("location.href = location.href;", 1000);
//                                                            location.href = location.href;
                                                        } else {
                                                            layer.msg(data.msg, {icon: 5});
                                                            var t = setTimeout("location.href = location.href;", 1000);
//                                                            location.href = location.href;
                                                        }
                                                    });
                                                }, function () {

                                                });
                                            }
                                        </script>


                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status"
                                         aria-live="polite">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <div class="page_list">
                                            {!! $data1->appends($request->all())->render() !!}
                                        </div>
                                        {{--<style>--}}
                                        {{--.page_list ul li span {--}}
                                        {{--padding: 6px 12px;--}}
                                        {{--}--}}
                                        {{--</style>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


@stop

@section('js')

    <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/Admin/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('/Admin/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/Admin/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/Admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('/Admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/Admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('/Admin/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/Admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('/Admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('/Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('/Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/Admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/Admin/dist/js/adminlte.min.js') }}"></script>
    {{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
    {{--<script src="{{ asset('/Admin/dist/js/pages/dashboard.js') }}"></script>--}}
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/Admin/dist/js/demo.js') }}"></script>
@stop


@section("navedit")
    <script>
        $(".tishi   ").fadeOut(3000);
    </script>
    <script>
        $(".nname").on('dblclick', fn1);

        function fn1() {
            var t = $(this);
            var id = t.parent().find('.nid').html();
            var name = t.html();
            var inp = $('<input type="text">');
            inp.val(name);
            t.html(inp);
            inp.select();
            t.unbind('dblclick');
            inp.on('blur', function () {
                var newName = $(this).val();
                $.ajax({
                    url: "{{ url('/admin/nav/ajaxName') }}",
                    type: 'post',
                    data: {id: id, name: newName},
                    beforeSend: function () {
                        $("#info").html('<span class="text-red"><i class="fa fa-fw fa-spin fa-circle-o-notch"></i>正在修改中...</span>');
                        $("#info").show();
                    },
                    success: function (data) {
//                        console.log(data);
                        if (data.code == 0) {
                            t.html(name);
                            $("#info").html('<span class="text-red">名字已经存在</span>');
                            $("#info").show();
                            $("#info").fadeOut(2000);
                        } else if (data.code == 1) {
                            t.html(newName);
                            $("#info").html('<span class="text-red">修改成功</span>');
                            $("#info").show();
                            $("#info").fadeOut(2000);
                        } else {
                            t.html(name);
                            $("#info").html('<span class="text-red">修改失败</span>');
                            $("#info").show();
                            $("#info").fadeOut(2000);
                        }
                        ;
                        //添加事件。
                        t.on('dblclick', fn1);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(textStatus);
                    },
//                    timeout:1000,
                    dataType: 'json'
                });
            });
        }

    </script>

    <script>
        $(".nlink").on('dblclick', fn2);

        function fn2() {
            var t = $(this);
            var id = t.parent().find('.nid').html();
            var name = t.html();
            var inp = $('<input type="text">');
            inp.val(name);
            t.html(inp);
            inp.select();
            t.unbind('dblclick');
            inp.on('blur', function () {
                var newName = $(this).val();
                $.ajax({
                    url: "{{ url('/admin/nav/ajaxLinks') }}",
                    type: 'post',
                    data: {id: id, name: newName},
                    beforeSend: function () {
                        $("#info").html('<span class="text-red"><i class="fa fa-fw fa-spin fa-circle-o-notch"></i>正在修改中...</span>');
                        $("#info").show();
                    },
                    success: function (data) {
//                        console.log(data);
                        if (data.code == 0) {
                            t.html(name);
                            $("#info").html('<span class="text-red">目标地址已经存在</span>');
                            $("#info").show();
                            $("#info").fadeOut(2000);
                        } else if (data.code == 1) {
                            t.html(newName);
                            $("#info").html('<span class="text-red">修改成功</span>');
                            $("#info").show();
                            $("#info").fadeOut(2000);
                        } else {
                            t.html(name);
                            $("#info").html('<span class="text-red">修改失败</span>');
                            $("#info").show();
                            $("#info").fadeOut(2000);
                        }
                        ;
                        //添加事件。
                        t.on('dblclick', fn1);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(textStatus);
                    },
//                    timeout:1000,
                    dataType: 'json'
                });
            });
        }

    </script>

    <script>
        $(".paixu").on('dblclick', fn3);

        function fn3() {
            var t = $(this);
            var id = t.parent().find('.nid').html();
            var name = t.html();
            var inp = $('<input style="width:50px" type="text">');
            inp.val(name);
            t.html(inp);
            inp.select();
            t.unbind('dblclick');
            inp.on('blur', function () {
                var newName = $(this).val();
                $.ajax({
                    url: "{{ url('/admin/nav/ajaxPai') }}",
                    type: 'post',
                    data: {id: id, name: newName},
                    beforeSend: function () {
                        $("#info").html('<span class="text-red"><i class="fa fa-fw fa-spin fa-circle-o-notch"></i>正在修改中...</span>');
                        $("#info").show();
                    },
                    success: function (data) {
//                        console.log(data);
                        if (data.code == 1) {
                            location.href = location.href;
                        } else {
                            t.html(name);
                            $("#info").html('<span class="text-red">修改失败</span>');
                            $("#info").show();
                            $("#info").fadeOut(2000);
                        }
                        ;
                        //添加事件。
                        t.on('dblclick', fn1);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(textStatus);
                    },
//                    timeout:1000,
                    dataType: 'json'
                });
            });
        }

    </script>
@stop


