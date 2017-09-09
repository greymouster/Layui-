
layui.use(['jquery'],function(){
	window.jQuery = window.$ = layui.jquery;
   $(".layui-canvs").width($(window).width());
   $(".layui-canvs").height($(window).height());

});


$(function(){
	$(".layui-canvs").jParticle({
		background: "#141414",
		color: "#E6E6E6"
	});
    //登录
	$(".submit_btn").click(function(){
		var username = $.trim($("input[name='username']").val());
        var password = $.trim($("input[name='password']").val());
        var url = $(this).data('url');
        if(username == '' || password == '' ){
        	layer.msg('用户名或密码不能为空',{icon:5,offset: ['55%', '45%']});
        	return false;
        }
        $.ajax({
        	url:url,
        	data:{username:username,password:password},
        	dataType:'json',
        	type:'post',
        	success:function(data){
        		if(data.status > 0){
        			layer.msg(data.msg,{icon:6,offset: ['55%', '45%']});
        			 setTimeout(function () {
                         window.location.href = data.back_url;
                     }, 1500);
        		}else{
        			layer.msg(data.msg,{icon:5,offset: ['55%', '45%']});
        			return false;
        		}
        	}
        });
	});
});