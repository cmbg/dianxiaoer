@extends('Admin.Layouts.layout')

@section('content')

    <section class="content-header">
        <h1>
            商品管理页
            <small>商品的详情</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="#">商品管理</a></li>
            <li class="active">商品</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">这里是所有的商品</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">


                            <form action="{{url('/Admin/Goods')}}" method="get">
                                <div class="col-sm-3">
                                    <div class="dataTables_length" id="example1_length"><label> 查看 <select
                                                    name="num" aria-controls="example1"
                                                    class="form-control input-sm">
                                                <option value="">|-- 请选择 --|</option>
                                                >
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
                                            </select> 条 </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div id="example1_filter" class="dataTables_filter"><label>查找 : <input
                                                    type="search" name="gname" class="form-control input-sm"
                                                    placeholder=""
                                                    aria-controls="example1" value="{{$request->gname}}"></label>
                                    </div>
                                </div>
                                <button class="col-sm-2">查找</button>
                            </form>


                            {{--<div class="col-sm-2">--}}
                            {{--<div class="dataTables_length" id="px"><label> 排序 <select--}}
                            {{--name="px" aria-controls="example1"--}}
                            {{--class="px form-control input-sm">--}}

                            {{--<option value="0" @if($request['sx'] == 0) selected @endif>正序</option>--}}

                            {{--<option value="1" @if($request['sx'] == 1) selected @endif>倒序</option>--}}


                            {{--</select>  </label></div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="row">

                            <table id="example1" class="table table-bordered table-striped dataTable"
                                   role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 182px;">编号:
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending"
                                        style="width: 224px;"> 商品名称:
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 199px;">简介(图片):
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1"
                                        aria-label="Engine version: activate to sort column ascending"
                                        style="width: 156px;">类别:
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 112px;">库存:
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 112px;">定价:
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 112px;">销量:
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 112px;">上架时间:
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 112px;">状态:
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 112px;"> 操作:
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>

                                @foreach($goods as $v)
                                    <tr>
                                        <td rowspan="1" colspan="1">{{ $v->gid }} {{ $request['sx'] }} </td>
                                        <td rowspan="1" colspan="1">{{$v -> gname}}</td>
                                        <td rowspan="1" colspan="1"><img src="{{url('/upload').'/'.$v->pic }}">
                                        </td>
                                        <td rowspan="1" colspan="1">{{ $v -> goodsDes }}</td>
                                        <td rowspan="1" colspan="1">{{$v ->goodsNum}}</td>
                                        <td rowspan="1" colspan="1">{{$v ->price}}</td>
                                        <td rowspan="1" colspan="1">{{$v-> gid}}</td>
                                        <td width="100" rowspan="1" colspan="1">{{date('Y-m-d H:i:s')}}</td>
                                        <td rowspan="1" colspan="1">
                                            <button type="button" value="{{$v->gid}}"
                                                    class="sj @if($v->gstatus == 2)sj btn btn-block btn-danger @elseif($v->gstatus == 1) sj btn btn-block btn-success @elseif($v->gstatus == 0)sj btn btn-block btn-warning @endif) "
                                                    name="{{$v->gstatus}}">
                                                <font
                                                        style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">
                                                        @if($v->gstatus == 2) 下架 @elseif($v->gstatus == 1) 上架 @elseif($v->gstatus == 0)新品 @endif
                                                    </font></font>
                                            </button>
                                        </td>
                                        <td style="position:relative"  rowspan="1"
                                            colspan="1">


                                            {{--<button type="button"  onclick="yr( this )"  class="cz bt btn btn-block btn-success"><font--}}
                                            {{--style="vertical-align: inherit;z-index:-1;"><font--}}
                                            {{--style="vertical-align: inherit; z-index:-1; ">操作</font></font>--}}
                                            {{--</button>--}}

                                            <div style=" position:absolute;"  >
                                                <button type="button" class="cz bt btn btn-block btn-warning mouses">
                                                    <font
                                                            style="vertical-align: inherit;z-index:-1;"><font
                                                                style="vertical-align: inherit; z-index:-1; ">操作</font></font>
                                                </button>
                                                <div style="width: 100%; display:none; position:absolute;top:0px; " class="mouse">
                                                    <button type="button" class="cz bt btn btn-block btn-warning mouses">
                                                        <font
                                                                style="vertical-align: inherit;z-index:-1;"><font
                                                                    style="vertical-align: inherit; z-index:-1; ">操作</font></font>
                                                    </button>
                                                    <button type="button"
                                                            class="cz btn btn-block btn-info margin:0px;"><font
                                                                style="vertical-align: inherit; z-index:100;"><font
                                                                    style="vertical-align: inherit;"><a href="{{url('Admin/Goods/'.$v->gid.'/edit')}}"> 修改</a></font></font>
                                                    </button>
                                                    <button  type="button"
                                                            class="cz btn btn-block btn-danger margin:0px;"><font
                                                                style="vertical-align: inherit; z-index:100;"><font
                                                                    style="vertical-align: inherit;"><a href="javascript:;" onclick="del({{$v->gid}})" >
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
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                Showing 1 to 10 of 57 entries
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button previous disabled" id="example1_previous"><a
                                                href="#" aria-controls="example1" data-dt-idx="0"
                                                tabindex="0">Previous</a>
                                    </li>
                                    <li class="paginate_button active"><a href="#" aria-controls="example1"
                                                                          data-dt-idx="1" tabindex="0">1</a>
                                    </li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                    data-dt-idx="2" tabindex="0">2</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                    data-dt-idx="3" tabindex="0">3</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                    data-dt-idx="4" tabindex="0">4</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                    data-dt-idx="5" tabindex="0">5</a></li>
                                    <li class="paginate_button "><a href="#" aria-controls="example1"
                                                                    data-dt-idx="6" tabindex="0">6</a></li>
                                    <li class="paginate_button next" id="example1_next"><a href="#"></li>
                                </ul>
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
@stop

@section('js')
    <script src="{{ asset('/Admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ asset('/Admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/Admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('/Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/Admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/Admin/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/Admin/dist/js/demo.js')}}"></script>
    <!-- page script -->


@stop




@section('ajax')
    <script>
        $(".sj").on('click', function () {

            var sj = $(this);
            var status = sj.attr('name');
            var gid = sj.val();
            if (status == 1) {
                sj.attr('name', 2);
            } else {
                sj.attr('name', 1);
            }
            var st = sj.attr('name')
            $.ajax({
                url: "{{url('Admin/Ajax')}}",
                data: {'gstatus': st, 'gid': gid},
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
        })

//=====================================================================
        function del(gid){
            $.post("{{url('/Admin/Goods')}}/"+gid ,{"_method" : "delete","_token":"{{csrf_token()}}"})

        }



        var v;
        var mouse
        $('.mouses').on('click',function() {
//            console.log(111);
            mouse = $(this);
            mouse.parent().find('div').css('display','block');
            mouse.parent().find('div').css('z-index', 1);

        });

        $('.mouse').mouseover(function(){
            $(this).css('display', 'block');
        })

        $('.mouse').mouseout(function () {

            $(this).css('display', 'none');
//            $(this).parent().find('div').css('z-index', -1);
        });

    </script>
@stop