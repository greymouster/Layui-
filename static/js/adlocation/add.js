layui.use(['jquery', 'element', 'form'], function () {
	var $ = layui.jquery;
	window.jQuery = window.$ = layui.jquery;
	window.layer = layui.layer;
	var element = layui.element(),
		laypage = layui.laypage;
	var form = layui.form();
     
	form.on('select(position1)', function(data){
		  var str = $(this).context.innerText;
		  var str_num = str.split('x');
		  var width =  parseInt(str_num[0].replace(/[^0-9]/ig,""));
		  var height = parseInt(str_num[1].replace(/[^0-9]/ig,""));
		  $(this).parent().parent().parent().parent().find('#width').val(width);
		  $(this).parent().parent().parent().parent().find('#height').val(height);
    });
	
	//监听提交
	  form.on('submit(add-adlocation)', function(data){
		  var params = data.field;
		  $.ajax({
			  url:'/Home/Adlocation/add',
			  data:params,
			  type:'POST',
			  success:function(data){
				  if(data.status>0){
					  layer.msg(data.msg,{icon:6});
		              setInterval(function(){
		            	  window.location.href = data.back_url;
		              },1500);
				  }else{
					  layer.msg(data.msg,{icon:5});
				  }
			  }
		  })
	      
	      return false;
	  });
	
})




