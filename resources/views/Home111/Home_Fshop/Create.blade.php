@extends('Home.Layout.layout')

@section('content')
    @include('Home.Layout.nve')
    <div class="container float wpb_column vc_column_container vc_col-sm-12" style="height:50px">
    </div>
    <div class="container float wpb_column vc_column_container vc_col-sm-12">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">

                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6 ">
                            <div class="box-header with-border" >
                                <div class="box-title" style="margin:10px 0px">
                                    <h3>某某某,您好,请添加鱼塘商品.</h3>
                                </div>
                            </div>
                            <form action="/home/fshop" method="post" role="form" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" ><h4>商品分类</h4></label>
                                        <input type="text" name="acustomer" class="form-control" id="exampleInputName1"
                                               value="" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" ><h4>商品名称</h4></label>
                                        <input type="text" name="acustomer" class="form-control" id="exampleInputName1"
                                               value="" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" ><h4>商品价格</h4></label>
                                        <input type="text" name="acustomer" class="form-control" id="exampleInputName1"
                                               value="" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" ><h4>商品照片</h4></label>
                                        <input type="file" name="acustomer" class="form-control" id="exampleInputName1"
                                               value="" placeholder="">
                                    </div>       
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" ><h4>商品描述</h4></label>
                                        <textarea class="form-control" name="acustomer" id="exampleInputName1" ></textarea>
                                    </div>                            
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">添加</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <div class="container float wpb_column vc_column_container vc_col-sm-12" style="height:80px">
    </div>
@stop