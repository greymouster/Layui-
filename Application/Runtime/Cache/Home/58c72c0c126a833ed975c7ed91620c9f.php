<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>咨询管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" type="text/css" href="/static/common/layui/css/layui.css" media="all">
  <link rel="stylesheet" type="text/css" href="/static/common/bootstrap/css/bootstrap.css" media="all">
  <link rel="stylesheet" type="text/css" href="/static/common/global.css" media="all">
  <script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.min.js"></script>  

</head>

<body>
  <div class="layui-tab-title" style="background:#f2f2f2;z-index:9999;width:100%;line-height:40px;position:fixed;top:6px;border-top:solid 2px #1AA094;">
    <i class="iconfont icon-diannao1" style="margin-left:15px;"></i>
    <span class="layui-breadcrumb" style="color:#fff;font-size:18px;">
		  <a href="javascript:;">运营</a>
		  <a href="<?php echo U('Consult/index');?>">咨询管理</a>
		  <a><cite class='change-text'>经典问答</cite></a>
		</span>
  </div>
  <section class="layui-larry-box" style="margin-top:20px;">
    <div class="larry-personal">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
          <li class="layui-this site-demo-active">经典问答</li>
        </ul>
        <div class="layui-tab-content">
          <div class="layui-tab-item layui-show">
            <!-- 经典问答-->
            <fieldset class="layui-elem-field">
              <div class="layui-field-box">
                <form class="layui-form" action="/Consult/index.html">				
                  <div class="layui-form-item">                                       
					  <div class="layui-form-item" pane="">
						<label class="layui-form-label">申请国家</label>
						<div class="layui-input-block">
						<input id="ckAllcountry" type="checkbox" lay-skin="primary" title="全选" lay-filter="allcountry" />
						<?php if(is_array($country_list)): $i = 0; $__LIST__ = $country_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="county[]" lay-skin="primary" title="<?php echo ($vo["country_name"]); ?>" value="<?php echo ($vo["country_id"]); ?>" ><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					  </div> 					  
                  </div>
                  <div class="layui-form-item">
					  <div class="layui-form-item" pane="">
						<label class="layui-form-label">按阶段</label>
						<div class="layui-input-block">
						<input id="ckAlledu" type="checkbox" lay-skin="primary" title="全选" lay-filter="alledu" />						
						<?php if(is_array($edu_list)): $i = 0; $__LIST__ = $edu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="edu[]" lay-skin="primary" title="<?php echo ($vo["edu_name"]); ?>" value="<?php echo ($vo["edu_id"]); ?>" ><?php endforeach; endif; else: echo "" ;endif; ?> 
						</div>
					  </div> 
                  </div>
                  <div class="layui-form-item">
					  <div class="layui-form-item" pane="">
						<label class="layui-form-label">按类目</label>
						<div class="layui-input-block">
						<input id="ckAllcate" type="checkbox" lay-skin="primary" title="全选" lay-filter="allcate" />							
						<?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="cate[]" lay-skin="primary" title="<?php echo ($vo["cate_name"]); ?>" value="<?php echo ($vo["cate_id"]); ?>" ><?php endforeach; endif; else: echo "" ;endif; ?> 
						</div>
					  </div> 
                  </div>
                  <div class="layui-form-item">
					  <div class="layui-form-item" pane="">
						<label class="layui-form-label">按状态</label>
						<div class="layui-input-block">
						  <input id="ckAllstatus" type="checkbox" lay-skin="primary" title="全选" lay-filter="allstatus" />							
						  <input type="checkbox" name="status[]" lay-skin="primary" title="未审核" value="-1" >
						  <input type="checkbox" name="status[]" lay-skin="primary" title="已发布" value="1">
						  <input type="checkbox" name="status[]" lay-skin="primary" title="已下线" value="2">
						  <input type="checkbox" name="status[]" lay-skin="primary" title="已删除" value="-2">						  
						</div>
					  </div> 
                  </div>	
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;">按日期查询</label>
                    <div class="layui-input-inline">
                      <select name="time">
				        <option value="">--时间类型--</option>
				        <option value="1" <?php if(I('time') == 1): ?>selected<?php endif; ?>>创建时间</option>
				        <option value="2" <?php if(I('time') == 2): ?>selected<?php endif; ?>>更新时间</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="start_time" value="<?php echo I('get.start_time'); ?>" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">到</div>
                    <div class="layui-input-inline">
                      <input type="text" name="end_time" value="<?php echo I('get.end_time'); ?>" autocomplete="off" class="layui-input">
                    </div>
					<label class="layui-form-label" style="width:90px;">按问题标题</label>
					<div class="layui-input-inline"> 
					<input type="text" name="question_title" value="<?php echo I('get.question_title'); ?>"  placeholder="请输入问题标题查询"  class="layui-input" >
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
                <a href="<?php echo U('Consult/add');?>" class="layui-btn layui-btn-normal">添加</a>
              </div>
              <div class="layui-input-inline">
                <button class="layui-btn layui-btn-normal">批量导出</button>
              </div>
            </div>
            <table class="layui-table table-hover" lay-even="" lay-skin="nob">
                  <colgroup>
				    <col width="26">
				    <col width="26">
				    <col>
				    <col width="74">
				    <col width="74">
				    <col width="60">
				    <col width="100">
				    <col width="100">
				    <col width="60">
				    <col width="333">
				  </colgroup>
              <thead>
                <tr>
                  <th>
                    <div class="layui-form"><input type="checkbox" lay-skin="primary"></div>
                  </th>
                  <th>ID</th>
                  <th>问题标题</th>
                  <th>所属类目</th>
                  <th>阅读次数</th>
                  <th>创建者</th>
                  <th>创建时间</th>
                  <th>发布时间</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php if(is_array($consult_list)): $i = 0; $__LIST__ = $consult_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td>
                    <div class="layui-form"><input type="checkbox" value="1" lay-skin="primary"></div>
                  </td>
                  <td><?php echo ($vo["id"]); ?></td>
                  <td><a href="<?php echo U('Consult/edit');?>?id=<?php echo ($vo["id"]); ?>" style="color:#34A8FF;"><?php echo ($vo["question_title"]); ?></a></td>             
				   <?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vocate): $mod = ($i % 2 );++$i; if($vocate['cate_id'] == $vo['cate_id'] ): ?><td><?php echo ($vocate["cate_name"]); ?></td><?php endif; endforeach; endif; else: echo "" ;endif; ?>				  
                  <td><?php echo ($vo["read_click"]); ?></td>
                  <td><?php echo ($vo["author"]); ?></td>
                  <td><?php echo (date('Y-m-d',$vo["add_time"])); ?></td>
                  <td><?php echo (date('Y-m-d',$vo["add_time"])); ?></td>				 
				  <?php if($vo['status'] == 1): ?><td>已发布</td>
				  <?php elseif($vo['status'] == 2): ?><td>已下线</td>
				  <?php elseif($vo['status'] == -2): ?><td>已删除</td>				  
				  <?php else: ?> <td>未审核</td><?php endif; ?>
                   
                  <td>
				  <a href="/Home/Consult/edit/id/<?php echo ($vo["id"]); ?>" class="layui-btn"><i class="layui-icon">&#xe642;</i>编辑</a>
				  <button class="layui-btn consult-pub" data-status="<?php echo ($vo["status"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Consult/status_change');?>">发布</button>
				  <button class="layui-btn layui-btn-danger consult-off" data-status="<?php echo ($vo["status"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Consult/status_change');?>">下线</button>				  
				  <button class="layui-btn layui-btn-danger consult-del" data-status="<?php echo ($vo["status"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Consult/status_change');?>">删除</button>				  				 		  
				  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
              </tbody>
            </table>
            <div class="larry-table-page clearfix">
              <div id="page" class="page"><?php echo ($_page); ?></div>
            </div>

	
          </div>

        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="/static/common/layui/layui.js"></script>
  <script type="text/javascript" src="/static/js/consult/index.js"></script>
  <script type="text/javascript">
    //laypage分页





</script>
</body>

</html>