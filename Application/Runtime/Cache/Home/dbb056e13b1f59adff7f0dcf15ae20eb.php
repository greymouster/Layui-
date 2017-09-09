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
		  <a href="/">运营</a>
		  <a href="<?php echo U('Adlocation/index');?>">广告位管理</a>
		  <a><cite class='change-text'>添加广告位</cite></a>
		</span>
	</div>
	<section class="layui-larry-box" style="margin-top:20px;">
		<div class="larry-personal">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
				   
				      <li class="site-demo-active layui-this">
				          <?php if(I('get.type') != 1): ?>添加广告位
				           <?php else: ?>
				                                 修改广告位<?php endif; ?>
				      </li>
				   
				</ul>
				<div class="layui-tab-content">
					<div class='layui-tab-item layui-show'>
						<div class="row" style="margin:0 0 20px">
							<div class="col-md-10" style="font-size:27px">
							  <?php if(I('get.type') != 1): ?>添加广告位
					           <?php else: ?>
					                                 修改广告位<?php endif; ?>
							</div>
							<div class="col-md-2" style="padding-right:0"><a href="<?php echo U('Adlocation/index');?>" class="layui-btn" style="float:right">返回</a></div>
						</div>
							<fieldset class="layui-elem-field" style="padding-top:20px;font-size:16px;">
								<div style="width:510px;">
									<form class="layui-form" id="form1" action="">
									   <input name="id" value="<?php echo ($val["id"]); ?>" type="hidden">
										<div class="layui-form-item">
											<label class="layui-form-label" for="adname" style="width:150px;"><span style="color:red;">*</span>广告位标题：</label>
											<div class="layui-input-block" style="margin-left:150px;">
												<input id="adname" type="text" name="adname" value="<?php echo ($val["adname"]); ?>" required lay-verify="required" placeholder="请输入广告位标题" autocomplete="off" class="layui-input">
											</div>
										</div>
										<div class="layui-form-item">
											<label class="layui-form-label" for="remark" style="width:150px;">广告位副标题：</label>
											<div class="layui-input-block" style="margin-left:150px;">
												<input id="remark" type="text" name="remark" value="<?php echo ($val["remark"]); ?>"  placeholder="广告位所属项目大类" autocomplete="off" class="layui-input">
											</div>
										</div>
										<!-- 广告位start -->
										<div class="layui-form-item layui-inline" style="display: -webkit-inline-box;">
										      <label class="layui-form-label">广告位:</label>
										      <div class="layui-input-block" style="margin-left: 10px;">
										       <input type="radio" name="position" value="1" <?php if($val["page_id"] == 1): ?>checked<?php endif; ?> title="首&nbsp;&nbsp;&nbsp;页"  checked="">
                                              </div> 
							       
						                      <label class="layui-form-label" style="text-align:left;">广告位置:</label>
						                      <div class="layui-input-inline">
							                      <select name="adposition[1]" lay-filter="position1">
											        <option value="">--请选择--</option>
											        <?php if(is_array($position1)): $i = 0; $__LIST__ = $position1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["position_id"]); ?>" <?php if($val["position_id"] == $vo['position_id']): ?>selected<?php endif; ?> ><?php echo ($vo["position_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> 	
											      </select>
						                   	  </div>					
						                        <label class="layui-form-label" >尺寸: W</label>
												<div class="layui-input-block" style="margin-left:0px">
													<input id="width" type="text" name="width[1]"  style="width:50px;" autocomplete="off" class="layui-input">
												</div>
												<label class="layui-form-label" style="width:60px;" >X&nbsp;&nbsp;&nbsp;H</label>
												<div class="layui-input-block" style="margin-left:0px">
													<input id="height" type="text" name="height[1]"   style="width:50px;" autocomplete="off" class="layui-input">
												</div>
										 </div>
										 <div class="layui-form-item layui-inline" style="display: -webkit-inline-box;">
										    <label class="layui-form-label"></label>
										     <div class="layui-input-block" style="margin-left: 10px;">
										      <input type="radio" name="position" value="2" <?php if($val["page_id"] == 2): ?>checked<?php endif; ?> title="案例页"  >
                                             </div> 
							       
						                     <label class="layui-form-label" style="text-align:left;">广告位置:</label>
						                      <div class="layui-input-inline">
							                      <select name="adposition[2]" lay-filter="position1">
											        <option value="">--请选择--</option>
											        <?php if(is_array($position2)): $i = 0; $__LIST__ = $position2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo2["position_id"]); ?>" <?php if($val["position_id"] == $vo2['position_id']): ?>selected=""<?php endif; ?>><?php echo ($vo2["position_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> 
											      </select>
						                   	  </div>					
						                        <label class="layui-form-label" >尺寸: W</label>
												<div class="layui-input-block" style="margin-left:0px">
													<input id="width" type="text" name="width[2]"  style="width:50px;" autocomplete="off" class="layui-input">
												</div>
												<label class="layui-form-label" style="width:60px;" >X&nbsp;&nbsp;&nbsp;H</label>
												<div class="layui-input-block" style="margin-left:0px">
													<input id="height" type="text" name="height[2]" style="width:50px;" autocomplete="off" class="layui-input">
												</div>
										 </div>
										 <div class="layui-form-item layui-inline" style="display: -webkit-inline-box;">
										    <label class="layui-form-label"></label>
										     <div class="layui-input-block" style="margin-left: 10px;">
										      <input type="radio" name="position" value="3" <?php if($val["page_id"] == 3): ?>checked<?php endif; ?> title="咨询页"  >
                                             </div> 
							       
						                     <label class="layui-form-label" style="text-align:left;">广告位置:</label>
						                      <div class="layui-input-inline">
							                      <select name="adposition[3]" lay-filter="position1">
											        <option value="">--请选择--</option>
											       <?php if(is_array($position3)): $i = 0; $__LIST__ = $position3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo3["position_id"]); ?>" <?php if($val["position_id"] == $vo3['position_id']): ?>selected<?php endif; ?> ><?php echo ($vo3["position_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> 
											      </select>
						                   	  </div>					
						                        <label class="layui-form-label" >尺寸: W</label>
												<div class="layui-input-block" style="margin-left:0px">
													<input id="width" type="text" name="width[3]" style="width:50px;" autocomplete="off" class="layui-input">
												</div>
												<label class="layui-form-label" style="width:60px;" >X&nbsp;&nbsp;&nbsp;H</label>
												<div class="layui-input-block" style="margin-left:0px">
													<input id="height" type="text" name="height[3]" style="width:50px;" autocomplete="off" class="layui-input">
												</div>
										 </div>
										 <div class="layui-form-item layui-inline" style="display: -webkit-inline-box;">
										    <label class="layui-form-label"></label>
										     <div class="layui-input-block" style="margin-left: 10px;">
										      <input type="radio" name="position" value="4"  <?php if($val["page_id"] == 4): ?>checked<?php endif; ?> title="其&nbsp;&nbsp;&nbsp;它"  >
                                             </div> 
							       
						                     <label class="layui-form-label" style="text-align:left;">广告位置:</label>
						                      <div class="layui-input-inline">
							                      <select name="adposition[4]" lay-filter="position1">
											        <option value="">--请选择--</option>
											        <?php if(is_array($position4)): $i = 0; $__LIST__ = $position4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo4): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo4["position_id"]); ?>" <?php if($val["position_id"] == $vo4['position_id']): ?>selected<?php endif; ?>><?php echo ($vo4["position_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> 
											      </select>
						                   	  </div>					
						                        <label class="layui-form-label" >尺寸: W</label>
												<div class="layui-input-block" style="margin-left:0px">
													<input id="width" type="text" name="width[4]"  style="width:50px;" autocomplete="off" class="layui-input">
												</div>
												<label class="layui-form-label" style="width:60px;" >X&nbsp;&nbsp;&nbsp;H</label>
												<div class="layui-input-block" style="margin-left:0px">
													<input id="height" type="text" name="height[4]"  style="width:50px;" autocomplete="off" class="layui-input">
												</div>
										 </div>
										 <!-- 广告位end -->
										 <div class="layui-form-item">
										    <label class="layui-form-label" style="margin-left: 10px;">广告类型:</label>
										    <div class="layui-input-block">
										      <input type="radio" name="ad_type" value="1" <?php if($val["ad_type"] == 1): ?>checked<?php endif; ?> title="轮播" checked="">
										      <input type="radio" name="ad_type" value="2" <?php if($val["ad_type"] == 2): ?>checked<?php endif; ?> title="图片">
										      <input type="radio" name="ad_type" value="3" <?php if($val["ad_type"] == 3): ?>checked<?php endif; ?> title="文字">
										    </div>
										  </div>
										<div class="layui-form-item">
											<div class="layui-input-block">
												<button class="layui-btn " lay-submit lay-filter="add-adlocation">保存</button>
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
	<script type="text/javascript" src="/static/common/layui/layui.js"></script>
	<script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.js"></script>
    <script type="text/javascript" src="/static/js/adlocation/add.js"></script>
	<script type="text/javascript" src="/static/js/jquery.form.js"></script>
</body>

</html>