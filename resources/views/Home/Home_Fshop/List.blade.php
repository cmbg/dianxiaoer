@extends('Home.Layout.layout')
@section('body')
    <body class="page woocommerce-account woocommerce-page">
@stop
@section('content')

        <div class="body-wrapper theme-clearfix">
            <div class="listings-title">
                <div class="container">
                    <div class="wrap-title">
                        <h1>我的鱼塘</h1>
                        <div class="bread">
                            <div class="breadcrumbs theme-clearfix">
                                <div class="container">
                                    <ul class="breadcrumb">
                                        <li>
                                            <a href="#">主页</a>
                                            <span class="go-page"></span>
                                        </li>

                                        <li class="active">
                                            <span>我的鱼塘</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="post-6 page type-page status-publish hentry">
                            <div class="entry">
                                <div class="entry-content">

                                    <div class="entry-content">
                                        <div class="woocommerce">

                                            <div class="woocommerce-MyAccount-content">

                                                <section class="content">
                                                    <div class="row">
                                                        <!-- /.box-header -->
                                                        <div class="box-body">

                                                            <div id="example1_wrapper"
                                                                 class="dataTables_wrapper form-inline dt-bootstrap">
                                                                <small>
                                                                    @if(session('msg'))
                                                                        <li style="color:red">{{session('msg')}}</li>
                                                                    @endif
                                                                    @if(session('msg'))
                                                                        <li style="color:red">{{session('msg')}}</li>
                                                                    @endif
                                                                </small>
                                                                <form action="{{url('/home/fshop')}}" method="get">
                                                                    <div class="col-sm-3">
                                                                        <div class="dataTables_length"
                                                                             id="example1_length">
                                                                            <label>查看</label> &nbsp;&nbsp;<label><select
                                                                                        name="num"
                                                                                        aria-controls="example1"
                                                                                        class="form-control input-sm">
                                                                                    <option value="">|-- 请选择 --|
                                                                                    </option>
                                                                                    <option value="2"
                                                                                            @if($request['num'] == 2)
                                                                                            selected
                                                                                            @endif
                                                                                    >2
                                                                                    </option>
                                                                                    <option value="5"
                                                                                            @if($request['num'] == 5)
                                                                                            selected
                                                                                            @endif
                                                                                    >5
                                                                                    </option>
                                                                                    <option value="10"
                                                                                            @if($request['num'] == 10)
                                                                                            selected
                                                                                            @endif
                                                                                    >10
                                                                                    </option>
                                                                                    <option value="15"
                                                                                            @if($request['num'] == 15)
                                                                                            selected
                                                                                            @endif
                                                                                    >15
                                                                                    </option>
                                                                                </select></label><label>&nbsp;&nbsp;条</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-5">
                                                                        <div id="example1_filter"
                                                                             class="dataTables_filter"><label>查找 :</label> &nbsp;&nbsp;<label>
                                                                                <input
                                                                                        type="search" name="gname"
                                                                                        class="form-control input-sm"
                                                                                        placeholder="商品名称关键字"
                                                                                        aria-controls="example1"
                                                                                        value="{{$request->gname}}"></label>
                                                                        </div>
                                                                    </div>
                                                                    <button class="col-sm-1 bt btn  btn-warning">查找
                                                                    </button>
                                                                </form>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <a href="{{url('/home/fshop/create')}}"><button type="button" class=" bt btn  btn-warning">添加商品
                                                                    </button></a>
                                                            </div>
                                                            <div class="row" style="margin-left: 15px;">

                                                                <table id="example1"
                                                                       class="table table-bordered table-striped dataTable"
                                                                       role="grid" aria-describedby="example1_info"
                                                                       style="width: 1170px;">
                                                                    <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting_asc" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Rendering engine: activate to sort column descending">
                                                                            编号:
                                                                            {{--style="width: 82px;">编号:--}}
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Browser: activate to sort column ascending">
                                                                            商品名称:
                                                                            {{--style="width: 224px;"> 商品名称:--}}
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1" style="width: 80px;"
                                                                            aria-label="Platform(s): activate to sort column ascending">
                                                                            简介(图片):
                                                                            {{--style="width: 199px;">简介(图片):--}}
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Engine version: activate to sort column ascending">
                                                                            {{--style="width: 156px;">--}}
                                                                            类别:
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="CSS grade: activate to sort column ascending"
                                                                            style="overflow: hidden;">简介:
                                                                            {{--style="width: 100px;overflow: hidden;">简介:--}}
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="CSS grade: activate to sort column ascending">
                                                                            定价:
                                                                            {{--style="width: 80px;">定价:--}}
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="CSS grade: activate to sort column ascending">
                                                                            销量:
                                                                            {{--style="width: 80px;">销量:--}}
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="CSS grade: activate to sort column ascending">
                                                                            类型:
                                                                            {{--style="width: 112px;">类型:--}}
                                                                        </th>
                                                                        {{--<th class="sorting" tabindex="0"--}}
                                                                            {{--aria-controls="example1" rowspan="1"--}}
                                                                            {{--colspan="1"--}}
                                                                            {{--aria-label="CSS grade: activate to sort column ascending">--}}
                                                                            {{--详情:--}}
                                                                            {{--style="width: 112px;">详情:--}}
                                                                        {{--</th>--}}
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="CSS grade: activate to sort column ascending">
                                                                            状态:
                                                                            {{--style="width: 112px;">状态:--}}
                                                                        </th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="example1" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="CSS grade: activate to sort column ascending"> 操作:
                                                                            {{--style="width: 112px;"> 操作:--}}
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tfoot>

                                                                    @foreach($data as $v)
                                                                        <tr>
                                                                            <td style="" rowspan="1"
                                                                                colspan="1">{{ $v->gid }} {{ $request['sx'] }} </td>
                                                                            <td rowspan="1"
                                                                                colspan="1">{{$v -> gname}}</td>
                                                                            <td onclick=" " rowspan="1" colspan="1"><img
                                                                                        style="width:80px; height: 80px"
                                                                                        src="{{ $v->pic }}"></td>
                                                                            <td rowspan="1"
                                                                                colspan="1">{{$v->Cate->cate_name}}</td>
                                                                            <td rowspan="1">
                                                                                {{--<div>{{$v ->goodsDes}}</div>--}}
                                                                                {{--<div style="width:100px;overflow: hidden;">{{$v ->goodsDes}}</div>--}}
                                                                                <div style="width:50px;">{{$v ->goodsDes}}</div>
                                                                            </td>
                                                                            <td rowspan="1"
                                                                                colspan="1">{{$v ->price}}</td>
                                                                            <td rowspan="1"
                                                                                colspan="1">{{$v->gpicinfo['count']}}</td>
                                                                            {{--<td rowspan="1" colspan="1">--}}
                                                                                {{--<a href="{{url('Admin/Goods/'.$v->uid)}}">--}}
                                                                                    {{--@if($v->fid != 0)--}}
                                                                                        {{--<button type="button"--}}
                                                                                                {{--class="cz bt btn btn-block btn-warning mouses">--}}
                                                                                            {{--{{$v->fishpond->fishpondname}}--}}
                                                                                            {{--鱼塘详情--}}
                                                                                        {{--</button>--}}
                                                                                    {{--@endif--}}

                                                                                {{--</a>--}}
                                                                            {{--</td>--}}
                                                                            <td rowspan="1" colspan="1">
                                                                                <a href="{{url('home/Det/list'.'/'.$v->gid)}}">
                                                                                    <button type="button"
                                                                                            class="cz bt btn btn-block btn-warning mouses">
                                                                                        详情
                                                                                    </button>
                                                                                </a>
                                                                            </td>
                                                                            <td rowspan="1" colspan="1">
                                                                                <button type="button"
                                                                                        value="{{$v->gid}}"
                                                                                        class="sj @if($v->gstatus == 2)sj btn btn-block btn-danger @elseif($v->gstatus == 1) sj btn btn-block btn-success @elseif($v->gstatus == 0)sj btn btn-block btn-warning @endif) "
                                                                                        name="{{$v->gstatus}}">
                                                                                    <font
                                                                                            style="vertical-align: inherit;"><font
                                                                                                style="vertical-align: inherit;">
                                                                                            @if($v->gstatus == 2)
                                                                                                下架
                                                                                            @elseif($v->gstatus == 1)
                                                                                                上架
                                                                                            @elseif($v->gstatus == 0)
                                                                                                新品
                                                                                            @endif
                                                                                        </font></font>
                                                                                </button>
                                                                            </td>
                                                                            <td style="position:relative" rowspan="1"
                                                                                colspan="1">

                                                                                <div style=" position:absolute; width:90%;">
                                                                                    <button type="button"
                                                                                            class="cz bt btn btn-block btn-warning mouses">
                                                                                        <font
                                                                                                style="vertical-align: inherit;z-index:-1;"><font
                                                                                                    style="vertical-align: inherit; z-index:-1; ">操作</font></font>
                                                                                    </button>

                                                                                    <div style="width: 100%; display:none; position:absolute;top:0px; "
                                                                                         class="mouse">
                                                                                        <button type="button"
                                                                                                class="cz bt btn btn-block btn-warning mouses">
                                                                                            <font
                                                                                                    style="vertical-align: inherit;z-index:-1;"><font
                                                                                                        style="vertical-align: inherit; z-index:-1; ">操作</font></font>
                                                                                        </button>

                                                                                        <button type="button"
                                                                                                class="cz btn btn-block btn-info margin:0px;">
                                                                                            <font
                                                                                                    style="vertical-align: inherit; z-index:100;"><font
                                                                                                        style="vertical-align: inherit;"><a
                                                                                                            href="{{url('home/fshop/'.$v->gid.'/edit')}}">
                                                                                                        修改</a></font></font>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="cz btn btn-block btn-danger margin:0px;">
                                                                                            <font
                                                                                                    style="vertical-align: inherit; z-index:100;"><font
                                                                                                        style="vertical-align: inherit;"><a
                                                                                                            href="javascript:;"
                                                                                                            onclick="del({{$v->gid}})">
                                                                                                        删除</a></font></font>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-sm-5">--}}
                                                                {{--<div class="dataTables_info" id="example1_info"--}}
                                                                     {{--role="status" aria-live="polite">--}}
                                                                    {{--商品详情展示--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-sm-7">--}}
                                                                {{--<div class="dataTables_paginate paging_simple_numbers"--}}
                                                                     {{--id="example1_paginate">--}}
                                                                    {{--<ul class="pagination">--}}

                                                                        {{--{!! $data->appends($request->all())->render() !!}--}}

                                                                    {{--</ul>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
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
                                {{--<script>alert($)</script>--}}
    <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
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

        });

        $(".sj").on('click', function () {
            var sj = $(this);
            var status = sj.attr('name');
            var gid = sj.val();
            if (status == 1) {
                sj.attr('name', 2);
            } else {
                sj.attr('name', 1);
            }
            var st = sj.attr('name');
            $.ajax({
                url: "{{url('home/Ajax')}}",
                data: {'gstatus': st, 'gid': gid, '_token': '{{csrf_token()}}'},
                type: 'post',
                success: function (data) {
                    if (data.err == 1) {
                        layer.msg(data.msg, {icon: 6});
                        location.href = location.href;
                    } else if (data.err == 2) {
                        //如果排序失败，提示排序失败
                        layer.msg(data.msg, {icon: 5});
                        location.href = location.href;
                    }
                }
            })
        });

        //=====================================================================
        function del(gid) {
            layer.confirm('您确定要删除吗？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('/home/fshop')}}/" + gid, {
                    "_method": "delete",
                    "_token": "{{csrf_token()}}"
                }, function (data) {
                    if (data.error == 0) {
                        console.log(data);
                        //console.log("错误信息"+res.msg);
                        layer.msg(data.msg, {icon: 5});
                        var t = setTimeout("location.href = location.href;", 1000);
                    } else {
                        layer.msg(data.msg, {icon: 6});
                        var t = setTimeout("location.href = location.href;", 1000);
                    }
                });
//                layer.msg('的确很重要', {icon: 1});
            }, function () {
                layer.msg('也可以这样', {
                    time: 2000, //20s后自动关闭
                    btn: ['明白了', '知道了']
                });
            });
        }
        var v;
        var mouse;
        $('.mouses').on('click', function () {
//            console.log(111);
            mouse = $(this);
            mouse.parent().find('div').css('display', 'block');
            mouse.parent().find('div').css('z-index', 1);
        });

        $('.mouse').mouseover(function () {
            $(this).css('display', 'block');
        });

        $('.mouse').mouseout(function () {
            $(this).css('display', 'none');
//            $(this).parent().find('div').css('z-index', -1);
        });

        {{--function details(id) {--}}
        {{--$.ajax({--}}
        {{--url: '{{asset('Admin/Goods').'/'}} + id',--}}
        {{--data: {id: id},--}}
        {{--type: 'get',--}}
        {{--success: function (data) {--}}
        {{--console.log(data);--}}
        {{--layer.open({--}}
        {{--type: 1,--}}
        {{--skin: 'layui-layer-rim', //加上边框--}}
        {{--area: ['520px', '640px'], //宽高--}}
        {{--content:""--}}

        {{--})--}}
        {{--},--}}
        {{--datatype: 'json',--}}

        {{--});--}}
        {{--}--}}
    </script>
@stop

