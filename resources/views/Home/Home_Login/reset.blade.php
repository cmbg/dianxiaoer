<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<!-- <link rel="stylesheet" href="{{asset('home/css/amazeui.min.css')}}"/> -->
		<link rel="stylesheet" href="{{asset('home/css/amazeui.min.css')}}"/>
		<link href="{{asset('home/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="{{url('home/images/logobig.png')}}" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="{{url('home/images/big.jpg')}}" /></div>
				<div class="login-box">

							<h3 class="title">修改密码</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  <form action="{{url('doreset')}}" method="post" >
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
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="email" id="user" value="{{$uname}}" placeholder="请输入要找回的账号">
                		 		</div>
     							<div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="请输入密码">
			                	 </div>
			              		<div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="re_password" id="password" placeholder="请确认输入密码">
			                	 </div>
			           </div>
            
            <div class="login-links">
          
								
								<br />
            </div>
								<div class="am-cf">
									<input type="submit" name="" value="确认修改密码" class="am-btn am-btn-primary am-btn-sm">
								</div>
								</form>
					

				</div>
			</div>
		</div>


					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 dianxiaoer.com 版权所有. 更多商品 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家"></a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank"></a></em>
							</p>
						</div>
					</div>
	</body>

</html>