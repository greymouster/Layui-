
layui.use(['jquery','layer','form','element'],function(){
 var $ = layui.jquery;
  window.jQuery = window.$ = layui.jquery;
  window.layer = layui.layer;
  var element = layui.element(),
      laypage = layui.laypage;
  var form = layui.form();
  /*点击tab标题替换面包屑文本内容*/
  $('.site-demo-active').on('click', function(){
	   $(".change-text").text($(this).context.innerText);
	   
  });  
  
 //监听表单全选
  form.on('checkbox(allChoose)', function(data){
    var child = $(data.elem).parent().parent().next().find('input[type="checkbox"]');
    child.each(function(index, item){
        item.checked = data.elem.checked;
    }); 
    form.render('checkbox');
  });
 

});

// 处理用户
$(".user-chuli").on('click',function(){
	var url = $(this).data('url');
	var uid = $(this).data('uid');
	var cert = $(this).data('cert');
	var delState = $(this).data('del_state');
	var title = '处理';
	var content="本操作仅能执行一次，处理后，状态将由未处理变更为已处理，您确认执行此操作么？";
	var field = {uid:uid,cert:cert};
	if(delState == 2){
		layer.msg('只有未处理状态的才能处理哦！',{icon:2});
		return false;
	}
	layer_confrim(title,content,url,field);
});



//查看

$(".select-user").click(function(){
	var url = $(this).data('url');
	layer.open({
	  type: 2,
	  title:'注册用户基本信息',
	  skin: 'layui-layer-lan', //加上颜色
	  area: ['420px', '520px'], //宽高
	  shadeClose: true,
	  shade: 0,
	  content: url,
	});
});

// 处理用户状态
$(".change_user_status").click(function(){
	var title,content;
	var uid = $(this).data('uid');
	var status = $(this).data('status');
	var cert = $(this).data('cert');
	 title = (status==1) ? '冻结':'恢复';
	 content = (status==1)?'账号冻结后，该用户将不能登录。确认冻结？':' 账号恢复后，该客户将正常使用留学服务APP。确认恢复？';
	var url = $(this).data('url');
	var field = {uid:uid,status:status,cert:cert};
	layer_confrim(title,content,url,field);
});

//导出注册用户的excel
$(".export-excel-user").click(function(){
	var url = $(this).data('url');
	var arr = new Array();
	$(".table1 input[type='checkbox']:checked").each(function(index,val){
		arr.push($(this).val());
	});
	if(arr.length<1){
		layer.msg('请先选中要导出的才可执行哦',{icon:2});
		return false;
	}
   window.location.href=url+"?uids="+arr;
});

//导出认证用户的excel
$(".export-excel-cert").click(function(){
	var url = $(this).data('url');
	var cert = $(this).data('cert');
	var arr = new Array();
	$(".table2 input[type='checkbox']:checked").each(function(index,val){
		arr.push($(this).val());
	});
	if(arr.length<1){
		layer.msg('请先选中要导出的才可执行哦',{icon:2});
		return false;
	}
   window.location.href=url+"?uids="+arr+"&cert="+cert;
});

/*ajax提交*/
function layer_confrim(title,content,url,field){
	layer.confirm('', {
        btn: ['确定'], //按钮
        title:title,
        anim: 1,
        content:content,
    }, function (index) {
        $.ajax({
            url: url,
            data: field,
            type: "POST",
            dataType: "json",
            success: function (data) {
                if (data.status > 0) {
                    layer.msg(data.msg, {icon: 6});
                    setTimeout(function () {
                    	/*if(cert == 1){
                    		window.location.href = "/index.php/Home/User/index?cert="+cert;	
                    	}else{*/
                    		window.location.href = data.back_url;
                    	//}
                        
                    }, 1500);
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            }
        });
    	layer.close(index);
    });
}
