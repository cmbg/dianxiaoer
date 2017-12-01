@extends('Admin.Layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            鱼塘管理
            <small>添加</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>主页</a></li>
            <li><a href="#">鱼塘管理</a></li>
            <li class="active">添加</li>
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
                        <h3 class="box-title">鱼塘管理,在这里你可以添加一些鱼塘.</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="/admin/fshop" method="post" role="form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">客户信息</label>
                                <input type="text" name="acustomer" class="form-control" id="exampleInputName1" value="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">标题</label>
                                <input type="text" name="atitle" class="form-control" id="exampleInputPhone1" value="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">跳转地址</label>
                                <input type="text" name="aurl" class="form-control" id="exampleInputPhone1" value="" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">图片</label>
                                <input type="file" name="apic" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">投放位置</label>
                                <input name="posit" type="radio" value="1" />左1
                                <input name="posit" type="radio" value="2" />左2
                                <input name="posit" type="radio" value="3" />左3
                                <input name="posit" type="radio" value="4" />左4
                                <input name="posit" type="radio" value="5" />轮播图
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

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@stop