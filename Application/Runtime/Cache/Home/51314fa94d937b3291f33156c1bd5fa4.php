<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>个人信息</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="/static/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/common/bootstrap/css/bootstrap.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/common/global.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/css/add.css" media="all">
</head>

<body>
	<div class="layui-tab-title" style="background:#f2f2f2;z-index:9999;width:100%;line-height:40px;position:fixed;top:6px;border-top:solid 2px #1AA094;">
		<i class="iconfont icon-diannao1" style="margin-left:15px;"></i>
		<span class="layui-breadcrumb" style="color:#fff;font-size:18px;">
		  <a href="/">用户</a>
		  <a href="/demo/">用户管理</a>
		  <a><cite class='change-text'>注册用户</cite></a>
		</span>
	</div>
	<section class="layui-larry-box" style="margin-top:20px;">
		<div class="larry-personal">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
				   <li class="site-demo-active layui-this">注册用户</li>
				   <!-- <li class="layui-this site-demo-active">认证用户</li> -->
				</ul>
				<div class="layui-tab-content">
					<div class='layui-tab-item layui-show'>
						<!-- 注册用户-->
						<div class="row" style="margin:0 0 20px">
							<div class="col-md-10" style="font-size:27px">添加注册用户</div>
							<div class="col-md-2" style="padding-right:0"><a href="<?php echo U('User/index');?>" class="layui-btn" style="float:right">返回</a></div>
						</div>
							<fieldset class="layui-elem-field" style="padding-top:20px;font-size:16px;">
								<div style="width:510px;margin-left:50px">
									<form class="layui-form" id="form1" action="">
										<div class="layui-form-item">
											<label class="layui-form-label" for="username"><span style="color:red;">*</span>昵称：</label>
											<div class="layui-input-block">
												<input id="username" type="text" name="username"  placeholder="请输入昵称" autocomplete="off" class="layui-input">
											</div>
										</div>
										<div class="layui-form-item">
											<label class="layui-form-label" for="email">邮箱：</label>
											<div class="layui-input-block">
												<input id="email" type="text" name="email"  placeholder="请输入用户常用邮箱" autocomplete="off" class="layui-input">
											</div>
										</div>
										<div class="layui-form-item">
											<label class="layui-form-label" for="weixin">微信号：</label>
											<div class="layui-input-block">
												<input id="weixin" type="text" name="weixin"  autocomplete="off" class="layui-input">
											</div>
										</div>
										<div class="layui-form-item">
											<label class="layui-form-label" style="float:none;">上传头像：</label>
											<div class="site-demo-upload">
												<img id="LAY_demo_upload" src="/static/images/user.jpg">
											</div>
											<div class="site-demo-upbar layui-box layui-upload-button">
												<input type="file" accept="image/*" name="file" class="layui-upload-file" id="avatar">
												<span class="layui-upload-icon"><i class="layui-icon"></i>上传图片</span>
											</div>
										</div>
										<div class="layui-form-item">
											<label class="layui-form-label" >初始密码：</label>
											<div class="layui-input-block">
												<input  type="text" style="border:none;color:#FF6B5F;font-weight:bold;font-size:16px;" name="password" readonly value="tiandao2017@edu.com"  class="layui-input">
											</div>
										</div>
										<div class="layui-form-item">
											<div class="layui-input-block">
												<button class="layui-btn add-user" data-url="<?php echo U('User/add');?>">保存</button>
												<button type="reset" class="layui-btn  layui-btn-primary">重置</button>
											</div>
										</div>
									</form>
								</div>
							</fieldset>
					</div>
				</div>	
			</div>
		</div>
	</section>
	<script type="text/javascript" src="/static/js/data.js"></script>
	<script type="text/javascript" src="/static/common/layui/layui.js"></script>
	<script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.js"></script>
    <script type="text/javascript" src="/static/js/user/add.js"></script>
	<script type="text/javascript" src="/static/js/jquery.form.js"></script>
</body>

</html>