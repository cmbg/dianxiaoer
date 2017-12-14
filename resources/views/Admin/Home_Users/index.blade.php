@extends('Admin.Layouts.layout')

@section('content')
 
    <script src="{{asset('/Admin//bower_components/jquery/dist/jquery.min.js') }}"></script>
    <section class="content-header">
      <h1 >
        前台用户管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{url('admin/homeuser')}}">前台用户管理</a></li>
        <li class="active">列表</li>
      </ol>
    </section>       
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">前台用户列表,在这里显示前台所有用户</h3>
            </div>
            <form action="{{url('admin/homeuser')}}" method="get">
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
                      <th width="70" class="tc">电话号:</th>
                    <td><input type="text" name="keywords2" value="{{$request->keywords2}}" placeholder="电话号"></td>
                     <th>
                        用户身份：
                        <select name="identity">
                            <option value="普通用户"
                              @if($request['identity'] == '普通用户')  selected  @endif
                            >普通用户
                            </option>
                            <option value="鱼塘塘主"
                              @if($request['identity'] == '鱼塘塘主')  selected  @endif
                            >鱼塘塘主
                            </option>
                        </select>
                    </th>
                    <td  ><input type="submit"  value="查询" class="btn btn-primary"></td>
                    <td><input type="button" class="btn btn-primary" value="清空查找条件" onclick="location='homeuser'"/></td>
                    </tr>
                </table>
            </form>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                <tr>
                  <th >ID序号</th>
                  <th>用户名</th>
                  <th>电话</th>
                  <th>性别</th>
                  <th>身份</th>
                  <th>操作</th>
                </tr>
                </thead>
                
                <tbody>   
                @foreach($user as $k=>$v)             
                <tr>
                  <td class="tc id">{{$v->uid}}</td>
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
                    <td class="identitybtn">
                    @if($v->identity == '1')
                      <button type="button" class="btn bg-purple margin">普通用户</button>
                      @else
                      <button type="button" class="btn bg-olive btn-flat margin">鱼塘塘主</button>
                      @endif
                    </td>
                  <td>
                      <a href="{{url('admin/homeuser'.'/'.$v->uid)}}">详细</a>
                      <a href="{{url('admin/homeuser/'.$v->uid.'/edit')}}">修改</a>
                      <a href="javascript:;" onclick="userDel({{$v->uid}})">删除</a>
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
          
          <input type="button" class="btn btn-primary" value="添加用户" onclick="location='homeuser/create'"/>
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
                btn: ['确认','取消'] 
            }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                $.post("{{url('admin/homeuser')}}/"+uid,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
//                    data是json格式的字符串，在js中如何将一个json字符串变成json对象
//                    删除成功
                   if(data.error == 0){
                       layer.msg(data.msg, {icon: 6});
                       var t=setTimeout("location.href = location.href;",2000);
                   }else{
                       layer.msg(data.msg, {icon: 5});

                       var t=setTimeout("location.href = location.href;",2000);
                   }


                });


            }, function(){

            });
        }
        
    </script>
@stop
@section('js')
   <script src="{{asset('/Admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{asset('/Admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('/Admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{asset('/Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('/Admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/Admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/Admin/dist/js/demo.js') }}"></script>
<!-- page script -->

<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
@stop
@section("homeuserinfoidentity")
    <script>
        $(".identitybtn").on('click', function () {
            var t = $(this);
            var id = $(this).parent().find('.id').html();
            $.ajax(
                {
                    url: '/admin/homeuserindex/ajaxIdentity',
                    data: {id: id},
                    type: 'post',
                    success: function (data) {
                       console.log(data);
                        if (data.identity == 1) {
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