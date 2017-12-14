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
                                <h3 class="box-title">分类修改表</h3>

                                <ul>
                                    @if(session('msg'))
                                        <li style="color:red">{{session('msg')}}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="result_wrap">
                            <form action="{{url('Admin/Cate/list/'.$cate->cate_id)}}" method="post">
                                <table class="add_tab">
                                    <tbody>
                                    <tr>
                                        {{--token认证--}}
                                        {{csrf_field()}}
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        {{--提交方式为put--}}
                                        {{--{{method_field('put')}}--}}
                                        <input type="hidden" name="_method" value="put">
                                        <th><i class="require">*</i>分类名称：</th>
                                        <td>
                                            <input type="text" class="lg" name="cate_name" value="{{$cate->cate_name}}">
                                            {{--<p>标题可以写30个字</p>--}}
                                        </td>
                                    </tr>

                                    <tr>
                                        {{--token认证--}}
                                        {{csrf_field()}}
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        {{--提交方式为put--}}
                                        {{--{{method_field('put')}}--}}
                                        <input type="hidden" name="_method" value="put">
                                        <th><i class="require">*</i>关键字：</th>
                                        <td>
                                            <input type="text" class="lg" name="cate_keywords" value="{{$cate->cate_keywords}}">
                                            {{--<p>标题可以写30个字</p>--}}
                                        </td>
                                    </tr>

                                    <tr>
                                        {{--token认证--}}
                                        {{csrf_field()}}
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        {{--提交方式为put--}}
                                        {{--{{method_field('put')}}--}}
                                        <input type="hidden" name="_method" value="put">
                                        <th><i class="require">*</i>分类标题：</th>
                                        <td>
                                            <input type="text" class="lg" name="cate_title" value="{{$cate->cate_title}}">
                                            {{--<p>标题可以写30个字</p>--}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th></th>
                                        <td>

                                            {{--<input type="submit" value="提交">--}}
                                            <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                            <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                            {{--<input type="button" class="back" onclick="history.go(-1)" value="返回">--}}

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>




    </section>
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
