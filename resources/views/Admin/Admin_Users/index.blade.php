@extends('Admin.Layouts.layout')

@section('content')
 
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 >
        用户管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">列表</li>
      </ol>
    </section>       
    <section>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">后台用户列表,在这里显示后台所有用户</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                <tr>
                  <th>ID序号</th>
                  <th>用户名</th>
                  <th>密码</th>
                  <th>性别</th>
                  <th>操作</th>
                </tr>
                </thead>
                
                <tbody>   
                @foreach($user as $k=>$v)             
                <tr>
                  <td class="tc">{{$v->uid}}</td>
                  <td class="tc">{{$v->uname}}</td>
                  <td class="tc award-name">{{$v->password}}</td>
                  <td>{{$v->sex}}</td>
                  <td>
                      <a href="#">详细</a>
                      <a href="#">修改</a>
                      <a href="#">删除</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="">
          </div>
          <div>
      
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


@stop
