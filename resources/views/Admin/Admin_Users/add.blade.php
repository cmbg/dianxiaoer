@extends('Admin.Layouts.layout')

@section('content')

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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">用户管理，在这里您可以添加一些用户。</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->  
                        <form role="form" action="{{ url('/admin/user') }}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                            <div class="box-body">
                                             
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">用户名：</label>
                                    <input type="text" name="uname" value="" class="form-control" id="exampleInputEmail1" placeholder="请填入用户名">
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
                                    <input type="file" name="avatar" id="exampleInputFile">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
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
