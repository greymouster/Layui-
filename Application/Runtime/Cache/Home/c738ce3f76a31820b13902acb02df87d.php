<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留学服务管理系统后台</title>
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<!-- load css -->
	<link rel="stylesheet" type="text/css" href="/static/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/css/login.css" media="all">
</head>
<body>
<div class="layui-canvs"></div>
<div class="layui-layout layui-layout-login">
	<h1>
		 <strong>留学服务管理系统后台</strong>
		 <em>Study Abroad Service </em>
	</h1>
	<div class="layui-user-icon larry-login">
		 <input type="text" name="username" placeholder="账号" class="login_txtbx"/>
	</div>
	<div class="layui-pwd-icon larry-login">
		 <input type="password" name="password" placeholder="密码" class="login_txtbx"/>
	</div>
    <div class="layui-submit larry-login">
    	<input type="button" value="立即登陆" data-url="<?php echo U('Admin/login');?>" class="submit_btn"/>
    </div>
    <div class="layui-login-text">
    	<p>© 2017 天道教育</p>
        <p><a href="#" title="">tiandaoedu.com</a></p>
    </div>
</div>
<script type="text/javascript" src="/static/common/layui/lay/dest/layui.all.js"></script>
<script type="text/javascript" src="/static/js/login/login.js"></script>
<script type="text/javascript" src="/static/common/jsplug/jparticle.jquery.js"></script>
</body>
</html></html>