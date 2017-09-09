<?php
// +----------------------------------------------------------------------
// | Tiandao [ 北京天道教育集团 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: run.yuan@tiandaoedu.com 
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 咨询控制器
 */
class ConsultController extends BaseController {
    public function index(){
		
		$paging = I('paging',0);
		$list_rows = I('list_rows',C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 20);	
		$sort_field = I('sort_field','');
		$sort_rule = I('sort_rule','');

		$sort = "pub_time desc";
		if ($sort_field) {
		    $sort = $sort_field." ".$sort_rule;
		    
		} 
		
		//筛选国家
		$county_arr = I('county',''); 
	    if(!empty($county_arr) && count($county_arr)!=23) {
			for($i=0;$i<=count($county_arr);$i++) { 
				if(!is_null($county_arr[$i])) {
					$country_id.=$county_arr[$i].",";
				}	
			} 	 
			$country_id=rtrim($country_id, ",");	
			$where['country_id'] = array('in', $country_id);		
		}
		//筛选阶段
		$edu_arr = I('edu',''); 
	    if(!empty($edu_arr) && count($edu_arr)!=7){		
			for($i=0;$i<=count($edu_arr);$i++) { 
				if(!is_null($edu_arr[$i])) {
					$edu_id.=$edu_arr[$i].",";
				} 
			} 
			$edu_id=rtrim($edu_id, ",");
			$where['edu_id'] = array('in', $edu_id);			
        }
		//筛选类目
		$cate_arr = I('cate',''); 
	    if(!empty($cate_arr) && count($cate_arr)!=5){			
			for($i=0;$i<=count($cate_arr);$i++) { 
				if(!is_null($cate_arr[$i])) {
					$cate_id.=$cate_arr[$i].",";
				} 
			} 
			$cate_id=rtrim($cate_id, ",");
			$where['cate_id'] = array('in', $cate_id);			
		}
		//筛选状态
		$status_arr = I('status',''); 
	    if(!empty($status_arr) && count($status_arr)!=3){			
			for($i=0;$i<=count($status_arr);$i++) { 
				if(!is_null($status_arr[$i])) {
					$status_id.=$status_arr[$i].",";
				} 
			} 
			$status_id=rtrim($status_id, ",");
			$where['status'] = array('in', $status_id);			
		}		

		// 时间类型
		$time = I('time',''); 
		$start_time = I('start_time',0); // 开始时间
		$end_time = I('end_time',0);  // 结束时间
		if( $time == 1 ) {
			$where['add_time'] = array('egt', $start_time);
			$where['add_time'] = array('elt', $end_time);
		}else if($time == 2) {
			$where['pub_time'] = array('egt', $start_time);
			$where['pub_time'] = array('elt', $end_time);
		}
		// 问题标题
		$question_title = I('question_title',''); 
		if(!empty($question_title)) {
		    $where['question_title'] = array('like', "%$question_title%");					 
		}		
		
		$consultModel = D('Consult');
		/*获取总条数*/
		$total = $consultModel->get_count($where);

		
 

		// 获取未认证用户的数量
		$page = new \Think\Page($total, $list_rows);
		$page->setConfig('first', '首页'); 
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('last','尾页');
		$_page = $this->bootstrap_page_style($page->show());
		
		//查询列表
		$consult = $consultModel->get_list($where, $page->nowPage, $list_rows, $sort);
		$country = $consultModel->get_country();
		$cate = $consultModel->get_cate();
		$edu = $consultModel->get_edu();	

		$this->assign('_page', $_page);		//底部分页
		$this->assign('_total',$total);		//列表总数量		
		$this->assign('consult_list',$consult); 
		$this->assign('country_list',$country);
		$this->assign('cate_list',$cate);
		$this->assign('edu_list',$edu);		
		$this->display();
         
    }

    /**
     * Thinkphp默认分页样式转Bootstrap分页样式
     * @param string $page_html tp默认输出的分页html代码
     * @return string 新的分页html代码
     */
    function bootstrap_page_style($page_html){
    	if ($page_html) {
    		$page_show = str_replace('<div>','<nav><ul class="pagination" >',$page_html);
    		$page_show = str_replace('</div>','</ul></nav>',$page_show);
    		$page_show = str_replace('<span class="current">','<li class="active"><a>',$page_show);
    		$page_show = str_replace('</span>','</a></li>',$page_show);
    		$page_show = str_replace(array('<a class="num"','<a class="prev"','<a class="next"','<a class="end"','<a class="first"'),'<li><a',$page_show);
    		$page_show = str_replace('</a>','</a></li>',$page_show);
    	}
    	return $page_show;
    }
	
    public function add(){
		$consultModel = D('Consult');
		$country = $consultModel->get_country();
		$cate = $consultModel->get_cate();
		$edu = $consultModel->get_edu();	
		$this->assign('username', session('user_name'));
		$this->assign('country_list',$country);
		$this->assign('cate_list',$cate);
		$this->assign('edu_list',$edu);		
		$this->display();
         
    }
    public function save(){
 
	
		$question_title = I('post.question_title',''); //问题标题  
		$question = I('post.question',''); //咨询问题 
		$question_answer = I('post.question_answer',''); // 问题答案		
		$country_id = I('post.country_id',''); // 国家id
		$edu_id = I('post.edu_id',''); // 阶段id
		$cate_id = I('post.cate_id',''); // 类目id
		$user_name = I('post.user_name',''); // 用户名称	
		$user_id = I('post.user_id',''); // 用户名称			
		$author = I('post.author',''); //创建者 
		$status = I('post.status',''); //状态
		
		//$file = I('post.file',''); // 
		$data['add_time'] = time();
		if($status==1){
		$data['pub_time'] = time();				
		}
	
		$data['status'] = $status;	
		$data['uid'] = $user_id;			
		$data['question_title'] = $question_title;
		$data['question'] = $question;   
		$data['question_answer'] = $question_answer;   
		$data['country_id'] = $country_id;   
		$data['edu_id'] = $edu_id;   
		$data['cate_id'] = $cate_id;   
		$data['user_name'] = $user_name;   	
		$data['author'] = $author;  

		$consultModel = D('Consult');		
		if( $consultid = $consultModel->add_consult($data) ) {
			$res['consultid'] = $consultid;					
			$this->ajaxReturn(array('status'=>1,'msg'=>'问答数据添加成功！','back_url'=>U('Consult/index')));
		}
		$this->ajaxReturn(array('status'=>0,'msg'=>'问答数据添加失败！'));		

    }

    public function edit(){
		$id = I('id',''); //问题id
		
		$consultModel = D('Consult');
		$consult = $consultModel->get_infoById($id);

		$country = $consultModel->get_country();
		$cate = $consultModel->get_cate();
		$edu = $consultModel->get_edu();	
		
		$this->assign('consult',$consult);
		$this->assign('country_list',$country);
		$this->assign('cate_list',$cate);
		$this->assign('edu_list',$edu);		
		$this->display();
         
    }	

    public function edit_save(){
 
		$question_id = I('post.question_id',''); //问题标题  	
		$question_title = I('post.question_title',''); //问题标题  
		$question = I('post.question',''); //咨询问题 
		$question_answer = I('post.question_answer',''); // 问题答案		
		$country_id = I('post.country_id',''); // 国家id
		$edu_id = I('post.edu_id',''); // 阶段id
		$cate_id = I('post.cate_id',''); // 类目id
		$user_name = I('post.user_name',''); // 用户名称
		$user_id = I('post.user_id',''); // 用户名称		
		//$file = I('post.file',''); // 
		
		$data['question_title'] = $question_title;
		$data['question'] = $question;   
		$data['question_answer'] = $question_answer;   
		$data['country_id'] = $country_id;   
		$data['edu_id'] = $edu_id;   
		$data['cate_id'] = $cate_id;   
		$data['user_name'] = $user_name;   	
		$data['uid'] = $user_id;   	  

		$consultModel = D('Consult');		
		if( $res = $consultModel->edit_consult($data, $question_id) ) {
			 				
			$this->ajaxReturn(array('status'=>1,'msg'=>'问答数据修改成功！','back_url'=>U('Consult/index')));
		}
		$this->ajaxReturn(array('status'=>0,'msg'=>'问答数据修改失败！'));		

    }

    public function get_user(){
		
		$nickname = I('user_name',''); //关键词
		$memberModel = D('Member');	

		$where['a.source'] = array('eq', '5');
		$where['a.nickname'] = array('like', "%$nickname%");	
		$res=$memberModel->getKeyMember($where);
		foreach($res as $key=>$val){
			$res[$key]['label']=$res[$key]['nickname'];
		}
 
        echo json_encode($res);		
	}	
	
    public function status_change(){
    	$id = I('id',0); //问答id
    	$status = I('status',0); //要修改的状态		
		$data['status'] = $status;
		$consultModel = D('Consult');	
		
		if( $consultModel->where(array('id'=>$id))->save($data) ) {
			 				
			$this->ajaxReturn(array('status'=>1,'msg'=>'操作成功！'));
		}
		$this->ajaxReturn(array('status'=>0,'msg'=>'操作失败！'));			
	}	
}