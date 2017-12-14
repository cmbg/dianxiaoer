@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            广告管理
            <small>编辑</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="#">广告管理</a></li>
            <li class="active">编辑</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <small class="box-title">广告管理,在这里你可以编辑修改.</small>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {{--<form action="{{url('/admin/ad/rev/')}}/{{$data->adv_id}}" method="post" role="form" enctype="multipart/form-data">--}}
                    <form action="{{url('/admin/ad')}}/{{$data->adv_id}}" method="post" role="form" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">客户信息</label>
                                <input type="text" name="acustomer" class="form-control" id="exampleInputName1" value="{{$data->acustomer}}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">标题</label>
                                <input type="text" name="atitle" class="form-control" id="exampleInputPhone1" value="{{$data->atitle}}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">跳转地址</label>
                                <input type="text" name="aurl" class="form-control" id="exampleInputPhone1" value="{{$data->aurl}}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">图片</label>
                                <input type="file" name="apic" id="exampleInputFile">
                                <p><img src="{{$data->apic}}" alt="老图片未上传" style="width:200px;height:62px"></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">投放位置</label>
                                <input name="posit" @if($data->posit == 1) checked @endif type="radio" value="1" />轮播图
                                <input name="posit"  @if($data->posit == 2) checked @endif type="radio" value="2" />下侧
                                <input name="posit"  @if($data->posit == 3) checked @endif type="radio"  value="3" />右一
                                <input name="posit" @if($data->posit == 4) checked @endif type="radio" value="4" />右二
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <button type="button" onclick="history.go(-1)"  class="btn btn-primary">返回</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
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