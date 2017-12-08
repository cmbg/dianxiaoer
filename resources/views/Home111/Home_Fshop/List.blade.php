@extends('Home.Layout.layout')


@section('content')
    @include('Home.Layout.nve')
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
                            <table class="layui-table">
                                <thead>
                                <tr>
                                    <th>人物</th>
                                    <th>民族</th>
                                    <th>出场时间</th>
                                    <th>格言</th>
                                    <th>格言</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>贤心</td>
                                    <td>汉族</td>
                                    <td>1989-10-14</td>
                                    <td>人生似修行</td>
                                    <td>人生似修行</td>
                                    <td>编辑 删除</td>
                                </tr>

                                </tbody>
                            </table>
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