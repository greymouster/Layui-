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
		  <a href="javascript:;">用户</a>
		  <a href="<?php echo U('User/index');?>">用户管理</a>
		  <a><cite class='change-text'>注册用户</cite></a>
		</span>
  </div>
  <section class="layui-larry-box" style="margin-top:20px;">
    <div class="larry-personal">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <?php if(I('get.cert') == 1): ?><li class="site-demo-active">注册用户</li>
			   <li class="layui-this site-demo-active">认证用户</li>
			<?php else: ?>
			   <li class="layui-this  site-demo-active">注册用户</li>
			   <li class="site-demo-active">认证用户</li><?php endif; ?>  
        </ul>
        <div class="layui-tab-content">
          <div class='layui-tab-item <?php if(I('get.cert') != 1 ): ?>layui-show<?php endif; ?>'>
            <!-- 注册用户-->
            <fieldset class="layui-elem-field">
              <div class="layui-field-box">
                <form class="layui-form"  id="form1" action="" >
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;">搜索条件</label>
                    <div class="layui-input-inline">
                      <select name="real_user">
				        <option value="">--用户注册来源--</option>
				        <option value="1" <?php if(I('real_user') == 1 && I('cert') != 1): ?>selected<?php endif; ?>>注册用户</option>
				        <option value="2" <?php if(I('real_user') == 2 && I('cert') != 1): ?>selected<?php endif; ?>>虚拟用户</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <select name="del_state">
				        <option value="">--处理状态--</option>
				        <option value="2" <?php if(I('del_state') == 2 && I('cert') != 1): ?>selected<?php endif; ?>>已处理</option>
				        <option value="1" <?php if(I('del_state') == 1 && I('cert') != 1): ?>selected<?php endif; ?>>未处理</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <select name="status">
				        <option value="">--账号状态--</option>
				        <option value="1" <?php if(I('status') == 1 && I('cert') != 1): ?>selected<?php endif; ?>>正常</option>
				        <option value="-1" <?php if(I('status') == -1 && I('cert') != 1): ?>selected<?php endif; ?>>已冻结</option>
				      </select>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;"></label>
                    <div class="layui-input-inline">
                      <select name="info">
				        <option value="">--个人信息--</option>
				        <option value="1" <?php if(I('info') == 1 && I('cert') != 1): ?>selected<?php endif; ?>>手机号</option>
				        <option value="2" <?php if(I('info') == 2 && I('cert') != 1): ?>selected<?php endif; ?>>邮箱</option>
				        <option value="3" <?php if(I('info') == 3 && I('cert') != 1): ?>selected<?php endif; ?>>用户名</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="keywords" value="<?php if(I('get.keywords') && I('cert') != 1) echo I('get.keywords') ?>" placeholder="请输入关键字搜索" autocomplete="off" class="layui-input">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;">按日期查询</label>
                    <div class="layui-input-inline">
                      <select name="time">
				        <option value="">--时间类型--</option>
				        <option value="1" <?php if(I('time') == 1): ?>selected<?php endif; ?>>注册时间</option>
				        <option value="2" <?php if(I('time') == 2): ?>selected<?php endif; ?>>登录时间</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="start_time" id="start_time" value="<?php if(I('get.start_time') && I('cert') != 1) echo I('get.start_time')?>" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">到</div>
                    <div class="layui-input-inline">
                      <input type="text" name="end_time" id="end_time" value="<?php if(I('get.end_time') && I('cert') != 1) echo I('get.end_time')?>" autocomplete="off" class="layui-input">
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
                <a href="<?php echo U('User/add');?>" class="layui-btn layui-btn-normal">添加</a>
              </div>
              <div class="layui-input-inline">
                <button data-url="<?php echo U('User/export_excel');?>" class="layui-btn layui-btn-normal export-excel-user">批量导出</button>
              </div>
            </div>
            <table class="layui-table table-hover table1" lay-even="" lay-skin="nob">
              <thead>
                <tr>
                  <th>选择</th>
                  <th>用户ID</th>
                  <th>昵称</th>
                  <th>手机号</th>
                  <th>邮箱</th>
                  <th>微信号</th>
                  <th>注册时间</th>
                  <th>登录时间</th>
                  <th>处理状态</th>
                  <th>账号状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
               <?php if(is_array($res)): foreach($res as $key=>$vo): ?><tr>
                  <td>
                    <div class="layui-form"><input type="checkbox" value="<?php echo ($vo["uid"]); ?>" lay-skin="primary"></div>
                  </td>
                  <td><?php echo ($vo["uid"]); ?></td>
                  <td><?php echo ((isset($vo["nickname"]) && ($vo["nickname"] !== ""))?($vo["nickname"]):"--"); ?></td> 
                  <td><?php echo ((isset($vo["phone"]) && ($vo["phone"] !== ""))?($vo["phone"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["email"]) && ($vo["email"] !== ""))?($vo["email"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["weixin"]) && ($vo["weixin"] !== ""))?($vo["weixin"]):"--"); ?></td>
                  <td><?php echo (date("Y-m-d H:i:s",$vo["reg_time"])); ?></td>
                  <td><?php echo (date("Y-m-d H:i:s",$vo["log_time"])); ?></td>
                  <?php if($vo["del_state"] == 2): ?><td>已处理</td>
	                  <?php else: ?>
	                  <td style="color:green">未处理</td><?php endif; ?>
                  <?php if($vo["status"] == 1): ?><td>正常</td>
	                  <?php else: ?>
	                  <td>已冻结</td><?php endif; ?>
                  <td>
                     <button class="layui-btn user-chuli" data-del_state="<?php echo ($vo["del_state"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-url="<?php echo U('User/change_status');?>"><i class="layui-icon">&#xe642;</i>处理</button>
                     <button class="layui-btn layui-btn-normal select-user" data-url="<?php echo U('User/user_list');?>?uid=<?php echo ($vo["uid"]); ?>"><i class="layui-icon">&#xe609;</i>查看</button>
                     <?php if($vo["status"] == 1): ?><button class="layui-btn layui-btn-danger  change_user_status" data-status="<?php echo ($vo["status"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-url="<?php echo U('User/change_user_status');?>"><i class="layui-icon">&#xe640;</i>冻结</button>
                     <?php else: ?>
                         <button class="layui-btn layui-btn-warm  change_user_status" data-status="<?php echo ($vo["status"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-url="<?php echo U('User/change_user_status');?>"><i class="layui-icon">&#xe640;</i>恢复</button><?php endif; ?>    
                  </td>
                </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
            <div class=" clearfix">
                  <div style="text-align:center;"><?php echo ($page1); ?></div>
            </div>
          </div>
          <!-- 认证用户 -->
          <div class='layui-tab-item layui-field-box <?php if(I('get.cert') == 1 ): ?>layui-show<?php endif; ?>' style="padding:0px;">
            <fieldset class="layui-elem-field">
              <div class="layui-field-box">
                <form class="layui-form" action="" id="form2">
                  <input type="hidden" name='cert' value="1">
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;">搜索条件</label>
                    <div class="layui-input-inline">
                      <select name="real_user">
				        <option value="">--用户注册来源--</option>
				        <option value="1" <?php if(I('real_user') == 1 && I('cert') == 1): ?>selected<?php endif; ?>>注册用户</option>
				        <option value="2" <?php if(I('real_user') == 2 && I('cert') == 1): ?>selected<?php endif; ?>>虚拟用户</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <select name="current_status">
				        <option value="">--当前状态--</option>
				        <option value="准备留学" <?php if(I('current_status') == '准备留学' && I('cert') == 1 ): ?>selected<?php endif; ?>>准备留学</option>
				        <option value="留学中" <?php if(I('current_status') == '留学中' && I('cert') == 1 ): ?>selected<?php endif; ?>>留学中</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <select name="del_state">
				        <option value="">--处理状态--</option>
				        <option value="2" <?php if(I('del_state') == 2 && I('cert') == 1): ?>selected<?php endif; ?>>已处理</option>
				        <option value="1" <?php if(I('del_state') == 1 && I('cert') == 1): ?>selected<?php endif; ?>>未处理</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <select name="status">
				        <option value="">--账号状态--</option>
				        <option value="1" <?php if(I('status') == 1 && I('cert') == 1): ?>selected<?php endif; ?>>正常</option>
				        <option value="-1" <?php if(I('status') == -1 && I('cert') == 1): ?>selected<?php endif; ?>>已冻结</option>
				      </select>
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;"></label>
                    <div class="layui-input-inline">
                      <select name="info">
				        <option value="">--个人信息--</option>
				        <option value="1" <?php if(I('info') == 1 && I('cert') == 1): ?>selected<?php endif; ?>>手机号</option>
				        <option value="2" <?php if(I('info') == 2 && I('cert') == 1): ?>selected<?php endif; ?>>邮箱</option>
				        <option value="3" <?php if(I('info') == 3 && I('cert') == 1): ?>selected<?php endif; ?>>用户名</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="keywords" value="<?php if(I('get.keywords') && I('cert')==1) echo I('get.keywords')?>" autocomplete="off" class="layui-input">
                    </div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:90px;">按日期查询</label>
                    <div class="layui-input-inline">
                      <select name="time">
				        <option value="">--时间类型--</option>
				        <option value="1" <?php if(I('time') == 1 && I('cert') == 1): ?>selected<?php endif; ?>>注册时间</option>
				        <option value="2" <?php if(I('time') == 2 && I('cert') == 1): ?>selected<?php endif; ?>>登录时间</option>
				      </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="start_time" id="start_time1" value="<?php if(I('get.start_time') && I('cert')==1) echo I('get.start_time')?>" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">到</div>
                    <div class="layui-input-inline">
                      <input type="text" name="end_time" id="end_time1" value="<?php if(I('get.end_time') && I('cert')==1) echo I('get.end_time')?>" autocomplete="off" class="layui-input">
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
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>全选</span><i class="layui-icon"></i></div>
              </div>
             <!--  <div class="layui-input-inline">
                <a href="<?php echo U('User/add');?>?cert=1" class="layui-btn layui-btn-normal">添加</a>
              </div> -->
              <div class="layui-input-inline">
                <button data-url="<?php echo U('User/export_excel');?>" data-cert="1" class="layui-btn layui-btn-normal export-excel-cert">批量导出</button>
              </div>
            </div>
            <table class="layui-table table-hover table2" lay-even="" lay-skin="nob">
              <thead>
                <tr>
                  <th>选择</th>
                  <th>用户ID</th>
                  <th>昵称</th>
                  <th>手机号</th>
                  <th>邮箱</th>
                  <th>微信号</th>
                  <th>当前状态（留学）</th>
                  <th>所获学位</th>
                  <th>就读院校</th>
                  <!-- <th>就读专业</th>
                  <th>所在地</th> -->
                  <th>注册时间</th>
                  <th>登录时间</th>
                  <th>处理状态</th>
                  <th>账号状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
               <?php if(is_array($res2)): foreach($res2 as $key=>$vo): ?><tr>
                  <td>
                    <div class="layui-form"><input type="checkbox" value="<?php echo ($vo["uid"]); ?>" lay-skin="primary"></div>
                  </td>
                  <td><?php echo ($vo["uid"]); ?></td>
                  <td><?php echo ((isset($vo["nickname"]) && ($vo["nickname"] !== ""))?($vo["nickname"]):"--"); ?></td> 
                  <td><?php echo ((isset($vo["phone"]) && ($vo["phone"] !== ""))?($vo["phone"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["email"]) && ($vo["email"] !== ""))?($vo["email"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["weixin"]) && ($vo["weixin"] !== ""))?($vo["weixin"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["current_state"]) && ($vo["current_state"] !== ""))?($vo["current_state"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["edu"]) && ($vo["edu"] !== ""))?($vo["edu"]):"--"); ?></td>
                  <td><?php echo ((isset($vo["school_name"]) && ($vo["school_name"] !== ""))?($vo["school_name"]):"--"); ?></td>
                  <!-- <td><?php echo ($vo["major_cat"]); ?>--<?php echo ($vo["major_name"]); ?></td>
                  <td><?php echo ($vo["province"]); ?>-<?php echo ($vo["city"]); ?>-<?php echo ($vo["area"]); ?></td> -->
                  <td><?php echo (date("Y-m-d H:i:s",$vo["reg_time"])); ?></td>
                  <td><?php echo (date("Y-m-d H:i:s",$vo["log_time"])); ?></td>
                  <?php if($vo["del_state"] == 2): ?><td>已处理</td>
	              <?php else: ?>
	                  <td style="color:green;">未处理</td><?php endif; ?>
                  <?php if($vo["status"] == 1): ?><td>正常</td>
	              <?php else: ?>
	                  <td>已冻结</td><?php endif; ?>
                  <td>
                     <button class="layui-btn user-chuli" data-cert="1" data-del_state="<?php echo ($vo["del_state"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-url="<?php echo U('User/change_status');?>"><i class="layui-icon">&#xe642;</i>处理</button>
                     <button class="layui-btn layui-btn-normal select-user" data-url="<?php echo U('User/user_list');?>?uid=<?php echo ($vo["uid"]); ?>"><i class="layui-icon">&#xe609;</i>查看</button>
                     <?php if($vo["status"] == 1): ?><button class="layui-btn layui-btn-danger  change_user_status" data-cert="1" data-status="<?php echo ($vo["status"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-url="<?php echo U('User/change_user_status');?>"><i class="layui-icon">&#xe640;</i>冻结</button>
                     <?php else: ?>
                         <button class="layui-btn layui-btn-warm  change_user_status" data-cert="1" data-status="<?php echo ($vo["status"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-url="<?php echo U('User/change_user_status');?>"><i class="layui-icon">&#xe640;</i>恢复</button><?php endif; ?>  
                  </td>
                </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
            <div class="larry-table-page clearfix">
               <div style="text-align:center;"><?php echo ($page2); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="/static/common/layui/layui.js"></script>
  <script type="text/javascript" src="/static/js/jquery-1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="/static/js/user/index.js"></script>
  <script type="text/javascript" src="/static/common/cxcalendar/js/jquery.cxcalendar.min.js"></script>
</body>
<script>

/*显示日历*/
$('#start_time,#start_time1,#end_time,#end_time1').cxCalendar();
// 获取焦点清空input的值
$('#start_time,#start_time1,#end_time,#end_time1').focus(function(){
	$(this).val('');
});
</script>
</html>