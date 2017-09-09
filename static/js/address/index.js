
layui.use(['jquery','layer','form','element','laypage'],function(){
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
  form.on('checkbox(allcountry)', function(data){
	  $("input[name='county[]']").prop("checked", this.checked);
	     
     form.render('checkbox');
  });

 //监听表单全选
  form.on('checkbox(alledu)', function(data){
	  $("input[name='edu[]']").prop("checked", this.checked);
	     
     form.render('checkbox');
  });

 //监听表单全选
  form.on('checkbox(allcate)', function(data){
	  $("input[name='cate[]']").prop("checked", this.checked);
	     
     form.render('checkbox');
  }); 

 //监听表单全选
  form.on('checkbox(allstatus)', function(data){
	  $("input[name='status[]']").prop("checked", this.checked);
	     
     form.render('checkbox');
  });   


	// 公司信息发布
	$(".address-pub").on('click',function(){
		var url = $(this).data('url');
		var id = $(this).data('id');
		var status = $(this).data('status');		
		var title = '发布';
		var content="您确认执行发布操作么？";
		var field = {id:id,status:1};
		if(status == 1){
			layer.msg('只有未发布状态的公司信息才能处理哦！',{icon:2});
			return false;
		}
		layer_confrim(title,content,url,field);
	});  
	// 公司信息下线
	$(".address-off").on('click',function(){
		var url = $(this).data('url');
		var id = $(this).data('id');
		var status = $(this).data('status');		
		var title = '下线';
		var content="您确认执行下线操作么？";
		var field = {id:id,status:2};
		if(status == 2){
			layer.msg('只有未下线状态的公司信息才能处理哦！',{icon:2});
			return false;
		}
		layer_confrim(title,content,url,field);
	});  
	// 公司信息删除
	$(".address-del").on('click',function(){
		var url = $(this).data('url');
		var id = $(this).data('id');
		var status = $(this).data('status');		
		var title = '删除';
		var content="您确认执行删除操作么？";
		var field = {id:id,status:-2};

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


