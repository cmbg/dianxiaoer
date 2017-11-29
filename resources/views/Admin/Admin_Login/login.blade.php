<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('admin/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>DianXiaoEr</h1>
		<h2>欢迎来到店小二管理平台</h2>
		<div class="form">
			<p style="color:red"></p>
			<form action="{{url('admin/dologin')}}" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="uname" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						{{--<img src="{{url('admin/yzm')}}" onclick="this.src='{{url('admin/yzm')}}?'+Math.random()" alt="">--}}
						<a onclick="javascript:re_captcha();">
							<img src="{{ URL('/code/captcha/1') }}" id="127ddf0de5a04167a9e427d883690ff6">
						</a>
						<script type="text/javascript">
                            function re_captcha() {
                                $url = "{{ URL('/code/captcha') }}";
                                $url = $url + "/" + Math.random();
                                document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
                            }
						</script>

					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.itxdl.cn" target="_blank">http://www.itxdl.cn</a></p>
		</div>
	</div>
</body>
</html>