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
</head>
<body>
<section >
   	<table class="table" style="font-size:14px;">
        <tbody>
        	<tr><td><b>用户ID</b>： <?php echo ($data["uid"]); ?></td></tr>
        	<tr><td><b>昵称</b>： <?php echo ($data["nickname"]); ?></td></tr>
        	<tr><td><b>手机号</b>：<?php echo ($data["phone"]); ?></td></tr>
        	<tr><td><b>邮箱</b>： <?php echo ($data["email"]); ?></td></tr>
        	<tr><td><b>微信号</b>： <?php echo ($data["weixin"]); ?></td></tr>
        	<tr><td><b>当前状态</b>：<?php echo ($data["current_state"]); ?></td></tr>
        	<tr><td><b>所获学位</b>： <?php echo ($data["edu"]); ?></td></tr>
        	<tr><td><b>就读院校</b>：<?php echo ($data["school_name"]); ?></td></tr>
        	<tr><td><b>就读专业</b>：<?php echo ($data["major_cat"]); ?>-<?php echo ($data["major_name"]); ?></td></tr>
        	<tr><td><b>所在地</b>： <?php echo ($data["province"]); ?>-<?php echo ($data["city"]); ?>-<?php echo ($data["area"]); ?></td></tr>
        	<tr><td><b>注册时间</b>:<?php echo (date("Y-m-d H:i:s",$data["reg_time"])); ?></td></tr>
        	<tr><td><b>最近登录时间</b>：<?php echo (date("Y-m-d H:i:s",$data["last_time"])); ?></td></tr>
        </tbody>
	</table>
</section>
</body>
</html>