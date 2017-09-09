layui.use(['jquery', 'element', 'form', 'layedit'], function () {
 	


	var $ = layui.jquery;
	window.jQuery = window.$ = layui.jquery;
	window.layer = layui.layer;
	layedit = layui.layedit;
	//创建一个编辑器
    var editIndex = layedit.build('LAY_demo_editor');	
	var element = layui.element(),
		laypage = layui.laypage;
	var form = layui.form();
	
  //自定义验证规则 
  form.verify({
    content: function(value){
      layedit.sync(editIndex);
    }	
  });
  
  var $ = layui.jquery;
	window.jQuery = window.$ = layui.jquery;
	window.layer = layui.layer;
	var element = layui.element(),
		laypage = layui.laypage;
	var form = layui.form();

	$('#avatar').change(function () {
		var newImage = $(this).context.files[0]
		if (!/image\/\w+/.test(newImage.type)) {
			alert("请确保文件为图像类型");
			return false;
		}
		var reader = new FileReader()
		reader.readAsDataURL(newImage)
		reader.onload = function () {
			$('#LAY_demo_upload').attr('src', this.result)
		}
	})

  //监听提交
  form.on('submit(save)', function(data){
		params = data.field;
		//alert(params.system_id)
		//alert(params.px_cate_id)
		if(params.system_id==undefined){
		layer.msg("请选择文章类目",{icon:5});
			return false;		
		}
		if(params.system_id==4 && params.px_cate_id==undefined){
		layer.msg("请选择培训案例分类",{icon:5});
			return false;		
		}
		
		if(params.content=='' ){
		layer.msg("请输入文章内容",{icon:5});	
		   return false;
		}

		var is_main = $('input[name="is_main"]:checked').val();
		if(is_main){
			data.field.is_main_up = is_main;
		}
		//params.file = file;
		/*if(params.cate_id==undefined ){
		layer.msg("请选择类目",{icon:5});
          return false;		
		}		*/
		
		/*submit($,data);*/

	    $("#myform").ajaxSubmit({
	    	url :"/Home/Offer/save",
	    	type:'POST',
	    	success:function(data){
	    		if(data.status > 0){
	            	layer.msg(data.msg,{icon:6});
	            	setInterval(function() {
	            		window.location.href=data.back_url; 
	                }, 2000);
	            }else{
	            	layer.alert(data.msg,{icon:5});
	            }
	    	}
	    });
		return false;
  });


})

//提交
/*function submit($,params){
 

			$.post("/Home/Offer/save", params, function(data) {
            if(data.status > 0){
            	layer.msg(data.msg,{icon:6});
            	setInterval(function() {
            		window.location.href = data.back_url;
                }, 2000);
            }else{
            	layer.alert(data.msg,{icon:5});
            }
			});			
        }*/
		
window.onload=function(){
	$('#px').next().attr('style','float:left')
  	$(".category div").on("click",function(){
  		//alert($('#px').val())
  		$('#px').next().click();
  		
	});

	$(".re").next('div').on("click",function(){
		$('input[name=px_cate_id]').last().next().click();
	});
  }


 
 
