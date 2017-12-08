@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            订单管理
            <small>编辑</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="#">订单管理</a></li>
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
                        <h3 class="box-title">订单管理,在这里你可以对订单编辑修改.</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{url('/admin/order'.'/'.$data->oid)}}" method="post" role="form" enctype="multipart/form-data">
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
                                <label for="exampleInputPassword1">收货人</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{$data->name}}"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">收货人电话</label>
                                <input type="text" name="tel" class="form-control" id="exampleInputPhone1" value="{{$data->tel}}"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">收货地址</label>
                                {{--<input type="text" name="lurl" class="form-control" id="exampleInputPhone1" value="{{$data->lurl}}"--}}
                                       {{--placeholder="">--}}
                                <textarea name="add">{{$data->add}}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">确认提交</button>
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

@section('linksupdatelimg')
    <script type="text/javascript">
        $(function () {
            $("#file_upload").change(function () {
                $('#img1').show();
                uploadImage();
            });
        });

        function uploadImage() {
            // 判断是否有选择上传文件
            var imgPath = $("#file_upload").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }
            //  var formData = new FormData($('#art_form')[0]);
            var formData = new FormData();
            formData.append('file_upload', $('#file_upload')[0].files[0]);
            formData.append('_token', "{{csrf_token()}}");
            $.ajax({
                type: "POST",
                url: "/admin/links/editlimg",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
//                    console.log(data);
//                    $('#img1').attr('src', '/uploads/' + data);
//                  $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
//                  $('#img1').attr('src','http://project193.oss-cn-beijing.aliyuncs.com/'+data);
                    $('#img1').attr('src',data);
                    $('#img1').show();
                    $('#art_thumb').val(data);
//                  $('#art_thumb').val('/uploads/' + data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }
    </script>
@stop