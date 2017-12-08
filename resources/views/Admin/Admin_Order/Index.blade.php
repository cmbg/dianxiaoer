@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            订单管理
            <small>列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="#">订单管理</a></li>
            <li class="active">列表</li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <small class="box-title">在这里你可以对订单进行管理.</small>
                        <small id="info"></small>
                        @if(session('info'))
                            <small class="tishi"><span class="text-red">{{session('info')}}</span></small>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="search-wrap">
                                <div class="search-content">

                                    <form action="{{url('admin/order')}}" method="get">
                                        <table class="search-tab">
                                            <tr>
                                                <th width="55">订单号:</th>

                                                <td><input class="common-text" placeholder="订单号" name="oid" value="{{$request->oid}}"
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
                                                <th width="45">状态:</th>
                                                <td>
                                                    <select name="status" id="">
                                                        <option value="">全部</option>
                                                        <option @if($request['status'] == 1)  selected  @endif value="1">未发货</option>
                                                        <option @if($request['status'] == 2)  selected  @endif value="2">未收货</option>
                                                        <option @if($request['status'] == 3)  selected  @endif value="3">已收货</option>
                                                    </select>
                                                </td>
                                                <td width="10"></td>
                                                {{--<th width="70">下单时间:</th>--}}
                                                {{--<td><input class="common-text" size='15' name="ictime" value="" id=""--}}
                                                           {{--type="datetime-local"></td>--}}
                                                {{--<td>--</td>--}}
                                                {{--<td><input class="common-text" size='15' name="actime" value="" id=""--}}
                                                           {{--type="datetime-local"></td>--}}
                                                <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="row" style="height:20px">
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

                                                订单号
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                下单人

                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                收货人

                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">

                                                收货人电话
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">

                                                收货地址
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                商品数量
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                商品总价
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                下单时间
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                状态
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
                                                <td class="id">{{$v->oid}}</td>
                                                <td>{{$v->adminuser->uname}}</td>
                                                <td>{{$v->name}}</td>
                                                <td>{{$v->tel}}</td>
                                                <td>{{$v->add}}</td>
                                                <td>{{$v->number}}</td>
                                                <td>{{$v->oprice}}</td>
                                                <td>{{$v->ontime}}</td>
                                                <td class="statusBtn">
                                                    @if($v->status == 1)
                                                        <span class="text-red">未发货<span>
                                                    @elseif($v->status == 2)
                                                                    <span class="text-yellow">未收货</span>
                                                                @elseif($v->status == 3)
                                                                    <span>已收货</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/order/'.$v->oid)}}">详情</a>
                                                    <a href="{{url('admin/order/'.$v->oid.'/edit')}}">编辑</a>
                                                    @if($v->status == 1)
                                                        <a href="{{url('admin/order/give/'.$v->oid)}}">发货</a>
                                                    @elseif($v->status == 2)
                                                        <span class="text-blue">发货中</span>
                                                    @elseif($v->status == 3)
                                                        <span class="text-blue">已收货</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

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
                                            {!! $data->appends($request->all())->render() !!}
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
    <script type="text/javascript" src="{{asset('/data/dateRange.js')}}"></script>
@stop

@section("adstatus")
    <script>
        $(".tishi   ").fadeOut(3000);
    </script>
    <script>
        $(".statusBtn").on('click', function () {
            var t = $(this);
            var id = $(this).parent().find('.id').html();
//            console.log(id);
            $.ajax(
                {
                    url: '/admin/ad/ajaxStatus',
                    data: {id: id},
                    type: 'post',
                    success: function (data) {
//                        console.log(data);
                        if (data.astatus == 1) {
                            t.html('<button type="button" class="btn bg-olive bg-purple margin">已禁用\n' +
                                '                                                        </button>');
                        } else {
                            t.html('<button type="button" class="btn bg-olive btn-flat margin">已启用\n' +
                                '                                                        </button>');
                        }
                    },
                    error: function () {

                    },
                    dataType: 'json',
                }
            );
        })
    </script>
@stop
