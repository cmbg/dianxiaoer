@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            导航栏管理
            <small>编辑</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="#">导航栏管理</a></li>
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
                        <h3 class="box-title">导航栏管理,在这里你可以编辑修改.</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="/admin/ad/update" method="post" role="form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <input type="hidden" name="adv_id" value="{{$data->adv_id}}" >
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
                                <label for="exampleInputPassword1">投放位置</label>
                                <input name="posit"  @if($data->posit == 1) checked @endif type="radio" value="1" />左1
                                <input name="posit"  type="radio" @if($data->posit == 2) checked @endif  value="2" />左2
                                <input name="posit" @if($data->posit == 3) checked @endif type="radio" value="3" />左3
                                <input name="posit" @if($data->posit == 4) checked @endif type="radio" value="4" />左4
                                <input name="posit" @if($data->posit == 5) checked @endif type="radio" value="5" />轮播图
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