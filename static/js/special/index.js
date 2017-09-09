
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
  form.on('checkbox(Choose-all)', function(data){
    var child = $(data.elem).nextAll();
    child.each(function(index, item){
        item.checked = data.elem.checked;
    }); 
    form.render('checkbox');
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

// 删除
$(".change-state").on('click',function(){
	var url = $(this).data('url');
	var id = $(this).data('id');
	var title = '删除';
	var content="执行删除操作后，该条数据将进入营销单页回收站。确认执行此操作？";
	var field = {id:id,status:-1,is_del:1};
	layer_confrim(title,content,url,field);
});

//批量删除
$(".change-all-status").click(function(){
	var url = $(this).data('url');
	var arr = new Array();
	$(".table1 input[type='checkbox']:checked").each(function(index,val){
		arr.push($(this).val());
	});
	if(arr.length<1){
		layer.msg('请先选中要删除的专题才可执行哦',{icon:2});
		return false;
	}
	var title = '批量删除',
	    content = '执行批量删除操作后,数据将全部进入回收站。确定执行此操作？', 
	    field = {id:arr,status:-1,is_del:1};
	layer_confrim(title,content,url,field);
});
// 清空回收站
$(".del-special").click(function(){
	var url = $(this).data('url');
	var arr = new Array();
	$(".table1 input[type='checkbox']:checked").each(function(index,val){
		arr.push($(this).val());
	});
	if(arr.length<1){
		layer.msg('请先选中要清空的专题才可执行哦',{icon:2});
		return false;
	}
	var title = '删除',
	    content = '执行删除操作后，该条数据将被永久删除，此操作不可逆。确认删除？', 
	    field = {id:arr};
	layer_confrim(title,content,url,field);
});


//还原
$(".return-special").on('click',function(){
	var url = $(this).data('url');
	var id = $(this).data('id');
	var title = '还原';
	var content="执行还原操作后，该条数据将回到营销单页专题管理列表中。确认执行此操作？";
	var field = {id:id,status:1};
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
                    		window.location.href = window.location.href;
                        
                    }, 1500);
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            }
        });
    	layer.close(index);
    });
}
