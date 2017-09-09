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
		   <a href="<?php echo U('Adlocation/index');?>">广告位管理</a>
		  <a><cite class='change-text'>广告位</cite></a>
	</span>
  </div>
  <section class="layui-larry-box" style="margin-top:20px;">
    <div class="larry-personal">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
		   <li class="site-demo-active layui-this">广告位</li>
		   <li class="site-demo-active  ">回收站</li>
        </ul>
        <div class="layui-tab-content">
          <div class='layui-tab-item  layui-show'>
            <fieldset class="layui-elem-field" >
              <div class="layui-field-box" style="margin-top:20px;">
                <form class="layui-form"  action="" >  
				  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;">广告位置:</label>
                    <div class="layui-input-inline">
                      <select name="position_id">
				        <option value="">--请选择广告位置--</option>
				        <?php if(is_array($position)): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["position_id"]); ?>" <?php if(I('position_id') == $v['position_id']): ?>selected<?php endif; ?> ><?php echo ($v["position_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				      </select>
                    </div>
                    <!--  <label class="layui-form-label" style="width:90px;">状态:</label>
                    <div class="layui-input-inline">
                      <select name="del_state">
				        <option value="">--处理状态--</option>
				        <option value="2" <?php if(I('del_state') == 2 && I('cert') != 1): ?>selected<?php endif; ?>>已处理</option>
				        <option value="1" <?php if(I('del_state') == 1 && I('cert') != 1): ?>selected<?php endif; ?>>未处理</option>
				      </select>
                    </div> -->
                    <label class="layui-form-label" style="width:100px;">发布日期:</label>
                    <div class="layui-input-inline">
                      <input type="text" name="start_time" id="start_time" value="<?php if(I('get.start_time')) echo I('get.start_time')?>" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">到</div>
                    <div class="layui-input-inline">
                      <input type="text" name="end_time" id="end_time" value="<?php if(I('get.end_time')) echo I('get.end_time')?>" autocomplete="off" class="layui-input">
                    </div>
                    <label class="layui-form-label" style="width:100px;">广告位标题:</label>
                    <div class="layui-input-inline">
                       <input type="text" name="adname" value="<?php if(I('get.adname')) echo I('get.adname')?>"  placeholder="请输入广告位标题查询"  class="layui-input" >
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
                <a href="<?php echo U('Adlocation/add');?>" class="layui-btn layui-btn-normal">添加</a>
              </div>
              <div class="layui-input-inline">
                <button data-url="<?php echo U('Adlocation/del_adlocation');?>" class="layui-btn layui-btn-normal  del-all">批量删除</button>
              </div>
            </div>
            <table class="layui-table table-hover table1" lay-even="" lay-skin="nob">
              <thead>
                <tr>
                  <th>选择</th>
                  <th>广告ID</th>
                  <th>标题</th>
                  <th>广告位置</th>
                  <th>发布日期</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php if(is_array($adloctionlist)): $i = 0; $__LIST__ = $adloctionlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td>
                    <div class="layui-form"><input type="checkbox" value="<?php echo ($vo["id"]); ?>" lay-skin="primary"></div>
                  </td>
                  <td><?php echo ($vo["id"]); ?></td>
                  <td><a href="<?php echo U('Adlocation/add');?>?id=<?php echo ($vo["id"]); ?>&type=1" style="color:#34A8FF;"><?php echo ($vo["adname"]); ?></a></td> 
				  
				   <?php if(is_array($position)): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vocate): $mod = ($i % 2 );++$i; if($vocate['position_id'] == $vo['position_id'] ): ?><td><?php echo ($vocate["position_name"]); ?></td><?php endif; endforeach; endif; else: echo "" ;endif; ?>	
				  
                  <td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
				  <td>已发布</td>			  
                  <td>
                     <a class="layui-btn layui-btn-normal" href="<?php echo U('Adlocation/advert');?>?id=<?php echo ($vo["id"]); ?>"><i class="layui-icon">&#xe609;</i>编辑广告内容</a>
                     <a class="layui-btn" href="<?php echo U('Adlocation/add');?>?id=<?php echo ($vo["id"]); ?>&type=1" ><i class="layui-icon">&#xe642;</i>编辑</a>
                     <a class="layui-btn layui-btn-danger del_adlocation" data-id="<?php echo ($vo["id"]); ?>"  data-url="<?php echo U('Adlocation/del_adlocation');?>"><i class="layui-icon">&#xe640;</i>删除</a>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>				
              </tbody>
            </table>
            <div class=" clearfix">
                  <div style="text-align:center;"><?php echo ($page); ?></div>
            </div>
          </div>
          
          <div class="layui-tab-item">内容2</div>
          
          
          
          
          
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="/static/common/layui/layui.js"></script>
  <script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.min.js"></script>
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