@extends('Home.Layout.layout')
@section('body')
<body class="page woocommerce-account woocommerce-page">

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
												<li class="is-active">
													<a href="{{url('home/my_account')}}">个人信息</a>
												</li>
												
												<li >
												   <a href="{{url('home/my_password')}}">修改密码</a>
												</li>
												
												<li>
													<a href="{{url('home/address')}}">地址</a>
												</li>
												
												
												
												<li>
													<a href="{{url('home/logout')}}">退出</a>
												</li>
											</ul>
										</nav>
									  
										<div class="woocommerce-MyAccount-content">

									<form class="edit-account" action="{{ url('/home/my_account') }}" method="post" enctype="multipart/form-data">
									
									      {{csrf_field()}}
										<p class="form-row form-row-first">
											<label for="account_first_name">
												用户昵称: 
												<span class="required">*</span>
											</label>
											<input type="text" class="input-text" name="nickname" id="account_first_name" value="{{ Session::get('user')['nickname'] }}" />
										</p>
										   <div class="form-group">
		                                    <label for="exampleInputEmail1">性别：</label>
		                                    <select name="sex" id="">
	                                        	<option value="">全部</option>
	                                        	<option value="w" @if (Session::get('user')['sex'] == 'w') selected @endif >女</option>
	                                        	<option value="m" @if (Session::get('user')['sex'] == 'm') selected @endif >男</option>
                                        		<option value="x" @if (Session::get('user')['sex'] == 'x') selected @endif >保密</option>
                                    </select>
                              		  </div>
										<p class="form-row form-row-last">
											<label for="account_last_name">
												电话 
												<span class="required">*</span>
											</label>
											<input type="text" class="input-text" name="tel" id="account_last_name" value="{{ Session::get('user')['tel'] }}" placeholder="请输入手机号" />
										</p>
										
									  <div class="clear"></div>
									  
										<p class="form-row form-row-wide">
											<label for="account_email">
												邮箱: 
												<span class="required">*</span>
											</label>
											
											<input type="email" class="input-text" name="email" id="account_email" value="{{ Session::get('user')['email'] }}" />
										</p>
							    <div class="form-group">
                                    <label for="exampleInputFile">头像：</label>
                                    <input type="text" size="50" id="art_thumb" name="avatar" value="{{ Session::get('user')['avatar'] }}">
                                    <input id="file_upload" name="file_upload[]" type="file" multiple >
                                    <br>
                                     <img src="{{ Session::get('user')['avatar'] }}" id="img1" alt="" style="width:80px;height:80px">
                                     <script type="text/javascript">
                                          $(function () {
                                            $("#file_upload").change(function () {

                                                $('img1').show();
                                                uploadImage();
                                            });
                                        });
                                        function uploadImage() {
                                            // 判断是否有选择上传文件
                                            var imgPath = $("#file_upload").val();
                                            if (imgPath == "") {
                                                alert("请选择上传图片！");
                                                return;
                                            }
                                            //判断上传文件的后缀名
                                            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                            if (strExtension != 'jpg' && strExtension != 'gif'
                                                && strExtension != 'png' && strExtension != 'bmp') {
                                                alert("请选择图片文件");
                                                return;
                                            }
                                            // var formData = new FormData($('#art_form')[0]);
                                            

                                            var formData = new FormData();
                                            formData.append('file_upload', $('#file_upload')[0].files[0]);
                                            formData.append('_token', "{{csrf_token()}}");
                                            console.log(formData);
                                            $.ajax({
                                                type: "POST",
                                                url: "/home/upload",
                                                data: formData,
                                                async: true, //是否为同步异步 true 异步
                                                cache: false, //缓存
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    $('#img1').attr('src','/uploads/'+data);
                                                   // $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
                                                   // $('#img1').attr('src','http://project193.oss-cn-beijing.aliyuncs.com/'+data);
                                                    $('#img1').show();
                                                    $('#art_thumb').val('/uploads/'+data);
                                                },
                                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                    alert("上传失败，请检查网络后重试");
                                                }
                                            });
                                        }
                                        </script>
                                </div>
										
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
			</div>
		</div>
		
@stop