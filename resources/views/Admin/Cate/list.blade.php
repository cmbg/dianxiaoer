@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <section class="content-header">
        <h1>分类管理</h1>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <ul>
                @if(session('msg'))
                    <li style="color:red">{{session('msg')}}</li>
                @endif
            </ul>
        </div>
            {{--<div class="col-xs-12">--}}
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">分类信息表</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">排序</th>
                                        <th>ID</th>
                                        <th>分类名称</th>
                                        <th>标题</th>
                                        <th>关键字</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cates as $k=>$v)
                                    <tr>
                                        <td>
                                            <input type="text" onchange="changeOrder(this,{{$v->cate_id}})" value="{{$v->cate_order}}">
                                        </td>
                                        <td>{{$v->cate_id}}</td>
                                        <td>{{$v->cate_names}}</td>
                                        <td>{{$v->cate_title}}</td>
                                        <td>{{$v->cate_keywords}}</td>
                                        <td>
                                            <a href="{{url('Admin/Cate/list/'.$v->cate_id.'/edit')}}">修改</a>

                                            <a href="javascript:;"onclick="cateDel({{$v->cate_id}})">删除</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>

                            <input type="button" class="btn btn-primary" value="添加分类" onclick="location='/Admin/Cate/list/create'"/>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
    </section>
    <!-- /.content -->


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
    <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
@stop

@section('ajax');
    <script>
    //排序
        function changeOrder(obj, cate_id){
            var cate_order = $(obj).val();
//            console.log(cate_order);
            $.ajax({
                url:"{{url('Admin/Cate/changeorder')}}",
                data:{'cate_order':cate_order,"cate_id":cate_id},
                type:'post',
                success:function(data){
                    if(data.status == 0){
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
                }
            })
        }



        {{--function changeOrder(obj,cate_id){--}}
            {{--//获取当前需要排序的记录的ID,cate_id--}}
            {{--//获取当前记录的排序文本框中的值--}}
            {{--var cate_order = $(obj).val();--}}
            {{--$.post("{{url('Admin/Cate/changeorder')}}",{'_token':"{{csrf_token()}}","cate_id":cate_id,"cate_order":cate_order},function(data){--}}
                {{--//如果排序成功，提示排序成功--}}
                {{--if(data.status == 0){--}}

                    {{--layer.msg(data.msg,{icon: 6});--}}
                    {{--location.href = location.href;--}}
                {{--}else{--}}
                    {{--//如果排序失败，提示排序失败--}}
                    {{--layer.msg(data.msg,{icon: 5});--}}
                    {{--location.href = location.href;--}}
                {{--}--}}
            {{--})--}}

        {{--}--}}

    function cateDel(cate_id) {

        //询问框
        layer.confirm('您确认删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
            //admin/user/1
            $.post("{{url('Admin/Cate/list')}}/"+cate_id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
//                alert(data);
//
//                    删除成功
                if(data.error == 0){

                    layer.msg(data.msg, {icon: 5});
//
                    var t=setTimeout("location.href = location.href;",1000);
                }else{
                    layer.msg(data.msg, {icon: 6});

                    var t=setTimeout("location.href = location.href;",1000);

                }


            });


        }, function(){

        });
    }
    </script>

@stop