@extends('Admin.Layouts.layout')

@section('content')
 <script src="{{asset('/Admin//bower_components/jquery/dist/jquery.min.js') }}"></script>
    <section class="content-header">
            <h1>
                前台用户管理
                <small>修改</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="{{url('admin/homeuser')}}">前台用户管理</a></li>
                <li class="active">修改</li>
            </ol>
        </section>
    <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">前台用户管理，在这里您可以修改一些前台用户。</h3>
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
                        <form role="form" action="{{url('admin/homeuser/'.$user->uid)}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="put">
                            <div class="box-body">
                                             
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">用户名：</label>
                                    <input type="text" name="uname" value="{{$user->uname}}" class="form-control" id="exampleInputEmail1" placeholder="请填入用户名">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">性别：</label>
                                    <select name="sex" id="">
                                        
                                         <option value="">全部</option>
                                        <option value="w" @if($user->sex == 'w') selected @endif>女</option>
                                         <option value="m"  @if($user->sex == 'm') selected @endif>男</option>
                                        <option value="x">保密</option>
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">邮箱：</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="请填入邮箱">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">手机号：</label>
                                    <input type="text" name="tel" value="{{$user->tel}}" class="form-control" id="exampleInputEmail1" placeholder="请输入手机号">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">头像：</label>
                                    <input type="text" size="50" id="art_thumb" name="avatar" value="{{$user->avatar}}">
                                    <input id="file_upload" name="file_upload[]" type="file" multiple >
                                    <br>
                                     <img src="{{$user->avatar}}" id="img1" alt="" style="width:80px;height:80px">
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
                                            // console.log(formData);
                                            $.ajax({
                                                type: "POST",
                                                url: "{{asset('/admin/homeupload')}}",
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
                                <button type="submit" class="btn btn-primary">确认修改</button>
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
