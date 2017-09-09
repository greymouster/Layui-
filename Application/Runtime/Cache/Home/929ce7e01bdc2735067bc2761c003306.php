<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>地址管理</title>
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
		  <a href="<?php echo U('Address/index');?>">地址管理</a>
		</span>
  </div>
  <section class="layui-larry-box" style="margin-top:20px;">
    <div class="larry-personal">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
          <li class="layui-this site-demo-active">地址管理</li>
        </ul>
        <div class="layui-tab-content">
          <div class="layui-tab-item layui-show">
            <!-- 地址管理-->
            <fieldset class="layui-elem-field">
              <div class="layui-field-box">
                <form class="layui-form" action="/Address/index.html">				
 

                  <div class="layui-form-item">
					<label class="layui-form-label" style="width:90px;">按公司地址</label>
					<div class="layui-input-inline"> 
					<input type="text" name="branch_name" value="<?php echo I('get.branch_name'); ?>"  placeholder="请输入分公司地址查询"  class="layui-input" >
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
                <a href="<?php echo U('Address/add');?>" class="layui-btn layui-btn-normal">添加</a>
              </div>
              <div class="layui-input-inline">
                <button class="layui-btn layui-btn-normal">批量导出</button>
              </div>
            </div>
            <table class="layui-table table-hover" lay-even="" lay-skin="nob">
                  <colgroup>
				    <col width="26">
				    <col width="260">
				    <col width="260">
				    <col width="260">
				    <col width="260">
				  </colgroup>
              <thead>
                <tr>
                  <th>
                    <div class="layui-form"><input type="checkbox" lay-skin="primary"></div>
                  </th>
                  <th>ID</th>
                  <th>公司名称</th>               
                  <th>添加时间</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <?php if(is_array($address_list)): $i = 0; $__LIST__ = $address_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td>
                    <div class="layui-form"><input type="checkbox" value="1" lay-skin="primary"></div>
                  </td>
                  <td><?php echo ($vo["id"]); ?></td>
                  <td><a href="<?php echo U('Address/edit');?>?id=<?php echo ($vo["id"]); ?>" style="color:#34A8FF;"><?php echo ($vo["branch_name"]); ?></a></td>             
                  <td><?php echo (date('Y-m-d',$vo["add_time"])); ?></td>			 
				  <?php if($vo['status'] == 1): ?><td>已发布</td>
				  <?php elseif($vo['status'] == 2): ?><td>已下线</td>
				  <?php elseif($vo['status'] == -2): ?><td>已删除</td>				  
				  <?php else: ?> <td>未审核</td><?php endif; ?>
                   
                  <td>
				  <a href="/Home/Address/edit/id/<?php echo ($vo["id"]); ?>" class="layui-btn"><i class="layui-icon">&#xe642;</i>编辑</a>
				  <button class="layui-btn address-pub" data-status="<?php echo ($vo["status"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Address/status_change');?>">发布</button>
				  <button class="layui-btn layui-btn-danger address-off" data-status="<?php echo ($vo["status"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Address/status_change');?>">下线</button>				  
				  <button class="layui-btn layui-btn-danger address-del" data-status="<?php echo ($vo["status"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('Address/status_change');?>">删除</button>				  				 		  
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
  <script type="text/javascript" src="/static/js/address/index.js"></script>
  <script type="text/javascript">
    //laypage分页





</script>
</body>

</html>