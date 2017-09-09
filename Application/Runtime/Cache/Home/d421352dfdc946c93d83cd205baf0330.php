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
</head>

<body>
  <div class="layui-tab-title" style="background:#f2f2f2;z-index:9999;width:100%;line-height:40px;position:fixed;top:6px;border-top:solid 2px #1AA094;">
    <i class="iconfont icon-diannao1" style="margin-left:15px;"></i>
    <span class="layui-breadcrumb" style="color:#fff;font-size:18px;">
		  <a href="javascript:;">运营</a>
		   <a href="<?php echo U('Special/index');?>">营销单页管理</a>
		  <a><cite class='change-text'>专题管理</cite></a>
	</span>
  </div>
  <section class="layui-larry-box" style="margin-top:20px;">
    <div class="larry-personal">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
           <?php if(I('get.flag') == 1): ?><li class="site-demo-active ">专题管理</li>
			   <li class="site-demo-active layui-this ">回收站</li>
		   <?php else: ?>
			   <li class="site-demo-active layui-this">专题管理</li>
			   <li class="site-demo-active">回收站</li><?php endif; ?>
        </ul>
        <div class="layui-tab-content">
          <div class='layui-tab-item  <?php if(I('get.flag') != 1): ?>layui-show<?php endif; ?>'>
            <fieldset class="layui-elem-field">
              <div class="layui-field-box">
                <form class="layui-form"  action="" >  
				  <div class="layui-form-item ">
				    <label class="layui-form-label" style="width:100px;">申请国家:</label>
				    <div class="layui-input-block">
				      <input type="checkbox" title="全选" lay-skin="primary"   lay-filter="Choose-all"> 
				      <?php if(is_array($country)): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox"  lay-skin="primary" <?php if(strpos(','.$country_name.',',','.$vo['country_name'].',')!==false): ?>checked<?php endif; ?> name="country_name[<?php echo ($vo["country_id"]); ?>]" <?php echo ($checked); ?> value="<?php echo ($vo["country_name"]); ?>" title="<?php echo ($vo["country_name"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
				    </div>
				  </div>
                  <div class="layui-form-item">
				    <label class="layui-form-label " style="width:100px;">留学阶段:</label>
				    <div class="layui-input-block">
				      <input type="radio" name="current_state" <?php if(I('get.current_state') == '准备留学' && I('get.flag') != 1): ?>checked<?php endif; ?> value="准备留学" title="准备留学">
				      <input type="radio" name="current_state" <?php if(I('get.current_state') == '留学中' && I('get.flag') != 1): ?>checked<?php endif; ?> value="留学中" title="留学中">
				    </div>
				  </div>  
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:100px;">按日期查询:</label>
                    <div class="layui-input-inline">
                      <select name="time">
				        <option value="">--时间类型--</option>
				        <option value="1" <?php if(I('time') == 1 && I('get.flag') != 1): ?>selected<?php endif; ?>>创建时间</option>
				        <option value="2" <?php if(I('time') == 2 && I('get.flag') != 1): ?>selected<?php endif; ?>>更新时间</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="start_time" id="start_time" value="<?php if(I('get.start_time') && I('get.flag') != 1) echo I('get.start_time')?>" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">到</div>
                    <div class="layui-input-inline">
                      <input type="text" name="end_time" id="end_time" value="<?php if(I('get.end_time') && I('get.flag') != 1) echo I('get.end_time')?>" autocomplete="off" class="layui-input">
                    </div>
                    <label class="layui-form-label" style="width:100px;">专题标题:</label>
                    <div class="layui-input-inline">
                       <input type="text" name="title" value="<?php if(I('get.title') && I('get.flag') != 1) echo I('get.title'); ?>"  placeholder="请输入专题标题查询"  class="layui-input" >
                    </div>
                    <div class="layui-input-inline">
                      <button class="layui-btn layui-btn-normal" >查询</button>
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
                <a href="<?php echo U('Special/add');?>" class="layui-btn layui-btn-normal">添加</a>
              </div>
              <div class="layui-input-inline">
                <button data-url="<?php echo U('Special/change_state');?>" class="layui-btn layui-btn-normal  change-all-status">批量删除</button>
              </div>
            </div>
            <table class="layui-table table-hover table1" lay-even="" lay-skin="nob">
                <colgroup>
				    <col width="40">
				    <col width="40">
				    <col>
				    <col width="300">
				    <col width="120">
				    <col width="100">
				    <col width="100">
				    <col width="100">
				    <col width="150">
				    <col width="150">
				    <col width="220">

				  </colgroup>
              <thead>
                <tr>
                  <th>选择</th>
                  <th>ID</th>
                  <th>标题</th>
                  <th>申请国家</th>
                  <th>毕业阶段</th>
                  <th>浏览次数</th>
                  <th>点击次数</th>
                  <th>创建者</th>
                  <th>创建时间</th>
                  <th>更新时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
               <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
                  <td>
                    <div class="layui-form"><input type="checkbox" value="<?php echo ($vo["id"]); ?>" lay-skin="primary"></div>
                  </td>
                  <td><?php echo ($vo["id"]); ?></td>
                  <td><a href="<?php echo U('Special/edit');?>?id=<?php echo ($vo["id"]); ?>" style="color:#34A8FF;"><?php echo ((isset($vo["title"]) && ($vo["title"] !== ""))?($vo["title"]):"--"); ?></a></td> 
                  <td><?php echo ((isset($vo["country_name"]) && ($vo["country_name"] !== ""))?($vo["country_name"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["current_state"]) && ($vo["current_state"] !== ""))?($vo["current_state"]):"--"); ?></td>
                  <td><?php echo ($vo["read_num"]); ?></td>
                  <td><?php echo ($vo["click"]); ?></td>
                  <td><?php echo ($vo["author"]); ?></td>
	              <td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td>
	              <td><?php echo (date("Y-m-d H:i:s",$vo["update_time"])); ?></td>
                  <td>
                     <a class="layui-btn" href="<?php echo U('Special/edit');?>?id=<?php echo ($vo["id"]); ?>" ><i class="layui-icon">&#xe642;</i>编辑</a>
                     <!-- <button class="layui-btn layui-btn-normal" ><i class="layui-icon">&#xe609;</i>发布</button> -->
                     <button class="layui-btn layui-btn-danger change-state" data-id="<?php echo ($vo["id"]); ?>"  data-url="<?php echo U('Special/change_state');?>"><i class="layui-icon">&#xe640;</i>删除</button>
                  </td>
                </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
            <div class=" clearfix">
                  <div style="text-align:center;"><?php echo ($page); ?></div>
            </div>
          </div>
          
          <div class='layui-tab-item  <?php if(I('get.flag') == 1): ?>layui-show<?php endif; ?>'>
          
           <fieldset class="layui-elem-field">
              <div class="layui-field-box">
                <form class="layui-form"  action="" >  
                  <input type="hidden" value="1" name="flag">
				  <div class="layui-form-item ">
				    <label class="layui-form-label" style="width:100px;">申请国家:</label>
				    <div class="layui-input-block">
				      <input type="checkbox" title="全选" lay-skin="primary"   lay-filter="Choose-all"> 
				      <?php if(is_array($country)): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(strpos(','.$countryId.',',','.$vo['country_id'].',') !== false && I('get.flag') !=1 ){ $checked = "checked"; }else{ $checked = ''; } ?>
				            <input type="checkbox"  lay-skin="primary"  name="country_id[<?php echo ($vo["country_id"]); ?>]" <?php echo ($checked); ?> value="<?php echo ($vo["country_id"]); ?>" title="<?php echo ($vo["country_name"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
				    </div>
				  </div>
                  <div class="layui-form-item">
				    <label class="layui-form-label " style="width:100px;">留学阶段:</label>
				    <div class="layui-input-block">
				      <input type="radio" name="current_state" <?php if(I('get.current_state') == '准备留学' && I('get.flag') == 1): ?>checked<?php endif; ?> value="准备留学" title="准备留学">
				      <input type="radio" name="current_state" <?php if(I('get.current_state') == '留学中' && I('get.flag') == 1): ?>checked<?php endif; ?> value="留学中" title="留学中">
				    </div>
				  </div>  
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:100px;">按日期查询:</label>
                    <div class="layui-input-inline">
                      <select name="time">
				        <option value="">--时间类型--</option>
				        <option value="1" <?php if(I('time') == 1 && I('get.flag') == 1): ?>selected<?php endif; ?>>创建时间</option>
				        <option value="3" <?php if(I('time') == 3 && I('get.flag') == 1): ?>selected<?php endif; ?>>删除时间</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="start_time" id="start_time" value="<?php if(I('get.start_time') && I('get.flag') == 1 ) echo I('get.start_time')?>" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">到</div>
                    <div class="layui-input-inline">
                      <input type="text" name="end_time" id="end_time" value="<?php if(I('get.end_time') && I('get.flag') == 1 ) echo I('get.end_time')?>" autocomplete="off" class="layui-input">
                    </div>
                    <label class="layui-form-label" style="width:100px;">专题标题:</label>
                    <div class="layui-input-inline">
                       <input type="text" name="title" value="<?php if(I('get.title') && I('get.flag') == 1 ) echo I('get.title'); ?>"  placeholder="请输入专题标题查询"  class="layui-input" >
                    </div>
                    <div class="layui-input-inline">
                      <button class="layui-btn layui-btn-normal" >查询</button>
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
                <button data-url="<?php echo U('Special/delAllSpecial');?>" class="layui-btn layui-btn-normal del-special"><i class="layui-icon">&#xe640;</i>清空回收站</button>
              </div>
            </div>
            <table class="layui-table table-hover table1" lay-even="" lay-skin="nob">
              <thead>
                <tr>
                  <th>选择</th>
                  <th>ID</th>
                  <th>标题</th>
                  <th>申请国家</th>
                  <th>毕业阶段</th>
                  <th>浏览次数</th>
                  <th>点击次数</th>
                  <th>创建者</th>
                  <th>创建时间</th>
                  <th>删除时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
               <?php if(is_array($data1)): foreach($data1 as $key=>$vo): ?><tr>
                  <td>
                    <div class="layui-form"><input type="checkbox" value="<?php echo ($vo["id"]); ?>" lay-skin="primary"></div>
                  </td>
                  <td><?php echo ($vo["id"]); ?></td>
                  <td><a href="<?php echo U('Special/edit');?>?id=<?php echo ($vo["id"]); ?>" style="color:#34A8FF;"><?php echo ((isset($vo["title"]) && ($vo["title"] !== ""))?($vo["title"]):"--"); ?></a></td> 
                  <td><?php echo ((isset($vo["country_name"]) && ($vo["country_name"] !== ""))?($vo["country_name"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["current_state"]) && ($vo["current_state"] !== ""))?($vo["current_state"]):"--"); ?></td>
                  <td><?php echo ($vo["read_num"]); ?></td>
                  <td><?php echo ($vo["click"]); ?></td>
                  <td><?php echo ($vo["author"]); ?></td>
	              <td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td>
	              <td><?php echo (date("Y-m-d H:i:s",$vo["del_time"])); ?></td>
                  <td>
                    
                     <button data-url="<?php echo U('Special/change_state');?>" data-id="<?php echo ($vo["id"]); ?>" class="layui-btn layui-btn-normal return-special" ><i class="layui-icon">&#xe609;</i>还原</button>
   
                  </td>
                </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
            <div class=" clearfix">
                  <div style="text-align:center;"><?php echo ($page1); ?></div>
            </div>
          
          
          
          
          </div>
          
          
          
          
          
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="/static/common/layui/layui.js"></script>
  <script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="/static/js/special/index.js"></script>
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