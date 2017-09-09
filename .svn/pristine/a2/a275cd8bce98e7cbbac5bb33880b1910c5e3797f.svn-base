
layui.use(['jquery','layer','form','upload','element'],function(){
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
  	
    form.on('radio(check)',function(data){
 	  $(".advert-url").css('display','none');
	  $(".special").css('display','none');
	  $(".offer").css('display','none');
	  $("."+$(this).data('type')+"").css('display','block');
	  
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



$("#advert_title,#advert_url,#special,#start_time,#end_time").blur(function(){
	$(this).css("border","solid 1px #e6e6e6");
});


// 保存广告
$(".save-advert").click(function(){
	var advert_title = $.trim($("#advert_title").val());
    if(advert_title == ''){
    	layer.msg('标题不能为空',{icon:5});
    	$("#advert_title").css('border','solid 1px red');
    	return false;
    }
    var advert_url = $.trim($("#advert_url").val());
    var special = $.trim($("#special").val());
    var offer = $.trim($("#offer").val());	
    if(advert_url=="" && special == "" && offer == ""){
    	layer.msg("请输入跳转链接或选择关联营销单页",{icon:5});
    	$("#advert_url,#special,#offer").css('border','solid 1px red');
    	return false;
    }
    var status = $("input[name='status']:checked").val();
    if(!status){
    	layer.msg("请选择状态",{icon:5});
    	return false;
    }
    
    var start_time = $.trim($("#start_time").val());
    var end_time = $.trim($("#end_time").val());
    /*if(!start_time || !end_time ){
    	layer.msg("投放开始日期和结束日期不能为空",{icon:5});
    	$("#start_time,#end_time").css('border','solid 1px red');
    	return false;
    }*/
    
    var url = $(this).data('url');
    $("#myform").ajaxSubmit({
    	url :url,
    	type:'POST',
    	success:function(data){
    		if(data.status > 0){
            	layer.msg(data.msg,{icon:6});
            	setInterval(function() {
            		window.location.href=window.location.href; 
                }, 2000);
            }else{
            	layer.alert(data.msg,{icon:5});
            }
    	}
    });
});

//删除广告

$(".change-state").on('click',function(){
	var url = $(this).data('url');
	var id = $(this).data('id');
	var title = '删除';
	var content="执行删除操作后，该条数据将改为删除状态。确认执行此操作？";
	var field = {id:id};
	layer_confrim(title,content,url,field);
});

// 删除广告位
$(".del_adlocation").on('click',function(){
	var url = $(this).data('url');
	var id = $(this).data('id');
	
	var title = '删除';
	var content="执行删除操作后，该条数据将进入广告回收站。确认执行此操作？";
	var field = {id:id};
	layer_confrim(title,content,url,field);
});

//批量删除广告位
$(".del-all").click(function(){
	var url = $(this).data('url');
	var arr = new Array();
	$(".table1 input[type='checkbox']:checked").each(function(index,val){
		console.log($(this).val());
		arr.push($(this).val());
	});
	if(arr.length<1){
		layer.msg('请先选中要删除的广告位才可执行哦',{icon:2});
		return false;
	}
	var title = '批量删除',
    content = '执行批量删除操作后,数据将全部进入回收站。确定执行此操作？', 
    field = {id:arr};
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
                    	/*if(cert == 1){
                    		window.location.href = "/index.php/Home/User/index?cert="+cert;	
                    	}else{*/
                    		window.location.href = window.location.href;
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
