@extends('Admin.Layouts.layout')

@section('content')
 
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 >
        后台用户管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{url('admin/adminuser')}}">后台用户管理</a></li>
        <li class="active">列表</li>
      </ol>
    </section>       
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">后台用户列表,在这里显示后台所有用户</h3>
                @if(session('info'))
                    <small class="tishi"><span class="text-red">{{session('info')}}</span></small>
                @endif
            </div>
            <form action="{{url('admin/adminuser')}}" method="get">
                <table class="search_tab">
                    <tr>
                    <th style="width:50px;"></th>
                    <th>
                        每页条数：
                        <select name="num">
                            <option value="5"
                              @if($request['num'] == 5)  selected  @endif
                            >5
                            </option>
                            <option value="10"
                              @if($request['num'] == 10)  selected  @endif
                            >10
                            </option>
                        </select>
                    </th>
                    <th width="70" class="tc">用户名:</th>
                    <td><input type="text" name="keywords1" value="{{$request->keywords1}}" placeholder="用户名"></td>
                    <th width="50" class="tc">电话:</th>
                    <td><input type="text" name="keywords2" value="{{$request->keywords2}}" placeholder="电话号"></td>
                    <th>
                        用户身份：
                        <select name="identity">
                            <option value="普通管理员"
                              @if($request['identity'] == '普通管理员')  selected  @endif
                            >普通管理员
                            </option>
                            <option value="超级管理员"
                              @if($request['identity'] == '超级管理员')  selected  @endif
                            >超级管理员
                            </option>
                        </select>
                    </th>
                    <td  ><input type="submit"  value="查询" class="btn btn-primary"></td>
                   <td><input type="button" class="btn btn-primary" value="清空查找条件" onclick="location='adminuser'"/></td>
                    </tr>
                </table>
            </form>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                <tr>
                  <th>ID序号</th>
                  <th>用户名</th>
                  <th>电话</th>
                  <th>性别</th>
                  <th>操作</th>
                </tr>
                </thead>
                
                <tbody>   
                @foreach($user as $k=>$v)             
                <tr>
                  <td class="tc">{{$v->uid}}</td>
                  <td class="tc">{{$v->uname}}</td>
                  <td class="tc award-name">{{$v->tel}}</td>
                  <td><?php
                              if ($v->sex == 'w'){
                                 echo '女';
                              } elseif ($v->sex == 'm'){
                                 echo '男';
                              } else {
                                 echo '保密';
                              }
                            ?>
                    </td>
                    <td><?php
                              if ($v->identity == '1'){
                                 echo '超级管理员';
                              } else if($v->identity == '0') {
                                 echo '普通管理员';
                              } 
                            ?>
                    </td>

                  <td>
                      <a href="{{url('admin/adminuser'.'/'.$v->uid)}}">详细</a>
                      <a href="{{url('admin/adminuser/'.$v->uid.'/edit')}}">修改</a>
                      <a href="javascript:;" onclick="userDel({{$v->uid}})">删除</a>
                      <a href="{{url('admin/adminuser/auth'.'/'.$v->uid)}}" >授予角色</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                

              </table>
            </div>

            <!-- /.box-body -->

          </div>
          
         
          <div>
                
              <div class="page_list">
              {!! $user->appends($request->all())->render() !!}
            </div>
          </div>          
          
          <input type="button" class="btn btn-primary" value="添加用户" onclick="location='adminuser/create'"/>
          
          <!-- /.box -->       
    </section>
    <!-- /.content -->
               <style>
                    table{table-layout: fixed;word-break: break-all; word-wrap: break-word; //表格固定布局}

                    .award-name{-o-text-overflow:ellipsis;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:100%; //超出部分显示省略号}

                </style>
                 <script>
        
        function userDel(uid) {

            //询问框
            layer.confirm('您确认删除吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                //admin/user/1
                $.post("{{url('admin/adminuser')}}/"+uid,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                    //alert(data);
//                    data是json格式的字符串，在js中如何将一个json字符串变成json对象
                   //var res =  JSON.parse(data);
//                    删除成功
                   if(data.error == 0){
                       //console.log("错误号"+res.error);
                       //console.log("错误信息"+res.msg);
                       layer.msg(data.msg, {icon: 6});
//                       location.href = location.href;
                       var t=setTimeout("location.href = location.href;",2000);
                   }else{
                       layer.msg(data.msg, {icon: 5});

                       var t=setTimeout("location.href = location.href;",2000);
                       //location.href = location.href;
                   }


                });


            }, function(){

            });
        }
        
    </script>
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
   <script>
       $(".tishi   ").fadeOut(2000);
   </script>
@stop
