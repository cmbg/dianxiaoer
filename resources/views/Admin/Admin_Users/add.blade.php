@extends('Admin.Layouts.layout')

@section('content')
     <script src="{{asset('/Admin//bower_components/jquery/dist/jquery.min.js') }}"></script>
    <section class="content-header">
            <h1>
                用户管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">用户管理</a></li>
                <li class="active">添加</li>
            </ol>
        </section>
    <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">用户管理，在这里您可以添加一些用户。</h3>
                                @if (count($errors) > 0)
                              <ul>
                                  @if(is_object($errors))
                                    @foreach ($errors->all() as $error)
                                      <li style="color:red">{{ $error }}</li>
                                    @endforeach
                                  @else
                                      <li style="color:red">{{ $errors }}</li>
                                  @endif
                              </ul>
                                  @endif
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->  
                        <form  id="art_form" role="form" action="{{ url('/admin/adminuser') }}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                            <div class="box-body">
                                             
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">用户名：</label>
                                    <input type="text" name="uname" value="" class="form-control" id="exampleInputEmail1" placeholder="请填入用户名">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">性别：</label>
                                    <select name="sex" id="">
                                        <option value="">全部</option>
                                        <option value="w">女</option>
                                        <option value="m">男</option>
                                        <option value="x">保密</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">邮箱：</label>
                                    <input type="email" name="email" value="" class="form-control" id="exampleInputEmail1" placeholder="请填入邮箱">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">手机号：</label>
                                    <input type="text" name="tel" value="" class="form-control" id="exampleInputEmail1" placeholder="请输入手机号">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">密码：</label>
                                    <input type="password" name="password" value="" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">确认密码：</label>
                                    <input type="password" name="re_password" value="" class="form-control" id="exampleInputPassword1" placeholder="请保证两次密码输入一致">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">头像：</label>
                                    <input type="text" size="50" id="art_thumb" name="art_thumb">
                                    <input id="file_upload" name="file_upload[]" type="file" multiple >
                                    <br>
                                     <img src="" id="img1" alt="" style="width:80px;height:80px">
                                     <script type="text/javascript">
                                          $(function () {
                                            $("#file_upload").change(function () {

                                                $('img1').show();
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
                                            // var formData = new FormData($('#art_form')[0]);
                                            

                                            var formData = new FormData();
                                            formData.append('file_upload', $('#file_upload')[0].files[0]);
                                            formData.append('_token', "{{csrf_token()}}");
                                            console.log(formData);
                                            $.ajax({
                                                type: "POST",
                                                url: "/admin/upload",
                                                data: formData,
                                                async: true, //是否为同步异步 true 异步
                                                cache: false, //缓存
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    $('#img1').attr('src','/uploads/'+data);
                                                   // $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
                                                   // $('#img1').attr('src','http://project193.oss-cn-beijing.aliyuncs.com/'+data);
                                                    $('#img1').show();
                                                    $('#art_thumb').val('/uploads/'+data);
                                                },
                                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                    alert("上传失败，请检查网络后重试");
                                                }
                                            });
                                        }
                                        </script>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                                <input type="button" class="back " onclick="history.go(-1)" value="返回">
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->
            </div>
            <!-- /.row -->
        </section>
        
    
    
@stop
@section('js')
   
    <script src="{{asset('/Admin//bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('/Admin//bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{asset('/Admin//bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/Admin//dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/Admin//dist/js/demo.js') }}"></script>

@stop
