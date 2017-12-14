@extends('Home.Layout.layout')
@section('body')
<body class="page woocommerce-account woocommerce-page woocommerce-edit-account">

@stop
@section('content')

		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>我的账户</h1>
					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="home_page_1.html">主页</a>
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
												
												<li class="is-active">
												   <a href="{{url('home/my_password')}}">修改密码</a>
												</li>
												
												<li>
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
									<form class="edit-account" action="{{url('home/domy_password')}}" method="post">
										{{csrf_field()}}
											@if (count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
										@if(is_object($errors))
										@foreach ($errors->all() as $error)
											<li style="color:red">{{ $error }}</li>
										@endforeach
										@else
											<li style="color:red">{{ $errors }}</li>
										@endif
										</ul>
									</div>
								@endif
										<fieldset>
											<legend>修改密码</legend>
											<p class="form-row form-row-wide">
												<label for="password_current">登录密码</label>
												<input type="password" class="input-text" name="old_password" id="password_current" />
											</p>
											
											<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
												<label for="password_1">新密码</label>
												<input type="password" class="input-text" name="new_password" id="password_1" />
											</p>
											
											<p class="form-row form-row-wide">
												<label for="password_2">重复新密码</label>
												<input type="password" class="input-text" name="re_password" id="password_2" />
											</p>
										</fieldset>
										
										<div class="clear"></div>
										<p>
											<input type="submit" class="button" name="save_account_details" value="确认修改" />
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
		
@stop