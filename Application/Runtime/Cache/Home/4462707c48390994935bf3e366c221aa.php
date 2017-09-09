<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>天道留学服务后台首页</title>
  <meta name="renderer" content="webkit"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black"> 
  <meta name="apple-mobile-web-app-capable" content="yes">  
  <meta name="format-detection" content="telephone=no"> 
	<link rel="stylesheet" type="text/css" href="/static/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/common/bootstrap/css/bootstrap.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/common/global.css">
	<link rel="stylesheet" type="text/css" href="/static/css/main.css" media="all">
</head>
<body>
<div class="layui-tab-title" style="background:#f2f2f2;z-index:9999;width:100%;line-height:40px;position:fixed;top:6px;border-top:solid 2px #1AA094;">
    <i class="iconfont icon-diannao1" style="margin-left:15px;"></i>
    <span class="layui-breadcrumb" style="color:#fff;font-size:18px;">
		  <a href="javascript:;">后台首页</a>
	</span>
  </div>
<section class="larry-wrapper" style="margin-top:40px;">
    <!-- overview -->
	<div class="row state-overview">
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol userblue"> <i class="iconpx-users"></i>
				</div>
				<div class="value">
					<a href="#">
						<h1 id="count1"><?php echo ($userCount); ?></h1>
					</a>
					<p>用户总量</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol commred"> <i class="iconpx-user-add"></i>
				</div>
				<div class="value">
					<a href="#">
						<h1 id="count2"><?php echo ($registerCount); ?></h1>
					</a>
					<p>今日注册用户</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol articlegreen">
					<i class="iconpx-file-word-o"></i>
				</div>
				<div class="value">
					<a href="#">
						<h1 id="count3"><?php echo ($articleCount); ?></h1>
					</a>
					<p>案例库文章总数</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol rsswet">
					<i class="iconpx-check-circle"></i>
				</div>
				<div class="value">
					<a href="#">
						<h1 id="count4"><?php echo ($specialCount); ?></h1>
					</a>
					<p>专题总数</p>
				</div>
			</section>
		</div>
	</div>
	<!-- overview end -->
	<div class="row">
		<div class="col-lg-12" style="font-size:16px;">
			<section class="panel">
				<header class="panel-heading bm0">
					<span class='span-title'>系统概览</span>
					<span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
				</header>
				<div class="panel-body" >
					<table class="table table-hover personal-task">
                         <tbody>
                         	<tr>
                         		<td>
                         			<strong>版本信息</strong>: 天道留学服务系统-V1.0
                         		</td>
                         		<td>

                         		</td>
                         	</tr>
                         	<tr>
                         		<td>
                                     <strong>服务器环境</strong>:<?php echo $_SERVER ['SERVER_SOFTWARE'] ?>
                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                     <strong>操作系统</strong>:<?php echo PHP_OS ?>
                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                   <strong>网站域名</strong>:<?php echo $_SERVER['HTTP_HOST']?>
                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                <strong>服务器IP</strong>:<?php echo $_SERVER["SERVER_ADDR"] ?>
                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                     <strong>服务器端口</strong>:<?php echo $_SERVER['SERVER_PORT'] ?>
                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                <strong>服务器语言</strong>:<?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']?>
                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                <strong>服务器CPU数量</strong>:<?php echo $_SERVER['PROCESSOR_IDENTIFIER']?>
                                </td>
                                <td></td>
                         	</tr>
                         	
                         	<tr>
                         		<td>
                                <strong>最大上传限制</strong>：<?php echo ini_get('upload_max_filesize')?>

                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                <strong>通信协议</strong>：<?php echo $_SERVER['SERVER_PROTOCOL']?>

                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                <strong>ThinkPHP框架版本</strong>：<?php echo THINK_VERSION?>

                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                <strong>最大执行时间</strong>：<?PHP echo get_cfg_var("max_execution_time") ?>秒

                                </td>
                                <td></td>
                         	</tr>
                         	
                         	<tr>
                         		<td>
                                <strong>脚本运行占用最大内存</strong>：<?php  echo get_cfg_var ("memory_limit")?>

                                </td>
                                <td></td>
                         	</tr>
                         	<tr>
                         		<td>
                                <strong>当前登录用户</strong>： <span class="current_user"><?php echo $_SESSION['user_name']?></span>

                                </td>
                                <td></td>
                         	</tr>
                         </tbody>
					</table>
				</div>
			</section>
     
		</div>
	</div>

</section>

<script type="text/javascript" src="/static/common/layui/layui.js"></script>
<script type="text/javascript">
	layui.use(['jquery','layer','element'],function(){
		window.jQuery = window.$ = layui.jquery;
		window.layer = layui.layer;
        window.element = layui.element();
	});
</script>
</body>
</html>