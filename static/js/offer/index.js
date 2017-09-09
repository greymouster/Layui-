
layui.use(['jquery','layer','form','element','laypage'],function(){
 var $ = layui.jquery;
  window.jQuery = window.$ = layui.jquery;
  window.layer = layui.layer;
  var element = layui.element(),
      laypage = layui.laypage;
  var form = layui.form();
  


	// 问答发布
	$(".offer-pub").on('click',function(){
		var url = $(this).data('url');
		var id = $(this).data('id');
		var status = $(this).data('status');		
		var title = '发布';
		var content="您确认执行发布操作么？";
		var field = {id:id,status:4};
		if(status == 4){
			layer.msg('只有未发布状态的问答才能处理哦！',{icon:2});
			return false;
		}
		layer_confrim(title,content,url,field);
	});  
	// 问答下线
	$(".offer-off").on('click',function(){
		var url = $(this).data('url');
		var id = $(this).data('id');
		var status = $(this).data('status');		
		var title = '下线';
		var content="您确认执行下线操作么？";
		var field = {id:id,status:5};
		if(status == 5){
			layer.msg('只有未下线状态的问答才能处理哦！',{icon:2});
			return false;
		}
		layer_confrim(title,content,url,field);
	});  
	// 问答删除
	$(".offer-del").on('click',function(){
		var url = $(this).data('url');
		var id = $(this).data('id');
		var is_delete = $(this).data('is_delete');		
		var title = '删除';
		var content="您确认执行删除操作么？";
		var field = {id:id,is_delete:1};

		layer_confrim(title,content,url,field);
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
							window.location.href = window.location.href ;
						}, 1500);
					}else{
						layer.msg(data.msg, {icon: 5});
					}  
					 
				}
			});
			layer.close(index);
		});
	}
	

	
});
//监听提交
  function search(){
  	var system_id = $("select[name=system_id]").val();
  	var category_id = $("select[name=category_id]").val();
  	if(system_id == 35 && category_id == ''){
  		layer.msg('请选择培训案例分类',{icon:5});
		return false;
  	}
  	if(category_id!=''){
  		$("select[name=system_id]").find("option[value=35]").attr("selected",true);
  	}
  	$('#form1').submit()
  }

  window.onload=function(){
  	$(".layui-input-inline.xh_div dl dd").on("click",function(){
  		$(".sys_change").find("dd[lay-value=35]").click();
  		$("select[name=system_id]").find("option[value=35]").attr("selected",true);
		
	});
	
  }

  

	

