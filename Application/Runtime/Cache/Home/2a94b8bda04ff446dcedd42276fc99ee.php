<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>留学服务管理后台</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<!-- load css -->
	<link rel="stylesheet" type="text/css" href="/static/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/common/global.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/css/adminstyle.css" media="all">
</head>

<body>
	<div class="layui-layout layui-layout-admin" id="layui_layout">
		<!-- 顶部区域 -->
		<div class="layui-header header">
			<div class="layui-main">
				<!-- logo区域 -->
				<div class="admin-logo-box">
					<a class="logo" href="javascript:;" title="logo" style="color:#fff;margin-top:8px;font-size:20px;font-weight:bold;">留学服务管理系统</a>
					<div class="larry-side-menu">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</div>
				</div>
				<!-- 右侧导航 -->

				<ul class="layui-nav larry-header-item">
					<li class="layui-nav-item">
						<a href="javascript:;" class="chage-passwd" data-url="<?php echo U('Admin/changepwd');?>"><i class="iconfont icon-jiaoseguanli"></i>修改密码</a>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;" id="lock"><i class="iconfont icon-diannao1"></i>锁屏</a>
					</li>
					<li class="layui-nav-item">
						<a href="<?php echo U('Admin/loginOut');?>">
                       <i class="iconfont icon-exit"></i>
					退出</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 左侧侧边导航开始 -->
		<div class="layui-side layui-side-bg layui-larry-side" id="larry-side">
			<div class="layui-side-scroll" id="larry-nav-side">
				<div class="user-photo">
					<a class="img" title="我的头像">
					<img src="/static/images/user.jpg" class="userimg1"></a>
					<p>你好！<span style="font-weight:bold;font-size:16px;color:#FF6B5F;"><?php echo ($username); ?></span>, 欢迎登录</p>
				</div>
				<!-- 左侧菜单 -->
				<ul class="layui-nav layui-nav-tree" lay-filter="side">
					<!-- 用户信息 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-jiaoseguanli" ></i>
							<span>用户</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;" data-url="<?php echo U('User/index');?>">
                            <i class="iconfont icon-geren1" data-icon='icon-geren1'></i>
                            <span>用户管理</span>
                        </a>
							</dd>
							<!-- <dd>
								<a href="javascript:;" data-url="changepwd.html">
		                            <i class="iconfont icon-iconfuzhi01" data-icon='icon-iconfuzhi01'></i>
		                            <span>登陆日志</span>
                                 </a>
							</dd> -->
						</dl>
					</li>
					<!-- 运营 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-yumingguanli" data-icon='icon-yumingguanli'></i>
							<span>运营</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;" data-url="<?php echo U('Special/index');?>">
									<i class="iconfont icon-shengchengbaogao" ></i>
									<span>营销单页管理</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="<?php echo U('Adlocation/index');?>">
									<i class="iconfont icon-word" data-icon='icon-word'></i>
									<span>广告位管理</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="<?php echo U('Consult/index');?>">
									<i class="iconfont icon-pinglun1" data-icon='icon-pinglun1'></i>
									<span>咨询管理</span>
								</a>
							</dd>
							<dd>
								<a href="javascript:;" data-url="<?php echo U('Address/index');?>">
									<i class="iconfont icon-pinglun1" data-icon='icon-pinglun1'></i>
									<span>地址管理</span>
								</a>
							</dd>							
							<!-- <dd>
								<a href="javascript:;" data-url="changepwd.html">
									<i class="iconfont icon-database" data-icon='icon-database'></i>
									<span>数据统计</span>
								</a>
							</dd> -->
						</dl>
					</li>
					<!-- 产品 -->
					<li class="layui-nav-item">
						<a href="javascript:;">
							<i class="iconfont icon-wenzhang1" ></i>
							<span>产品</span>
							<em class="layui-nav-more"></em>
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;" data-url="<?php echo U('Offer/index');?>">
									<i class="iconfont icon-pinglun1" data-icon='icon-pinglun1'></i>
									<span>案例库</span>
								</a>
							</dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>

		<!-- 左侧侧边导航结束 -->
		<!-- 右侧主体内容 -->
		<div class="layui-body" id="larry-body" style="bottom: 0;border-left: solid 2px #1AA094;">
			<!-- 下面class的值class="layui-tab-card larry-tab-box" -->
			<div id="larry-tab" lay-filter="demo" lay-allowclose="true">
				<div class="layui-tab-content" style="min-height: 150px;">
					<div class="layui-tab-item layui-show">
						<iframe class="larry-iframe" data-id='0' style="min-width:1300px;" src="<?php echo U('Index/main');?>"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 加载js文件-->
	<script type="text/javascript" src="/static/common/layui/layui.js"></script>
	<script type="text/javascript" src="/static/js/larry.js"></script>
	<script type="text/javascript" src="/static/js/index.js"></script>
	<!-- 锁屏 -->
	<div class="lock-screen" style="display: none;">
		<div id="locker" class="lock-wrapper">
			<div id="time"></div>
			<div class="lock-box center">
				<img src="/static/images/user.jpg" style="width:100px;height:100px;margin-bottom:10px;">
				<h1><?php echo ($username); ?></h1>
				<div class="form-group col-lg-12">
					<input type="password" placeholder='锁屏状态，请输入密码解锁' id="lock_password" class="form-control lock-input" autofocus name="lock_password">
					<button id="unlock" class="layui-btn btn-lock" data-username="<?php echo ($username); ?>" data-url="<?php echo U('Admin/login');?>" style="">解锁</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 菜单控件 -->
	<!-- <div class="larry-tab-menu">
	<span class="layui-btn larry-test">刷新</span>
</div> -->
	<!-- iframe框架刷新操作 -->
	<!-- <div id="refresh_iframe" class="layui-btn refresh_iframe">刷新</div> -->
</body>

</html>