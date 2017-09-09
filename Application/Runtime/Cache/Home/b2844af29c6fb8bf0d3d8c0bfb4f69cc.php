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
	<div class="layui-tab-title" style="background:#f2f2f2;z-index:9999;width:100%;line-height:40px;position:fixed;top:6px;border-top:solid 2px #1AA094;">
		<i class="iconfont icon-diannao1" style="margin-left:15px;"></i>
		<span class="layui-breadcrumb" style="color:#fff;font-size:18px;">
		  <a href="/">运营</a>
		  <a href="/demo/">营销单页管理</a>
		  <a><cite class='change-text'>专题管理</cite></a>
		</span>
	</div>
	<section class="layui-larry-box" style="margin-top:20px;">
		<div class="larry-personal">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
				   <li class="site-demo-active layui-this">专题管理</li>
				</ul>
				<div class="layui-tab-content">
					<div class='layui-tab-item layui-show'>
						<div class="row" style="margin:0 0 20px">
							<div class="col-md-10" style="font-size:27px">添加专题</div>
							<div class="col-md-2" style="padding-right:0"><a href="<?php echo U('Special/index');?>" class="layui-btn" style="float:right">返回</a></div>
						</div>
							<fieldset class="layui-elem-field" style="padding-top:20px;font-size:16px;">
									<form class="layui-form" id="special-form" action="" >
										<div class="layui-form-item" style="width:500px;">
											<label class="layui-form-label" for="title"><span style="color:red;">*</span>标题：</label>
											<div class="layui-input-block">
												<input id="title" type="text" name="title"   placeholder="请输入20字以内的标题" autocomplete="off" class="layui-input">
											</div>
										</div>
										 
										  <div class="layui-form-item" pane="">
										    <label class="layui-form-label"><span style="color:red;">*</span>所属国家 :</label>
										    <div class="layui-input-block">
										      <input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" title="全部">
										      <?php if(is_array($country)): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="country_name[<?php echo ($vo["country_id"]); ?>]" value="<?php echo ($vo["country_name"]); ?>" lay-skin="primary"  title="<?php echo ($vo["country_name"]); ?>" ><?php endforeach; endif; else: echo "" ;endif; ?>
										    </div>
										  </div>
										  <div class="layui-form-item" pane="">
										    <label class="layui-form-label"><span style="color:red;">*</span>所属阶段 :</label>
										    <div class="layui-input-block">
										         <input type="checkbox" name="current_state[1]" value="准备留学" lay-skin="primary"  title="准备留学" >
										         <input type="checkbox" name="current_state[2]" value="留学中" lay-skin="primary"  title="留学中" >
										    </div>
										  </div>
										<!-- <div class="layui-form-item">
										    <label class="layui-form-label"><span style="color:red;">*</span>所属国家 :</label>
										    <div class="layui-input-block country">
										      <?php if(is_array($country)): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="radio" name="country_id" value="<?php echo ($vo["country_id"]); ?>" title="<?php echo ($vo["country_name"]); ?>" ><?php endforeach; endif; else: echo "" ;endif; ?>
										    </div>
										 </div>
										 <div class="layui-form-item">
										    <label class="layui-form-label"><span style="color:red;">*</span>所属阶段 :</label>
										    <div class="layui-input-block state">
										         <input type="radio" name="current_state" value="准备留学" title="准备留学" >
										         <input type="radio" name="current_state" value="留学中" title="留学中" >
										    </div>
										 </div> -->
										<div class="layui-form-item" style="width:500px;">
											<label class="layui-form-label" for="author"><span style="color:red;">*</span>创建者 :</label>
											<div class="layui-input-block">
												<input id="author" type="text" name="author" style="border:none;color:#FF6B5F;font-weight:bold;font-size:16px;" readonly="true" value="<?php echo ($username); ?>" autocomplete="off" class="layui-input">
											</div>
										</div>
										<div class="layui-form-item" style="width:98%;">
											<label class="layui-form-label" for="author"><span style="color:red;">*</span>正文 :</label>
											<div class="layui-input-block content">
												<div>
												   <textarea class="layui-textarea"  name="content" id="LAY_demo1" style="display: none"></textarea>
										        </div>
									        </div> 
										</div>
										<div class="layui-form-item">
											<div class="layui-input-block">
												<button  class="layui-btn  add-special" data-url="<?php echo U('Special/add');?>">保存</button>
												<button type="reset" class="layui-btn  layui-btn-primary">重置</button>
											</div>
										</div>
									</form>
							</fieldset>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="/static/common/layui/layui.js"></script>
	<script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.js"></script>
	<script type="text/javascript" src="/static/js/jquery.form.js"></script>
</body>
<script>
layui.use(['jquery','form','layedit','element'], function(){
	 var form = layui.form(),
	     layer = layui.layer,
	     element = layui.element(),
	     layedit = layui.layedit,
	     $ = layui.jquery;
     
	//监听表单全选
	  form.on('checkbox(allChoose)', function(data){
	    var child = $(data.elem).nextAll();
	    child.each(function(index, item){
	        item.checked = data.elem.checked;
	    }); 
	    form.render('checkbox');
	  });
	
	 //构建一个默认的编辑器
	 layedit.set({
		  uploadImage:{
			  url:"<?php echo U('Special/upload');?>",
			  type:'post',
		  }
	 })
	 var index = layedit.build('LAY_demo1');
	 
	//失去焦点的时候
	 $("#title").blur(function(){
	 	$(this).css("border","solid 1px #e6e6e6");
	 });

	 $(".add-special").click(function(){
		layedit.sync(index);
	 	var title = $('#title').val();
	 	var country_id = $('input[name="country_id"]:checked').val();
	 	var current_state = $('input[name="current_state"]:checked').val();
	 	var url = $(this).data('url');
	 	if(title == ''){
	 		layer.msg('标题不能为空',{icon:5});
	 		$('#title').css("border","solid 1px red");
	 		return false;
	 	}
	 	if(title.length > 20){
	 		layer.msg('标题必须在20字以内',{icon:5});
	 		$('#title').css("border","solid 1px red");
	 		return false;
	 	}
	 	
	 	/* if(!country_id){
	 		layer.msg('请选择所属国家',{icon:5});
	 		return false;
	 	}
	 	
	 	if(!current_state){
	 		layer.msg('请选择所属阶段',{icon:5});
	 		return false;
	 	} */
	 	var content = layedit.getContent(index);
	 	if(!content){
	 		layer.msg('正文内容不能为空',{icon:5});
	 		return false;
	 	}
	 	$("#special-form").ajaxSubmit({
	 		type:"POST",
	         url:url,
	         success: function (data) {
	             if(data.status > 0){
	             	layer.msg(data.msg,{icon:6});
	             	setInterval(function() {
	             		window.location.href = data.back_url;
	                 }, 2000);
	             }else{
	             	layer.alert(data.msg,{icon:5});
	             }
	         }
	 	});
	 	return false;
	 });
	 
});
</script>
</html>