layui.use(['jquery', 'element', 'form'], function () {
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
	/**
	 * 三级联动 
	 */
	var provinceOption = cityOption = areaOption = '', cityData, areaData
	for (var i in threeSelectData) {
		provinceOption += "<option>"+i+"</option>"
	}
	$('select[name=province]').append(provinceOption)
	form.render('select')
	form.on('select(province)', function (data) {
		$('select[name=city]').html("<option>请选择城市</option>");
		form.render('select')
		cityData = threeSelectData[data.value].items
		for (var j in cityData) {
			cityOption += "<option>"+j+"</option>"
		}
		$('select[name=city]').append(cityOption)
		form.render('select')
		cityOption = ''
	})
	form.on('select(city)', function (data) {
		$('select[name=area]').html("<option>请选择县/区</option>");
		form.render('select')
		areaData = cityData[data.value].items
		for (var j in areaData) {
			areaOption += "<option>"+j+"</option>"
		}
		$('select[name=area]').append(areaOption)
		form.render('select')
		areaOption = ''
	})
})

$("#username,#email,#phone").blur(function(){
	$(this).css("border","solid 1px #e6e6e6");
});

/*添加注册用户*/
$(".add-user").click(function(){
	//验证昵称
	var username = $("#username").val();
	if(!username){
		layer.msg('用户昵称不能为空',{icon:5});
		$("#username").css("border","solid 1px red");
		return false;
	}
	
	//验证邮箱
	var email = $("#email").val();
	var reg =  /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/; 
	if(email && !reg.test(email)){
		layer.msg('邮箱格式不正确',{icon:5});
		$("#email").css("border","solid 1px red");
		return false;
	}
	
	/*//验证手机
	var phone = $("#phone").val();
	var mreg = /^1[34578]\d{9}$/;
	if( phone && !mreg.test(phone)){
		layer.msg("手机格式不正确",{icon:5});
		$("#phone").css("border","solid 1px red");
		return false;
	}*/
	
	var url = $(this).data('url');
	$("#form1").ajaxSubmit({
		type:"POST",
        url:url,
        success: function (data) {
            if(data.status > 0){
            	layer.msg(data.msg,{icon:6});
            	setInterval(function() {
            		window.location.href = data.back_url;
                }, 2000);
            }else{
            	layer.alert(data.msg,{icon:5});
            }
        }
	});
	return false;
});



