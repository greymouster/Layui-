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
  
  //监听提交
  form.on('submit(save)', function(data){
		params = data.field;
		if(params.country_id==undefined ){
		layer.msg("请选择国家",{icon:5});
			return false;		
		}
		if(params.edu_id==undefined ){
		layer.msg("请选择阶段",{icon:5});	
		   return false;
		}
		if(params.cate_id==undefined ){
		layer.msg("请选择类目",{icon:5});
          return false;		
		}		
		submit($,params);
		return false;
  });
  
 

})

//提交
function submit($,params){
 
			
			$.post("/Home/Consult/save", params, function(data) {
            if(data.status > 0){
            	layer.msg(data.msg,{icon:6});
            	setInterval(function() {
            		window.location.href = data.back_url;
                }, 2000);
            }else{
            	layer.alert(data.msg,{icon:5});
            }
			});			
        }
		


 
 
