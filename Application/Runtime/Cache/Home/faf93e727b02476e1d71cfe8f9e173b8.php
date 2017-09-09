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
  <link rel="stylesheet" href="/static/common/cxcalendar/css/cxcalendar.css">
  <link rel="stylesheet" href="/static/css/jquery-ui.min.css">
  <style>
      .label-margin-style{
	     margin-left:140px;
      }
    
  </style>
  <script src="/static/js/jquery.min.js"></script>
  <script src="/static/js/jquery-ui.min.js"></script> 
	  <script>
	  $(function() {
	  
			var cache = {};
			$("#special").autocomplete({
				minLength: 0,//最小长度触发搜索
				delay: 300,//延迟事件来触发
				autoFocus: true,//初始化以后自动设置焦点 默认为false

				source: function (request, response) {
					var term = request.term;
					if (term in cache) {
						response(cache[term]);
						return;
					}
					var seachParam={};
					if($(this.element).prop("name")){
						seachParam[$(this.element).prop("name")]=term;
					}else{
						seachParam.search_keywords=term;
					}
					$.ajax({
						url: "/Home/Adlocation/get_special/",
						dataType: "json",
						data: seachParam,
						success: function (data) {
							cache[term] = data;
							response(cache[term]);
						}
					});
				},
				focus: function (event, ui) {
					return false;
				},
				select: function( event, ui ) {
					$("#special_id").val(ui.item.id); 
					$(this).blur();

				}
			}).focus(function () {
				if ($(this).data("uiAutocomplete") && $(this).data("uiAutocomplete").menu.element)
					$(this).data("uiAutocomplete").menu.element.show();
			});


			var cachenew = {};
			$("#offer").autocomplete({
				minLength: 0,//最小长度触发搜索
				delay: 300,//延迟事件来触发
				autoFocus: true,//初始化以后自动设置焦点 默认为false

				source: function (request, response) {
					var term = request.term;
					if (term in cachenew) {
						response(cachenew[term]);
						return;
					}
					var seachParam={};
					if($(this.element).prop("name")){
						seachParam[$(this.element).prop("name")]=term;
					}else{
						seachParam.search_keywords=term;
					}
					$.ajax({
						url: "/Home/Adlocation/get_offer/",
						dataType: "json",
						data: seachParam,
						success: function (data) {
							cachenew[term] = data;
							response(cachenew[term]);
						}
					});
				},
				focus: function (event, ui) {
					return false;
				},
				select: function( event, ui ) {
					$("#offer_id").val(ui.item.article_id); 
					$(this).blur();

				}
			}).focus(function () {
				if ($(this).data("uiAutocomplete") && $(this).data("uiAutocomplete").menu.element)
					$(this).data("uiAutocomplete").menu.element.show();
			});			
	  });
	  </script>  
</head>

<body>
  <div class="layui-tab-title" style="background:#f2f2f2;z-index:9999;width:100%;line-height:40px;position:fixed;top:6px;border-top:solid 2px #1AA094;">
    <i class="iconfont icon-diannao1" style="margin-left:15px;"></i>
    <span class="layui-breadcrumb" style="color:#fff;font-size:18px;">
		  <a href="javascript:;">运营</a>
		   <a href="<?php echo U('Adlocation/index');?>">广告位管理</a>
		  <a><cite class='change-text'>广告内容编辑</cite></a>
	</span>
  </div>
  <section class="layui-larry-box" style="margin-top:20px;">
    <div class="larry-personal">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
		   <?php if($vol): ?><li class="site-demo-active layui-this">修改广告内容</li>
		   <?php else: ?> 
		   <li class="site-demo-active layui-this">添加广告内容</li><?php endif; ?>
        </ul>
        <div class="layui-tab-content">
          <div class='layui-tab-item  layui-show'>
 
 	           <fieldset class="layui-elem-field" style="padding-top:20px;font-size:16px;">
	           <form class="layui-form" id="myform"   action="" style="padding-right:20px">
			   <div style="width:50%;">
			   <input type="hidden" name="locationid" value="<?php echo ($location_id); ?>"  required lay-verify="required" >	
			   <input type="hidden" name="advertid" value="<?php echo ($vol["advertid"]); ?>">				   
	           	 <div class="layui-form-item">
	           	   <label class="layui-form-label" for="advert_title" style="width:140px;"><span style="color:red;">*</span>标题：</label>
	           	   <div class="layui-input-block  label-margin-style">
      			     <input   type="text" name="advert_title" id="advert_title" value="<?php echo ($vol["advert_title"]); ?>" placeholder="请输入标题" autocomplete="off" class="layui-input">
  				   </div>
	           	 </div>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width:140px;"><span style="color:red;">*</span>请选择广告链接类型:</label>
					<div class="layui-input-block label-margin-style url-type">											   
							<input type="radio" lay-skin="radio"  lay-filter="check" data-type="advert-url" name="url_type" value="1" title="链接地址"  <?php if(($vol["url_type"] == 1) OR ($vol["url_type"] < 1)): ?>checked<?php endif; ?>>
							<input type="radio" lay-skin="radio"  lay-filter="check" data-type="special" name="url_type" value="2" title="关联营销单页"  <?php if($vol["url_type"] == 2): ?>checked<?php endif; ?>>	
							<input type="radio" lay-skin="radio"  lay-filter="check" data-type="offer" name="url_type" value="3" title="关联学子访谈"  <?php if($vol["url_type"] == 3): ?>checked<?php endif; ?>>								
					</div>
				</div>					 
	           	 <div class="layui-form-item advert-url"   <?php if(($vol["url_type"] == 1) OR ($vol["url_type"] < 1)): ?>style='display:block'<?php else: ?>style='display:none'<?php endif; ?> >
	           	   <label class="layui-form-label" for="advert_url" style="width:140px;">链接地址：</label>
	           	   <div class="layui-input-block label-margin-style">
      			     <input   type="text" name="advert_url" id="advert_url" value="<?php echo ($vol["advert_url"]); ?>"  placeholder="请输入链接地址" autocomplete="off" class="layui-input">
  				   </div>
	           	 </div>
				<div class="layui-form-item special" <?php if(($vol["url_type"] == 2)): ?>style='display:block'<?php else: ?>style='display:none'<?php endif; ?>>
					<label class="layui-form-label" for="special"  style="width:140px;">关联营销单页:</label>
					<div class="layui-input-block label-margin-style">
						<input id="special" name="special" id="special" type="text" value="<?php echo ($vol["special"]); ?>" placeholder="请输入关键词匹配营销单页" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item offer" <?php if(($vol["url_type"] == 3)): ?>style='display:block'<?php else: ?>style='display:none'<?php endif; ?>>
					<label class="layui-form-label" for="offer"  style="width:140px;">关联学子访谈:</label>
					<div class="layui-input-block label-margin-style">
						<input id="offer" name="offer" id="offer" type="text" value="<?php echo ($vol["offer"]); ?>" placeholder="请输入关键词匹配学子访谈" autocomplete="off" class="layui-input">
					</div>
				</div>	
				<input type="hidden" id="offer_id" value="<?php echo ($vol["offerid"]); ?>" name="offer_id">					
				<input type="hidden" id="special_id" value="<?php echo ($vol["specialid"]); ?>" name="special_id">					
	           	 <div class="layui-form-item">
	           	   <label class="layui-form-label " style="float:none;width:140px;">上传图片:</label>
		            <div class="layui-input-block label-margin-style">
			           <div class="site-demo-upload" >
						   
						   <?php if($vol.advert_img): ?><img id="LAY_demo_upload" style="width:200px;height:200px;" src="<?php echo ($vol["advert_img"]); ?>">					   
						   <?php else: ?>
						   <img id="LAY_demo_upload" style="width:200px;height:200px;" src="/static/images/user.jpg"><?php endif; ?>
						   
		           	   </div>
					   <div class="site-demo-upbar layui-box layui-upload-button" style="margin-top:20px;">
					   	 <input type="file" accept="image/*" name="file" class="layui-upload-file" id="avatar">
					   	 <span class="layui-upload-icon"><i class="layui-icon"></i>上传图片</span>
					   </div>
				   </div>
				 </div>		
				<div class="layui-form-item">
					<label class="layui-form-label" style="width:140px;"><span style="color:red;">*</span>状态:</label>
					<div class="layui-input-block label-margin-style">											   
							<input type="radio" name="status" value="1" title="发布状态"  <?php if(($vol["status"] == 1) OR ($vol["status"] < 1)): ?>checked<?php endif; ?>>
							<input type="radio" name="status" value="2" title="下线状态"  <?php if($vol["status"] == 2): ?>checked<?php endif; ?>>												
					</div>
				</div>					 
	           	 <div class="layui-form-item">
	           	   <label class="layui-form-label" for="sort" style="width:140px;">排序:</label>
	           	   <div class="layui-input-block label-margin-style">
      			     <input   style="width:200px;" id="sort" type="text" name="sort" required lay-verify="required" value="<?php echo ($vol["sort"]); ?>" placeholder="数字越小显示越靠前，默认0" autocomplete="off" class="layui-input">
  				   </div>
	           	 </div>
	           	 <div class="layui-form-item">  
	           	    <label class="layui-form-label" style="width:140px;" for="start_time">投放时间:</label>
                    <div class="layui-input-inline">
                      <input type="text" name="start_time" id="start_time"   value="<?php if($vol): echo (date('Y-m-d',$vol["start_time"])); endif; ?>"  autocomplete="off" value="<?php echo (date('Y-m-d',$vol["start_time"])); ?>" class="layui-input">
                    </div>
                    <div class="layui-form-mid">到</div>
                    <div class="layui-input-inline">
                      <input type="text" name="end_time" id="end_time" value="<?php if($vol): echo (date('Y-m-d',$vol["start_time"])); endif; ?>"  autocomplete="off" value="<?php echo (date('Y-m-d',$vol["end_time"])); ?>" class="layui-input">
                    </div>				  
                 </div>
	           	 <div class="layui-form-item">
				    <div class="layui-input-block">
				      <a class="layui-btn save-advert" data-url="<?php echo U('Adlocation/advert');?>" >保存</a>
				      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
				    </div>
				 </div>
	           </form>
	 		   </fieldset>  
 
 
 
          </div>       
        </div>
      </div>
    </div>  
    <div class="larry-personal">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
		   <li class="site-demo-active layui-this">广告内容</li>
 
        </ul>
        <div class="layui-tab-content">
          <div class='layui-tab-item  layui-show'>
 
   
 
            <table class="layui-table table-hover table1" lay-even="" lay-skin="nob">
              <thead>
                <tr>
 
                  <th>链接地址</th>
                  <th>标题</th>
                  <th>缩略图</th>
                  <th>排序</th>
                  <th>投放时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php if(is_array($advert)): $i = 0; $__LIST__ = $advert;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
 
				  <?php if($vo['special']): ?><td><a href="<?php echo U('Special/edit');?>?id=<?php echo ($vo['specialid']); ?>"><?php echo ($vo['special']); ?></a></td>				  		  
				  <?php else: ?> <td><a href="<?php echo ($vo['advert_url']); ?>"><?php echo ($vo['advert_url']); ?></a></td><?php endif; ?>
				  
                  <td><?php echo ($vo["advert_title"]); ?></td> 
                  <td><img id="LAY_demo_upload" src="<?php echo ($vo["advert_img"]); ?>" width="150px" height="150px"></td> 				  
                  <td><?php echo ($vo["sort"]); ?></td>  
                  <td><?php echo (date('Y-m-d',$vo["start_time"])); ?>------<?php echo (date('Y-m-d',$vo["end_time"])); ?></td>  
                  <td>
                     <a class="layui-btn" href="<?php echo U('Adlocation/advert');?>?advertid=<?php echo ($vo["advertid"]); ?>&id=<?php echo ($location_id); ?>" ><i class="layui-icon">&#xe642;</i>编辑</a>
                     <button class="layui-btn layui-btn-danger change-state" data-id="<?php echo ($vo["advertid"]); ?>"  data-url="<?php echo U('Adlocation/advert_del');?>"><i class="layui-icon">&#xe640;</i>删除</button>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>				
              </tbody>
            </table>
 
          </div>
          
 
          
          
          
          
          
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="/static/common/layui/layui.js"></script>
  <script type="text/javascript" src="/static/js/jquery.form.js"></script>
  <script type="text/javascript" src="/static/js/adlocation/index.js"></script>
  <script type="text/javascript" src="/static/common/cxcalendar/js/jquery.cxcalendar.min.js"></script>
</body>
<script>

/*显示日历*/
$('#start_time,#end_time').cxCalendar();
// 获取焦点清空input的值
$('#start_time,#end_time').focus(function(){
	$(this).val('');
});
</script>
</html>