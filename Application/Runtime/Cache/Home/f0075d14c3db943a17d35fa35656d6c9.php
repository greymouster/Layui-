<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>案例库</title>
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
  <link rel="stylesheet" href="/static/css/jquery-ui.min.css">
  <script src="/static/js/jquery.min.js"></script>
  <script src="/static/js/jquery-ui.min.js"></script> 
  <script type="text/javascript">
  	//查询成功案例
function search_offer() {
	var offer_year = $('#offer_year').val();
	var offer_bg = $('#offer_bg').val();
	var offer_student_name = $('#offer_student_name').val();
	
	if (offer_year == null || offer_year == '' || offer_year == 0){
		layer.msg("录取年份不能为空",{icon:5});
		return false;
	}
	
	if (offer_bg == null || offer_bg == '' ){
		layer.msg("申请背景不能为空",{icon:5});
		return false;
	}
	
	if (offer_student_name == null || offer_student_name == ''){
		layer.msg("学生姓名不能为空",{icon:5});
		return false;
	}
	
	$.ajax({
		type: "POST",
		async:false,
		dataType: "json",
		url: "<?php echo U('Offer/getOfferList');?>",
		data: {"year":offer_year,"student_name":offer_student_name,"background":offer_bg},
		success: function(data) {
			if (data.status == 0){
				alert(data.code);
			}else if (data.status == 1){
				var _html = '<table class="layui-table table-hover" lay-even="" lay-skin="nob"> ';
				_html += '<thead>';
				_html += '<tr>';
				_html += '<th>主录取</th>';
				_html += '<th>学生姓名</th>';
				_html += '<th>录取年份</th>';
				_html += '<th>背景院校</th>';
				_html += '<th>背景专业</th>';
				_html += '<th>录取院校</th>';
				_html += '<th>录取专业关键字</th>';
				_html += '<th>国家</th>';
				_html += ' <th>学历</th>';
				_html += '</tr>';
				_html += '</thead>';
				_html += '<tbody>'
										               
				$.each(data._list,function (k,v){
					_html += '<tr>';
					_html += '<td><div class="layui-form"><input type="radio" name="is_main" value="'+v.id+'" title=" "></div></td>';

					_html += '<td>'+v.studentrealname+'</td>';
					_html += '<td>'+v.year+'</td>';
					_html += '<td>'+v.background+'</td>';
					_html += '<td>'+v.background+'</td>';
					_html += '<td>'+v.school_name+'</td>';
					_html += '<td>'+v.offer_special+'</td>';
					
					_html += '<td>';
					if (v.country == '1') _html += '美国'; 
					if (v.country == '2') _html += '英国'; 
					if (v.country == '4') _html += '加拿大'; 
					if (v.country == '8') _html += '新加坡'; 
					if (v.country == '16') _html += '澳洲'; 
					if (v.country == '32') _html += '香港'; 
					if (v.country == '33') _html += '荷兰'; 
					if (v.country == '34') _html += '欧洲'; 
					if (v.country == '40') _html += '日本'; 
					if (v.country == '64') _html += '其他'; 
					_html += '</td>';
					
					_html += '<td>';
					if (v.education == '1') _html += '本科';
					if (v.education == '2') _html += '硕士';
					if (v.education == '3') _html += '博士';
					if (v.education == '4') _html += '本科转学';
					if (v.education == '5') _html += '高中';
					_html += '</td>';
					
					_html += '</tr>';
				});
				
				_html += '</tbody>';
				_html += '</table>';
				
				$('#offer_list').html(_html);
				
			}
		},
		error: function(HttpRequest, ajaxOptions, thrownError) {}
	});
	layui.use(['form'], function(){
		    var form = layui.form()  
			form.render();
			form.render('radio');
		})
	$('#px').next().attr('style','float:left');
}
  </script>
</head>

<body>
  <div class="layui-tab-title" style="background:#f2f2f2;z-index:9999;width:100%;line-height:40px;position:fixed;top:6px;border-top:solid 2px #1AA094;">
    <i class="iconfont icon-diannao1" style="margin-left:15px;"></i>
    <span class="layui-breadcrumb" style="color:#fff;font-size:18px;">
		  <a href="javascript:;">产品</a>
		  <a href="<?php echo U('Offer/index');?>">案例库</a>
		  <a><cite class='change-text'>案例管理</cite></a>
		</span>
  </div>
  <section class="layui-larry-box" style="margin-top:20px;">
		<div class="larry-personal">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li class="layui-this site-demo-active">案例管理</li>
 
				</ul>
				<div class="layui-tab-content">
					<div class="layui-tab-item layui-show">
						<!-- 案例管理-->
						<div class="row" style="margin:0 0 20px">
							<div class="col-md-10" style="font-size:27px">编辑案例</div>
							<div class="col-md-2" style="padding-right:0"><a class="layui-btn" onclick="javascript:history.go(-1);" style="float:right">返回</a></div>
						</div>
						<div class="layui-tab-item  layui-show">
							<fieldset class="layui-elem-field" style="padding-top:20px;font-size:16px;">
								<div style="width:1200px;margin-left:50px">
									<form class="layui-form"   action="">
										<div class="col-md-10" style="font-size:20px;color:green;margin:0 0 20px -40px;">匹配成功案例</div>	
										
										<div class="layui-form-item">
											<div class="layui-inline">
											  <label class="layui-form-label"><span style="color:red;">*</span>学生姓名</label>
												<div class="layui-input-block">
													<input id="offer_student_name" type="text"  required lay-verify="required"   class="layui-input">
												</div>
											</div> 
											<div class="layui-inline">
											  <label class="layui-form-label"><span style="color:red;">*</span>录取年份</label>
												<div class="layui-input-block">
													<input id="offer_year" type="text"  required lay-verify="required"   class="layui-input">
												</div>
											</div> 
											<div class="layui-inline">
											  <label class="layui-form-label"><span style="color:red;">*</span>申请背景</label>
												<div class="layui-input-block">
													<input  id="offer_bg" type="text"  required lay-verify="required"   class="layui-input">
												</div>
											</div> 
											<div class="layui-inline" style="margin:-10px 0 0 50px;">
												<input style="width:66px" class="layui-btn" onclick="search_offer()" value="查询" type="button">
												<button type="reset" class="layui-btn  layui-btn-primary">重置</button>
											</div>
										</div>	 	
										
									
									<div id="offer_list">
										<?php if($offer_list != '' ): ?><table class="layui-table table-hover" lay-even="" lay-skin="nob">
							              <thead>
							                <tr>
							                  <th>主录取</th>
							                  <th>学生姓名</th>
							                  <th>录取年份</th>
							                  <th>背景院校</th>
							                  <th>背景专业</th>
							                  <th>录取院校</th>
							                  <th>录取专业关键字</th>
							                  <th>国家</th>
							                  <th>学历</th> 
							                </tr>
							              </thead>
							              <tbody>
							              <?php if(is_array($offer_list)): $i = 0; $__LIST__ = $offer_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							                  <td>
							                    <div class="layui-form"><input type="radio" name="is_main" value="<?php echo ($vo["id"]); ?>" title=" "></div>
							                  </td>
							                  <td><?php echo ($vo["studentrealname"]); ?></td>
							                  <td><?php echo ($vo["year"]); ?></td> 
							                  <td><?php echo ($vo["background"]); ?></td>
							                  <td><?php echo ($vo["background"]); ?></td>
							                  <td><?php echo ($vo["school_name"]); ?></td>            
							                  <td><?php echo ($vo["offer_special"]); ?></td>
							                  <td>
							                  	<?php if($vo["country"] == 1 ): ?>美国<?php endif; ?>
												<?php if($vo["country"] == 2 ): ?>英国<?php endif; ?>
												<?php if($vo["country"] == 4 ): ?>加拿大<?php endif; ?>
												<?php if($vo["country"] == 8 ): ?>新加坡<?php endif; ?>
												<?php if($vo["country"] == 16 ): ?>澳洲<?php endif; ?>
												<?php if($vo["country"] == 32 ): ?>香港<?php endif; ?>
												<?php if($vo["country"] == 33 ): ?>荷兰<?php endif; ?>
												<?php if($vo["country"] == 34 ): ?>欧洲<?php endif; ?>
												<?php if($vo["country"] == 40 ): ?>其他<?php endif; ?>
												<?php if($vo["country"] == 64 ): ?>日本<?php endif; ?>
											  </td>
							                  <td>
							                  	<?php if($vo["education"] == 1 ): ?>本科<?php endif; ?>
												<?php if($vo["education"] == 2 ): ?>硕士<?php endif; ?>
												<?php if($vo["education"] == 3 ): ?>博士<?php endif; ?>
												<?php if($vo["education"] == 4 ): ?>本科转学<?php endif; ?>
												<?php if($vo["education"] == 5 ): ?>高中<?php endif; ?>
											  </td>
								              
							                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
							              <input id="offer_id" type="hidden" name="offer_id" value="<?php echo ($offer_id); ?>">
							              </tbody>
							            </table><?php endif; ?>
						        	</div>
						        </form>
								</div>		
							</fieldset>
							<fieldset class="layui-elem-field" style="padding-top:20px;font-size:16px;">				
								<div style="width:1000px;margin-left:50px">
									<form class="layui-form" enctype="multipart/form-data" id="myform" method="post" action="">

										<div class="col-md-10" style="font-size:20px;color:green;margin:0 0 20px -40px;">添加案例</div>	
										<div class="layui-form-item">
											<label class="layui-form-label" for="subject"><span style="color:red;">*</span>标题</label>
											<div class="layui-input-block">
												<input id="question_title" type="text" name="subject" required lay-verify="required" placeholder="请输入20字以内的标题" autocomplete="off" class="layui-input" value="<?php echo ($info['subject']); ?>">
											</div>
										</div>
										<div class="layui-form-item">
											<label class="layui-form-label" for="keyword"><span style="color:red;">*</span>关键词</label>
											<div class="layui-input-block">
												<input id="question_title" type="text" name="keyword" required lay-verify="required"  autocomplete="off" class="layui-input" value="<?php echo ($info['keyword']); ?>">
											</div>
										</div>

										<div class="layui-form-item">
											<label class="layui-form-label"><span style="color:red;">*</span>文章类目</label>
											<div class="layui-input-block  sys">
												<input type="radio"  name="system_id"  class="re" value="36" <?php if($info['system_id'] == 36): ?>checked=""<?php endif; ?> title="留学案例">	
												<input type="radio"  name="system_id"  class="re" value="34" <?php if($info['system_id'] == 34): ?>checked=""<?php endif; ?> title="学子访谈">
												<input type="radio"  name="system_id"  class="re" value="42" <?php if($info['system_id'] == 42): ?>checked=""<?php endif; ?> title="海外就业案例">
												<br/>
												<input type="radio" id="px" name="system_id" value="4" <?php if(in_array(($info['system_id']), explode(',',"4,3,27,29,28,41,30"))): ?>checked=""<?php endif; ?> title="培训案例分类：">
												<span class="category">
													
													<input type="radio" <?php if($info['system_id'] == 4): ?>checked=""<?php endif; ?>  name="px_cate_id" value="1" title="托福">
													<input type="radio" <?php if($info['system_id'] == 3): ?>checked=""<?php endif; ?>
													name="px_cate_id" value="2"  title="雅思">
													<input type="radio" <?php if($info['system_id'] == 27): ?>checked=""<?php endif; ?> name="px_cate_id" value="3" title="GMAT">
													<input type="radio" <?php if($info['system_id'] == 29): ?>checked=""<?php endif; ?> name="px_cate_id" value="4" title="SAT">
													<input type="radio" <?php if($info['system_id'] == 28): ?>checked=""<?php endif; ?> name="px_cate_id" value="5" title="GRE">
													<input type="radio" <?php if($info['system_id'] == 41): ?>checked=""<?php endif; ?> name="px_cate_id" value="6" title="日语">
													<input type="radio" <?php if($info['system_id'] == 30): ?>checked=""<?php endif; ?> name="px_cate_id" value="7" title="SSAT">
													
												</span>
												<span style="display:none"><input type="radio"  name="px_cate_id" value="" title=""></span>		
											</div>
										</div>
										<div class="layui-form-item">
											<label class="layui-form-label">热门标签</label>
											<div class="layui-input-block">											  
												<input type="checkbox" lay-skin="primary" name="rmbq[1]" value="60" title="转/混申专业">
												<input type="checkbox" lay-skin="primary" name="rmbq[2]" value="61" title="在职申请">		  
												<input type="checkbox" lay-skin="primary" name="rmbq[3]" value="62" title="低分反转">
												<input type="checkbox" lay-skin="primary" name="rmbq[4]" value="63" title="小本逆袭"> 
												<input type="checkbox" lay-skin="primary" name="rmbq[5]" value="64" title="常春藤">
												<input type="checkbox" lay-skin="primary" name="rmbq[6]" value="65" title="DIY失利">
												<input type="checkbox" lay-skin="primary" name="rmbq[7]" value="66" title="海外申请">
												<input type="checkbox" lay-skin="primary" name="rmbq[8]" value="67" title="文理学院">
												<input type="checkbox" lay-skin="primary" name="rmbq[9]" value="68" title="情侣党">
												<input type="checkbox" lay-skin="primary" name="rmbq[10]" value="69" title="艺术">
											</div>
											<input type="hidden" id="rmbqs" name="rmbqs" value="<?php echo ($rmbqs); ?>">
										</div>	
										<div class="layui-form-item">
											<label class="layui-form-label" for="title">创建者</label>
											<div class="layui-input-block">
												<input id="author" type="text" name="author" value="<?php echo ($info["author"]); ?>" required lay-verify="required" readonly="readonly" style="cursor: not-allowed;background-color: #eee;opacity: 1;" class="layui-input">
											</div>
										</div>
										<div class="layui-form-item">
											<label class="layui-form-label" style="float:none;"><span style="color:red;">*</span>上传图片</label>
											<div class="site-demo-upload" style="width:360px; height:202.5px;border-radius:0;">
												<img id="LAY_demo_upload" style="width:360px; height:202.5px;border-radius:0;" <?php if($info['thumb_img'] != ''): ?>src="<?php echo ($info["thumb_img"]); ?>"<?php else: ?>src="/static/images/user.jpg"<?php endif; ?>>
											</div>
											<div style="display:none;"><input type="file" id="thumb_img" name="thumb_img" value="<?php echo ($info['thumb_img']); ?>"></div>
											<!-- <input type="file" name="file" id="file"/> -->
											<div class="site-demo-upbar layui-box layui-upload-button">
												<input type="file" accept="image/*" name="file" class="layui-upload-file" id="avatar">
												<span class="layui-upload-icon"><i class="layui-icon"></i>上传图片</span>
											</div>
										</div>

										<div class="layui-form-item layui-form-text">
											<label class="layui-form-label"><span style="color:red;">*</span>文章摘要</label>
											<div class="layui-input-block">
											  <textarea placeholder="多行文本" name="summary" lay-verify="required" class="layui-textarea"><?php echo ($info["summary"]); ?></textarea>
											</div>
										</div>	

										<div class="layui-form-item layui-form-text">
											<label class="layui-form-label"><span style="color:red;">*</span>文章内容</label>
											<div class="layui-input-block">
											  <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"><?php echo ($info["content"]); ?></textarea>
											</div>
									    </div>
										
										<div class="layui-form-item">
											<div class="layui-input-block">
												<button class="layui-btn" lay-submit lay-filter="save">保存</button>
												<button type="reset" class="layui-btn  layui-btn-primary">重置</button>
												<input type="hidden" id="id" name="id" value="<?php echo ($info['id']); ?>">
												<input type="hidden" id="is_main_up" name="is_main_up" value="">
											</div>
										</div>
									</form>
								</div>
							</fieldset>
						</div>

					</div>
 
				</div>
			</div>
		</div>
	</section>
  <script type="text/javascript" src="/static/common/layui/layui.js"></script>
  <script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="/static/js/offer/edit.js"></script>
  <script type="text/javascript" src="/static/js/jquery.form.js"></script>
</body>

</html>