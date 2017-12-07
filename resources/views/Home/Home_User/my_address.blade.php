@extends('Home.Layout.layout')
@section('body')
<body class="page woocommerce-account woocommerce-page woocommerce-edit-address">
@stop
@section('content')
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
												<li class="is-active">
													<a href="{{url('home/my_account')}}">个人信息</a>
												</li>
												
												<li >
												   <a href="{{url('home/my_password')}}">修改密码</a>
												</li>
												
												<li>
													<a href="{{url('home/my_address')}}">地址</a>
												</li>
												
												<li>
												   <a href="http://demo.smartaddons.com/templates/html/etrostore/account_details.html">账户详细资料</a>
												</li>
												
												<li>
													<a href="create_account.html">退出</a>
												</li>
											</ul>
										</nav>
									  
										<div class="woocommerce-MyAccount-content">
											<p>
												以下地址默认会在结帐页面上使用。
											</p>
											
											<div class="u-column1 col-1 woocommerce-Address addresses">
												<header class="woocommerce-Address-title title">
													<h3>账单地址</h3>
													<a href="address_billing_details.html" class="edit">编辑</a>
												</header>
												
												<address>
													永久地址<br/>
													Thomas Nolan Kaszas II<br/>
													5322 Otter Lane<br/>
													Middleberge FL 32068<br/>
												</address>
											</div>
											
											<div class="u-column1 col-1 woocommerce-Address addresses">
												<header class="woocommerce-Address-title title">
													<h3>邮寄地址</h3>
													<a href="address_shipping_details.html" class="edit">编辑</a>
												</header>
												
												<address>
													永久地址<br/>
													Thomas Nolan Kaszas II<br/>
													5322 Otter Lane<br/>
													Middleberge FL 32068<br/>
												</address>
											</div>
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