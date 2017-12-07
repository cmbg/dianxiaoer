@extends('Admin.Layouts.layout')

@section('content')
 
   <script src="{{asset('/Admin//bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 >
        前台用户管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">前台用户管理</a></li>
        <li class="active">列表</li>
      </ol>
    </section>       
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">前台用户列表,在这里显示前台所有用户</h3>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                <tr>
                  <th>ID序号</th>
                  <th>用户名</th>
                  <th>电话</th>
                  <th>邮箱</th>
                  <th>性别</th>
                  <th>头像</th>
                  <th>身份</th>
                  <th>状态</th>
                </tr>
                </thead>
                
                <tbody>   
                           
                <tr>
                  <td class="tc id">{{$user->uid}}</td>
                  <td class="tc">{{$user->uname}}</td>
                  <td class="tc award-name">{{$user->tel}}</td>
                  <td class="tc ">{{$user->email}}</td>
                  <td><?php
                              if ($user->sex == 'w'){
                                 echo '女';
                              } elseif ($user->sex == 'm'){
                                 echo '男';
                              } else {
                                 echo '保密';
                              }
                            ?>
                    </td>
                     <td class="tc "><img src="{{$user->avatar}}" style="width:80px;height:80px">
                   <td class="identitybtn">
                    @if($user->identity == '0')
                      <button type="button" class="btn bg-purple margin">普通用户</button>
                      @else
                      <button type="button" class="btn bg-olive btn-flat margin">鱼塘塘主</button>
                      @endif
                    </td>
                  <td class="statusBtn"> @if($user->status == '1')
                      <button type="button" class="btn bg-purple margin">已禁用</button>
                      @else
                      <button type="button" class="btn bg-olive btn-flat margin">已启用</button>
                      @endif
                  </td>
                </tr>
             
                </tbody>
                

              </table>
              <input type="button" class="back " onclick="history.go(-1)" value="返回">
            </div>
            <!-- /.box-body -->

          </div>
        
              

          <!-- /.box -->       
    </section>
    <!-- /.content -->
               <style>
                    table{table-layout: fixed;word-break: break-all; word-wrap: break-word; //表格固定布局}

                    .award-name{-o-text-overflow:ellipsis;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:100%; //超出部分显示省略号}

                </style>
               
      
       
@stop
@section('js')
   <script src="{{asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"</script>
<!-- DataTables -->
<script src="{{asset('/Admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"</script>
<script src="{{asset('/Admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"</script>
<!-- SlimScroll -->
<script src="{{asset('/Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"</script>
<!-- FastClick -->
<script src="{{asset('/Admin/bower_components/fastclick/lib/fastclick.js') }}"</script>
<!-- AdminLTE App -->
<script src="{{asset('/Admin/dist/js/adminlte.min.js') }}"</script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/Admin/dist/js/demo.js') }}"</script>
<!-- page script -->

<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
@stop
@section("homeuserinfoidentity")
    <script>
        $(".identitybtn").on('click', function () {
            var t = $(this);
            var id = $(this).parent().find('.id').html();
//            console.log(id);
            $.ajax(
                {
                    url: '/admin/homeuserindex/ajaxIdentity',
                    data: {id: id},
                    type: 'post',
                    success: function (data) {
                       console.log(data);
                        if (data.identity == 0) {
                            t.html('<button type="button" class="btn bg-purple margin">普通用户</button>');
                        } else {
                            t.html('<button type="button" class="btn bg-olive btn-flat margin">鱼塘塘主</button>');
                        }
                    },
                    error: function () {

                    },
                    dataType: 'json',
                }
            );
        })
    </script>
@stop
@section("homeuserinfostatus")
    <script>
        $(".statusBtn").on('click', function () {
            var t = $(this);
            var id = $(this).parent().find('.id').html();
//            console.log(id);
            $.ajax(
                {
                    url: '/admin/homeuserinfo/ajaxStatus',
                    data: {id: id},
                    type: 'post',
                    success: function (data) {
                       console.log(data);
                        if (data.status == 1) {
                            t.html('<button type="button" class="btn bg-purple margin">已禁用</button>');
                        } else {
                            t.html('<button type="button" class="btn bg-olive btn-flat margin">已启用</button>');
                        }
                    },
                    error: function () {

                    },
                    dataType: 'json',
                }
            );
        })
    </script>
@stop
