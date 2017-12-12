<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="{{asset('/home/css/amazeui.min.css')}}" />
		<link href="{{asset('home/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
		<script src="{{asset('home/js/jquery.min.js')}}"></script>
		<script src="{{asset('home/js/amazeui.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="{{url('home/images/logobig.png')}}" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="{{url('home/images/big.jpg')}}" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
						<form method="post" action="{{url('emailregister')}}">
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
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="text" name="email" id="email" placeholder="请输入邮箱">
               					</div>										
            					<div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="设置密码">
                				 </div>										
                 					<div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="re_password" id="passwordRepeat" placeholder="确认密码">
               						  </div>	
										<div class="am-cf">
											<input type="submit" name=""  id="open"

											value="邮箱注册" class="am-btn am-btn-primary am-btn-sm am-fl">
											

											<input type="button" class="am-btn am-btn am-btn-sm am-fl back " onclick="history.go(-1)" value="返回">
										</div>
 								</form	>	
								</div>

								<div class="am-tab-panel">
									<form method="post" action="{{url('phoneregisters')}}">
									{{csrf_field()}}
								

								
                				 <div class="user-phone">
								    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="tel" name="tel" id="phone" placeholder="请输入手机号">
               					  </div>																			
										<div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="text" name="code" id="code" placeholder="请输入验证码">

											<a class="btn" href="javascript:;" onclick="sendcode();" id="sendMobileCode">
												<span id="dyMobileButton">获取</span></a>
										</div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="user_pass" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码">
                 </div>	
									
								 
										<div class="am-cf">
											<input type="submit" name="" value="手机注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										<input type="button" class="am-btn am-btn am-btn-sm am-fl back " onclick="history.go(-1)" value="返回">
										</div>
								</form>
									<hr>
								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs('open',$('.am-tab-panel').eq({{session('id')}}) );
									  })
								</script>

							</div>
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
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
							</p>
						</div>
					</div>
					<script>
		function sendcode(){
//		    1. 获取要发送的手机号
			$phone = $('[name="tel"]').val();
			// alert($phone);

//			2. 向服务器的发送短信的接口发送ajax请求

			$.post("{{url('sendcode')}}",{'phone':$phone,'_token':'{{csrf_token()}}'},function(data){
				console.log(data);

				var obj = JSON.parse(data);
				if(obj.status == 0){
					// dd(1111);
                    layer.msg(obj.message, {icon: 6,area: ['100px', '80px']});

				}else{
                    layer.msg(obj.message, {icon: 5,area: ['100px', '80px']});
				}


			})
		}
	
	</script>
	</body>

</html>