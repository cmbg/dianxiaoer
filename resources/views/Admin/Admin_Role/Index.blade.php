@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            角色管理
            <small>列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="#">角色管理</a></li>
            <li class="active">列表</li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{url('/admin/role/create')}}"><button class="btn bg-olive  margin">添加
                            </button></a>
                        <small class="box-title">在这里你可以对角色进行管理.</small>
                        <small id="info"></small>
                        @if(session('info'))
                            <small class="tishi"><span class="text-red">{{session('info')}}</span></small>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
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

                                                ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                角色名称

                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">

                                                角色描述
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                操作

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr role="row" class="odd">
                                                <td >{{$v->id}}</td>
                                                <td >{{$v->name}}</td>
                                                <td >{{$v->description}}</td>
                                                <td>
                                                    <a href="{{url('admin/role/auth/'.$v->id)}}">授权</a>
                                                    <a href="{{url('admin/role/'.$v->id.'/edit')}}">修改</a>
                                                    <a href="javascript:;" onclick="sendBtn({{$v->id}});">删除</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <script>
                                            function sendBtn(node) {
                                                //询问框
                                                layer.confirm('您确认删除吗？', {
                                                    btn: ['确认', '取消'] //按钮
                                                }, function () {
                                                    //如果用户发出删除请求，应该使用ajax向服务器发送删除请求
                                                    //$.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                                                    //admin/user/1
                                                    $.post("{{url('admin/role')}}/" + node, {
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
                                            {!! $data->render() !!}
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

@section("adondblclick")
    <script>
        $(".tishi   ").fadeOut(2000);
    </script>
@stop
