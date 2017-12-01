@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <section class="content-header">
        <h1>分类管理</h1>
    </section>

    <ul>
        @if(session('msg'))
            <li style="color:red">{{session('msg')}}</li>
        @endif
    </ul>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">分类信息表</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">排序</th>
                                        <th>ID</th>
                                        <th>分类名称</th>
                                        <th>标题</th>
                                        <th>查看次数</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cates as $k=>$v)
                                    <tr>
                                        <td>
                                            <input type="text" onchange="changeOrder(this,{{$v->cate_id}})" value="{{$v->cate_order}}">
                                        </td>
                                        <td>{{$v->cate_id}}</td>
                                        <td>{{$v->cate_names}}</td>
                                        <td>{{$v->cate_title}}</td>
                                        <td>{{$v->cate_view}}</td>
                                        <td>
                                            <a href="#">修改</a>
                                            <a href="javascript:;" onclick="delCate(2)">删除</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
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


@endsection



@section('js')
    <!-- jQuery 3 -->
    <script src="{{asset('/Admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('/Admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/Admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('/Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/Admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/Admin/dist/js/adminlte.min.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/Admin/dist/js/demo.js')}}"></script>
@stop

@section('ajax');
    <script>

        function changeOrder(obj, cate_id){
            var cate_order = $(obj).val();
//            console.log(cate_order);
            $.ajax({
                url:"{{url('Admin/Cate/changeorder')}}",
                data:{'cate_order':cate_order,"cate_id":cate_id},
                type:'post',
                success:function(data){
                    if(data.status == 0){
                        //console.log("错误号"+res.error);
                        //console.log("错误信息"+res.msg);
                        layer.msg(data.msg, {icon: 6});
//                       location.href = location.href;
                        var t=setTimeout("location.href = location.href;",2000);
                    }else{
                        layer.msg(data.msg, {icon: 5});

                        var t=setTimeout("location.href = location.href;",2000);
                        //location.href = location.href;
                    }
                }
            })
        }
    </script>

@stop