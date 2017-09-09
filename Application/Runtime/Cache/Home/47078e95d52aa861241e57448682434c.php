<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>案例管理</title>
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
            <fieldset class="layui-elem-field">
              <div class="layui-field-box">
                <form class="layui-form"  id="form1" action="" >
                  <div class="layui-form-item">
				    <label class="layui-form-label" style="width:90px;"><b>查询条件</b></label>
                    <label class="layui-form-label" style="width:90px;">按栏目</label>
                    <div class="layui-input-inline sys_change">
                      <select name="system_id">
				        <option value="">--请选择--</option>
                <option value="">--全部--</option>
				        <option value="36" <?php if(I('system_id') == 36): ?>selected<?php endif; ?>>留学案例</option>
				        <option value="34" <?php if(I('system_id') == 34): ?>selected<?php endif; ?>>学子访谈</option>
				        <option value="35" <?php if(I('system_id') == 35): ?>selected<?php endif; ?>>培训案例</option>
				        <option value="42" <?php if(I('system_id') == 42): ?>selected<?php endif; ?>>海外就业案例</option>						
				      </select>
                    </div>
                    <label class="layui-form-label" style="width:150px;">培训案例分类</label>					
                    <div class="layui-input-inline xh_div">
                      <select name="category_id" id="category_id">
                <option value="">--全部--</option>
				        <option value="">--全部--</option>
				        <option value="284" <?php if(I('category_id') == 284): ?>selected<?php endif; ?>>托福</option>
				        <option value="283" <?php if(I('category_id') == 283): ?>selected<?php endif; ?>>雅思</option>
				        <option value="307" <?php if(I('category_id') == 307): ?>selected<?php endif; ?>>GMAT</option>
				        <option value="309" <?php if(I('category_id') == 309): ?>selected<?php endif; ?>>SAT</option>
				        <option value="308" <?php if(I('category_id') == 308): ?>selected<?php endif; ?>>GRE</option>
				        <option value="1058" <?php if(I('category_id') == 1058): ?>selected<?php endif; ?>>日语</option>	
				        <option value="310" <?php if(I('category_id') == 310): ?>selected<?php endif; ?>>SSAT</option>							
				      </select>
                    </div>
                    <label class="layui-form-label" style="width:90px;">发布人</label>							
                    <div class="layui-input-inline">
                      <select name="author">
				        <option value="">--请选择--</option>
 
				      </select>
                    </div>
                    <label class="layui-form-label" style="width:90px;">文章状态</label>							
                    <div class="layui-input-inline">
                      <select name="status">
				        <option value="">--请选择--</option>
                <option value="">--全部--</option>
						<option value="1" <?php if(I('status') == 1): ?>selected<?php endif; ?>> 未审核 </option>
						<option value="2" <?php if(I('status') == 2): ?>selected<?php endif; ?>> 审核通过 </option>
						<option value="3" <?php if(I('status') == 3): ?>selected<?php endif; ?>> 审核失败 </option>
						<option value="4" <?php if(I('status') == 4): ?>selected<?php endif; ?>> 已发布 </option>
						<option value="5" <?php if(I('status') == 5): ?>selected<?php endif; ?>> 已下线 </option>
				      </select>
                    </div>					
                  </div>
                  <div class="layui-form-item">
				    <label class="layui-form-label" style="width:90px;"></label>				  
                    <label class="layui-form-label" style="width:90px;">按年份</label>
                    <div class="layui-input-inline">
                      <select name="years">
				        <option value="">--全部--</option>
                <option value="">--全部--</option>
                <option value="2018" <?php if(I('years') == 2018): ?>selected<?php endif; ?>> 2018 </option>
    						<option value="2017" <?php if(I('years') == 2017): ?>selected<?php endif; ?>> 2017 </option>
    						<option value="2016" <?php if(I('years') == 2016): ?>selected<?php endif; ?>> 2016 </option>
    						<option value="2015" <?php if(I('years') == 2015): ?>selected<?php endif; ?>> 2015 </option>
    						<option value="2014" <?php if(I('years') == 2014): ?>selected<?php endif; ?>> 2014 </option>
    						<option value="2013" <?php if(I('years') == 2013): ?>selected<?php endif; ?>> 2013 </option>
    						<option value="2012" <?php if(I('years') == 2012): ?>selected<?php endif; ?>> 2012 </option>
    						<option value="2011" <?php if(I('years') == 2011): ?>selected<?php endif; ?>> 2011 </option>
    						<option value="2010" <?php if(I('years') == 2010): ?>selected<?php endif; ?>> 2010 </option>
    						<option value="2009" <?php if(I('years') == 2009): ?>selected<?php endif; ?>> 2009 </option>	
    						<option value="more" <?php if(I('years') == more): ?>selected<?php endif; ?>> 更早 </option>							
				      </select>
                    </div>
                    <label class="layui-form-label" style="width:150px;">按国家</label>					
                    <div class="layui-input-inline">
                      <select name="countrys">
				        <option value="">--全部--</option>
                <option value="">--全部--</option>
				        <option value="1" <?php if(I('countrys') == 1): ?>selected<?php endif; ?>>美国</option>
				        <option value="2" <?php if(I('countrys') == 2): ?>selected<?php endif; ?>>英国</option>
				        <option value="4" <?php if(I('countrys') == 4): ?>selected<?php endif; ?>>加拿大</option>
				        <option value="8" <?php if(I('countrys') == 8): ?>selected<?php endif; ?>>新加坡</option>
				        <option value="16" <?php if(I('countrys') == 16): ?>selected<?php endif; ?>>澳洲</option>
				        <option value="32" <?php if(I('countrys') == 32): ?>selected<?php endif; ?>>香港</option>
				        <option value="33" <?php if(I('countrys') == 33): ?>selected<?php endif; ?>>荷兰</option>
				        <option value="34" <?php if(I('countrys') == 34): ?>selected<?php endif; ?>>欧洲</option>
				        <option value="40" <?php if(I('countrys') == 40): ?>selected<?php endif; ?>>日本</option>
				        <option value="64" <?php if(I('countrys') == 64): ?>selected<?php endif; ?>>其他</option>
 				
				      </select>
                    </div> 
                    <label class="layui-form-label" style="width:90px;">按学历</label>						
                    <div class="layui-input-inline">
                      <select name="educations">
				        <option value="">--全部--</option>
                <option value="">--全部--</option>
				        <option value="3" <?php if(I('educations') == 3): ?>selected<?php endif; ?>>博士</option>
 				        <option value="2" <?php if(I('educations') == 2): ?>selected<?php endif; ?>>硕士</option>
						<option value="1" <?php if(I('educations') == 1): ?>selected<?php endif; ?>>本科</option>
				        <option value="4" <?php if(I('educations') == 4): ?>selected<?php endif; ?>>本科转学</option>
				        <option value="5" <?php if(I('educations') == 5): ?>selected<?php endif; ?>>高中</option>						
				      </select>
                    </div>	
                    <label class="layui-form-label" style="width:90px;">按奖学金</label>						
                    <div class="layui-input-inline">
                      <select name="money_statuss">
				        <option value="">--全部--</option>
                <option value="">--全部--</option>
				        <option value="1" <?php if(I('money_statuss') == 1): ?>selected<?php endif; ?>>无奖学金</option>
				        <option value="2" <?php if(I('money_statuss') == 2): ?>selected<?php endif; ?>>部分奖学金</option>
				        <option value="3" <?php if(I('money_statuss') == 3): ?>selected<?php endif; ?>>全奖学金</option>
				      </select>
                    </div>					
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;"></label>
                    <label class="layui-form-label" style="width:90px;">热门标签</label>					
                    <div class="layui-input-inline">
                      <select name="propertys">
				        <option value="">--请选择--</option>
                <option value="">--全部--</option>
				        <option value="60" <?php if(I('propertys') == 60): ?>selected<?php endif; ?>>转/混申专业</option>
				        <option value="61" <?php if(I('propertys') == 61): ?>selected<?php endif; ?>>在职申请   </option>
				        <option value="62" <?php if(I('propertys') == 62): ?>selected<?php endif; ?>>低分反转   </option>
				        <option value="63" <?php if(I('propertys') == 63): ?>selected<?php endif; ?>>小本逆袭   </option>
				        <option value="64" <?php if(I('propertys') == 64): ?>selected<?php endif; ?>>常春藤     </option>
				        <option value="65" <?php if(I('propertys') == 65): ?>selected<?php endif; ?>>DIY失利    </option>
				        <option value="66" <?php if(I('propertys') == 66): ?>selected<?php endif; ?>>海外申请   </option>
				        <option value="67" <?php if(I('propertys') == 67): ?>selected<?php endif; ?>>文理学院   </option>
				        <option value="68" <?php if(I('propertys') == 68): ?>selected<?php endif; ?>>情侣党     </option>
				        <option value="69" <?php if(I('propertys') == 69): ?>selected<?php endif; ?>>艺术       </option>						
				      </select>
                    </div>
                    <label class="layui-form-label" style="width:150px;">是否匹配成功案例</label>						
                    <div class="layui-input-inline">
                      <select name="is_machting">
				        <option value="">--请选择--</option>
                <option value="">--全部--</option>
				        <option value="1" <?php if(I('is_machting') == 1): ?>selected<?php endif; ?>>已匹配</option>
				        <option value="2" <?php if(I('is_machting') == 2): ?>selected<?php endif; ?>>未匹配</option>
				      </select>
                    </div> 
 				
                  </div>				  
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;"></label>				  
                    <label class="layui-form-label" style="width:90px;">按日期查询</label>
                    <div class="layui-input-inline">
                      <select name="time">
				        <option value="">--时间类型--</option>
                <option value="">--全部--</option>
				        <option value="1" <?php if(I('time') == 1): ?>selected<?php endif; ?>>录入时间</option>
				        <option value="2" <?php if(I('time') == 2): ?>selected<?php endif; ?>>发布时间</option>
				        <option value="3" <?php if(I('time') == 3): ?>selected<?php endif; ?>>更新时间</option>						
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="start_time" id="start_time" value="<?php if(I('get.start_time')) echo I('get.start_time');?>" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">到</div>
                    <div class="layui-input-inline">
                      <input type="text" name="end_time" id="end_time" value="<?php if(I('get.end_time')) echo I('get.end_time')?>" autocomplete="off" class="layui-input">
                    </div>
					<label class="layui-form-label" style="width:90px;">按问题标题</label>
					<div class="layui-input-inline"> 
					<input type="text" name="subject" value="<?php echo I('get.subject'); ?>"  placeholder="请输入文章标题查询"  class="layui-input" >
					</div>						
                    <div class="layui-input-inline">
                      <input type="button" class="layui-btn layui-btn-normal" lay-submit lay-filter="search" onclick="search()" value="查询">
                    </div>
                  </div>
                </form>
              </div>
            </fieldset>

            <div class="layui-form">
              <div class="layui-input-inline">
                <input type="checkbox" class="select-all" lay-filter="allChoose" lay-skin="primary" title="全选">
              </div>
              <div class="layui-input-inline">
                <a href="<?php echo U('Offer/add');?>" class="layui-btn layui-btn-normal">添加</a>
              </div>
              <div class="layui-input-inline">
                <button class="layui-btn layui-btn-normal">批量导出</button>
              </div>
            </div>
            <table class="layui-table table-hover" lay-even="" lay-skin="nob">
              <thead>
                <tr>
                  <th>
                    <div class="layui-form"><input type="checkbox" lay-skin="primary"></div>
                  </th>
                  <th>序号</th>
                  <th width="25%">文章标题</th>
                  <th>文章栏目</th>
                  <th>录入时间</th>
                  <th>发布时间</th>
                  <th>更新时间</th>
                  <th>阅读次数</th>
                  <th>发布人</th>
                  <th>文章状态</th>
                  <th>操作</th>				  
                </tr>
              </thead>
              <tbody>
			  <?php if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td>
                    <div class="layui-form"><input type="checkbox" value="1" lay-skin="primary"></div>
                  </td>
                  <td><?php echo ($vo["id"]); ?></td>
                  <td><a href="/Home/Offer/edit/id/<?php echo ($vo["id"]); ?>" style="color:#3399FF;"><?php echo ($vo["subject"]); ?></a></td>   
				  <td><?php echo ($vo["category_name"]); ?></td>	
				  <td><?php echo (time_format($vo["create_time"])); ?></td>
				  <td><?php echo (time_format($vo["publish_time"])); ?></td>
				  <td><?php echo (time_format($vo["update_time"])); ?></td>				  
				  <td><?php echo ($vo["view_num"]); ?></td>
				  <td><?php echo ($vo["author"]); ?></td>
				  <td>
					<?php if($vo["status"] == 1 ): ?>未审核<?php endif; ?>
					<?php if($vo["status"] == 2 ): ?>审核通过<?php endif; ?>
					<?php if($vo["status"] == 3 ): ?>审核失败<?php endif; ?>
					<?php if($vo["status"] == 4 ): ?>已发布<?php endif; ?>
					<?php if($vo["status"] == 5 ): ?>下线<?php endif; ?>
				  </td>	                   
                  <td>
				  <a href="/Home/Offer/edit/id/<?php echo ($vo["id"]); ?>" class="layui-btn"><i class="layui-icon">&#xe642;</i>编辑</a>
				  <button class="layui-btn offer-pub" data-status="<?php echo ($vo["status"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Offer/status_change');?>">发布</button>
				  <button class="layui-btn layui-btn-danger offer-off" data-status="<?php echo ($vo["status"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Offer/status_change');?>">下线</button>				  
				  <button class="layui-btn layui-btn-danger offer-del" data-is_delete="<?php echo ($vo["is_delete"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Offer/offer_del');?>">删除</button>				  				 		  
				  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
              </tbody>
            </table>
            <div class="larry-table-page clearfix">
              <div id="page" class="page"><?php echo ($_page); ?></div>
              <div style="margin:10px">共<?php echo ($_total); ?>条记录</div>
            </div>

	
          </div>

        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="/static/common/layui/layui.js"></script>
  <script type="text/javascript" src="/static/js/offer/index.js"></script>
  <script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="/static/common/cxcalendar/js/jquery.cxcalendar.min.js"></script>
  <script>
    //laypage分页


/*显示日历*/
$('#start_time,#end_time').cxCalendar();
// 获取焦点清空input的值
$('#start_time,#end_time').focus(function(){
  $(this).val('');
});


</script>
</body>

</html>