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
                            <div class="result_wrap">
                                <form action="{{url('Admin/Cate/list')}}" method="post">
                                    <table class="add_tab">
                                        {{csrf_field()}}

                                        <tr>
                                            <th width="120"><i class="require">*</i>父级分类：</th>
                                            <td>
                                                <select name="cate_pid">
                                                    <option value="0">==顶级分类==</option>
                                                    @foreach($cateOne as $k=>$v)
                                                        <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th><i class="require">*</i>分类名称：</th>
                                            <td>
                                                <input type="text" name="cate_name">
                                                <span><i class="fa fa-exclamation-circle yellow"></i>分类名称必须填写</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>分类标题：</th>
                                            <td>
                                                <input type="text" class="lg" name="cate_title">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>关键词：</th>
                                            <td>
                                                <textarea name="cate_keywords"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>描述：</th>
                                            <td>
                                                <textarea name="cate_description"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th><i class="require">*</i>排序：</th>
                                            <td>
                                                <input type="text" class="sm" name="cate_order">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>

                                                <input type="submit" value="提交">
                                                <input type="button" class="back" onclick="history.go(-1)" value="返回">
                                            </td>

                                        </tr>


                                    </table>

                                </form>


                            </div>




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