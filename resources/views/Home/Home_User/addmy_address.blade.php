@extends('Home.Layout.layout')
@section('body')
<body class="page woocommerce-account woocommerce-page woocommerce-edit-address">
@stop
@section('content')
<style type="text/css">
body{ background:#EEEEEE;margin:0; padding:0; font-family:"微软雅黑", Arial, Helvetica, sans-serif; }
a{ color:#006600; text-decoration:none;}
a:hover{color:#990000;}
.top{ margin:5px auto; color:#990000; text-align:left;}
.info select{ border:1px #993300 solid; background:#FFFFFF;}
.info{ margin:5px; text-align:left;}
.info #show{ color:#3399FF; }
.bottom{ text-align:right; font-size:12px; color:#CCCCCC; width:1000px;}
</style>
	<script src="{{asset('/Home/js/area.js') }}"></script>
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
													<a href="{{url('home/fshop')}}">我的鱼塘</a>
												</li>
												
												
												<li>
													<a href="{{url('home/logout')}}">退出</a>
												</li>
											</ul>
										</nav>
									  
										<div class="woocommerce-MyAccount-content">
											<form method="post" action="{{url('home/address')}}">
											{{csrf_field()}}
												<h3>账单地址</h3>
												<p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
													<label for="billing_first_name">
														姓名:
														<abbr class="required" title="required">*</abbr>
													</label>
													<input type="text" class="input-text " name="name" id="billing_first_name" placeholder="请填写收货人姓名" autocomplete="given-name" value="" />
												</p>
												<div class="clear"></div>
												<p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
													<label for="billing_phone">
														电话:
														<abbr class="required" title="required">*</abbr>
													</label>
													<input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="请填写收货人手机号" autocomplete="tel" value="" />
												</p>
												<div class="clear"></div>
												<p class="form-row form-row address-field validate-required form-row-last" id="billing_city_field" data-o_class="form-row form-row form-row-wide address-field validate-required">
													<label for="billing_city">
														城市:
														<abbr class="required" title="required">*</abbr>
													</label>
													<div class="top">

													</div>
											<div class="info">
												<div>
												<select id="s_province" name="s_province"></select>  
											    <select id="s_city" name="s_city" ></select>  
											    
											    <select id="s_county" name="s_county"></select>
											    <script type="text/javascript">_init_area();</script>
											    </div>
										<div id="show"></div>
																	</div>
									<script type="text/javascript">
									var Gid  = document.getElementById ;
									var showArea = function(){
										Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" + 	
										Gid('s_city').value + " - 县/区" + 
										Gid('s_county').value + "</h3>"
																}
									Gid('s_county').setAttribute('name','showArea()');
									</script>
												</p>

												<p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
													<label for="billing_address_1">
														详细地址: 
														<abbr class="required" title="required">*</abbr>
													</label>
													
													<input type="text" class="input-text " name="address" id="billing_address_1" placeholder="请填写收货地址" autocomplete="address-line1" value="" />
												</p>
												
												<div class="clear"></div>
												
												<p>
													<input type="submit" class="button" name="save_address" value="保存地址" />
													<input type="button" class="back " onclick="history.go(-1)" value="返回">
												</p>
										   </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
@stop