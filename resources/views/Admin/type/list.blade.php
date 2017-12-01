@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <section class="content-header">
        <h1>分类管理</h1>
    </section>

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
                                        {{csrf_field()}}
                                        <th>类ID</th>
                                        <th>商品分类</th>
                                        <th>父ID</th>
                                        <th>路径</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                    @foreach($data as $k=>$v)
                                    <tr>
                                        <td>{{$v->tid}}</td>
                                        <td>{{$v->tname}}</td>
                                        <td>{{$v->pid}}</td>
                                        <td>{{$v->path}}</td>
                                        <td>
                                            <a href="#">修改</a>
                                            <a href="javascript:;" onclick="cateDel({{$v->cate_id}})">删除</a>
                                        </td>
                                    </tr>
                            @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection



@section('js')
    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
@stop