@extends('Home.Layout.layout')
@section('body')
<body class="page woocommerce-account woocommerce-page woocommerce-edit-address">
@stop
@section('content')

 <script src="{{asset('/Admin//bower_components/jquery/dist/jquery.min.js') }}"></script>
	<div class="body-wrapper theme-clearfix">
		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>我的账户</h1>
					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="#">主页</a>
										<span class="go-page"></span>
									</li>
									
									<li class="active">
										<span>我的账户</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>
		
		<div class="container">
			<div class="row">
				<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="post-6 page type-page status-publish hentry">
						<div class="entry">
							<div class="entry-content">
								<header>
									<h2 class="entry-title">我的账户</h2>
								</header>
								
								<div class="entry-content">
									<div class="woocommerce">
										<nav class="woocommerce-MyAccount-navigation">
											<ul>
												<li >
													<a href="{{url('home/my_account')}}">个人信息</a>
												</li>
												
												<li >
												   <a href="{{url('home/my_password')}}">修改密码</a>
												</li>
												
												<li class="is-active">
													<a href="{{url('home/address')}}">地址</a>
												</li>
												
												
												
												<li>
													<a href="{{url('home/logout')}}">退出</a>
												</li>
											</ul>
										</nav>
									  
										<div class="woocommerce-MyAccount-content">
											<!-- <p>
												以下地址默认会在结帐页面上使用。
											</p>
 -->										
											<div class="u-column1 col-1 woocommerce-Address addresses">
												<header class="woocommerce-Address-title title">
													<h3>收货地址</h3>
													<a href="{{url('home/address/create')}}" class="edit">添加</a>
													<br>
													<a href="{{url('home/address/'.$arr['id'].'/edit')}}" class="edit">编辑</a>
												</header>
												
												<address>
													默认地址:<br/>
													收货人:{{$arr['name']}}<br/>
													收货电话:{{$arr['phone']}}<br/>
													收货地址:{{$arr['address']}}<br/>
												</address>
											</div>
											@foreach ($address as $k=>$v)
											<div class="u-column1 col-1 woocommerce-Address addresses">
												<header class="woocommerce-Address-title title">
													<h3>邮寄地址</h3>
													<a href="{{url('home/address/create')}}" class="edit">添加</a>
													<br>
													<a href="{{url('home/address/'.$v['id'].'/edit')}}" class="edit">编辑</a>
													<br>
													<a href="javascript:;" onclick="userDel({{$v['id']}})" class="edit">删除</a>
													<a href="{{url('home/address/moren/'.$v['id'])}}" class="edit">设为默认地址</a>
												</header>
												
												<address>
													地址:<br/>
													收货人:{{$v['name']}}<br/>
													收货电话:{{$v['phone']}}<br/>
													收货地址:{{$v['address']}}<br/>
												</address>
											</div>
											@endforeach

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
		 <script>
        
        function userDel(id) {

            //询问框
            layer.confirm('您确认删除吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                //admin/user/1
                $.post("{{url('home/address')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                    //alert(data);
//                    data是json格式的字符串，在js中如何将一个json字符串变成json对象
                   //var res =  JSON.parse(data);
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