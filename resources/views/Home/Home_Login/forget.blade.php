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
		<script src="{{asset('home/js/jquery.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="{{url('home/images/logobig.png')}}" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="{{url('home/images/big.jpg')}}" /></div>
				<div class="login-box">

							<h3 class="title">忘记密码</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  <form action="{{url('doforget')}}" method="post" >
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
								    <input type="text" name="email" id="user" value="" placeholder="请输入要找回账号的邮箱">
                		 		</div>
     							
			           </div>
            
            <div class="login-links">
          
								
								<br />
            </div>
								<div class="am-cf">
									<input type="submit" name="" value="立即找回" onclick="tishi()" class="am-btn am-btn-primary am-btn-sm">
									<input type="button" class="am-btn am-btn am-btn-sm am-fl back " onclick="history.go(-1)" value="返回">
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
					<script>
		
		function tishi(){
		layer.open({
			  type: 1
			  ,offset: 't' //具体配置参考：offset参数项
			  ,content: '<div style="padding: 20px 80px;">请您进入您的登录邮箱进行确认</div>'
			  ,btn: '关闭全部'
			  ,btnAlign: 'c' //按钮居中
			  ,shade: 0 //不显示遮罩
			  ,yes: function(){
			    layer.closeAll();
			  }
			});
	}
	</script>
	</body>

</html>