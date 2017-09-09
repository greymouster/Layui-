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
 * 专题营销控制器
 * @author   
 */
class SpecialController extends BaseController {
	
	public function index() {
		//查询条件
		$where = array();
		// 标记
		$flag = I('flag','');
		// 所属国家
		$countryNames = I('country_name','');
		if($countryNames){
			if( !is_array($countryNames) ) {
			     $countryNames = explode(',' , $countryNames);	
			}
				
			foreach($countryNames as $k=>$v){
				$where['_string']  .= "FIND_IN_SET('$v', country_name) OR " ;
			}
		}
		if($where['_string']) {
			$where['_string'] = substr($where['_string'], 0, -3);
		}
		
		// 所属阶段
		$current_state = I('current_state','');
		if($current_state) {
			$where['current_state'] = array('like', "%$current_state%");
		}
		
		// 时间类型 1为 添加时间 2为更新时间
		$time = I('time',0);
		$start_time = I('start_time',0); // 开始时间
		$end_time = I('end_time',0);  // 结束时间
	    if( $time == 1 ) {
			if($start_time && $end_time) {
				$where['add_time'] = array('between',array(strtotime("$start_time 00:00:00"), strtotime("$end_time 23:59:59")));
			}elseif($start_time) {
				$where['add_time'] = array('egt',strtotime("$start_time 00:00:00"));
			}elseif($end_time){
				$where['add_time'] = array('egt', strtotime("$end_time 23:59:59"));
			}
		}else if($time == 2) {
		    if($start_time && $end_time) {
				$where['update_time'] = array('between',array(strtotime("$start_time 00:00:00"), strtotime("$end_time 23:59:59")));
			}elseif($start_time) {
				$where['update_time'] = array('egt',strtotime("$start_time 00:00:00"));
			}elseif($end_time){
				$where['update_time'] = array('egt', strtotime("$end_time 23:59:59"));
			}
		}else if($time==3) {
			if($start_time && $end_time) {
				$where['del_time'] = array('between',array(strtotime("$start_time 00:00:00"), strtotime("$end_time 23:59:59")));
			}elseif($start_time) {
				$where['del_time'] = array('egt',strtotime("$start_time 00:00:00"));
			}elseif($end_time){
				$where['del_time'] = array('egt', strtotime("$end_time 23:59:59"));
			}
		}
		
		// 专题标题
		$title = I('title','');
		if($title) {
			$where['title'] = array('eq',$title);
		}
		
		// 获取在线专题信息
		$specialModel = D('Special');
		$where1['status'] = array('eq',1);
		// 获取回收站专题信息
		$where3['status'] = array('eq','-1');
		if($flag){
			$where2 = $where1;
			$where4 = array_merge($where,$where3);
		}else{
			$where2 = array_merge($where1,$where);
			$where4 = $where3;
		}
		
		//页面显示的条数
		$listRow = C('LIST_ROWS') ? C('LIST_ROWS') : 10;

		$count1 = $specialModel->getCount($where2);
		$country_name = implode(',',$countryNames);// 按国家查询
		$parameter['country_name']= $country_name;
		$parameter['flag'] = '';  // 专题列表
		$parameter['time'] = $time;
		$parameter['start_time'] = $start_time;
		$parameter['end_time'] = $end_time;
		$parameter['current_state'] = $current_state;
		$parameter['title'] = $title;
		$data = get_page($specialModel,$count1, $listRow, $where2, $parameter, 'p1');	
		$count2 = $specialModel->getCount($where4);
		$parameter['flag'] = 1; // 专题回收站
		$data1 = get_page($specialModel, $count2, $listRow, $where4, $parameter, 'p2');
	   
		// 获取全部国家
		$country = M('country')->select();
		$this->assign('data',$data['res']);
		$this->assign('page',$data['show']);
		$this->assign('data1',$data1['res']);
		$this->assign('page1',$data1['show']);
		$this->assign('country',$country);
		$this->assign('country_name',$country_name);
		$this->display();
	}
	
	// 添加专题
	public function add() {
		if(IS_POST) {
			$data['title'] = I('title','');   // 标题
			$countryNames = I('country_name',''); //所属国家
			$data['country_name'] = implode(',',$countryNames);
			$current_state = I('current_state',''); // 阶段
			$data['current_state'] = implode(',',$current_state);
			$data['author'] = I('author',''); // 作者
			$data['content'] = I('content',''); // 文本内容
			$data['add_time'] = time();
			$data['update_time'] = time();
			$specialModel = D('Special');
			$result = $specialModel->addSpecial($data);
			if($result) {
				$this->ajaxReturn(array('status'=>1,'msg'=>'操作成功！','back_url'=>U('Special/index')));
			}
			$this->ajaxReturn(array('status'=>-1,'msg'=>'操作失败！'));
		}
	    
		// 获取全部国家
		$country = M('country')->select();
		$this->assign('username',session('user_name'));
		$this->assign('country',$country);
		$this->display();
	}
	
	// 修改专题
	public function edit() {
		if(IS_POST) {
			$where['id'] = I('id',0);
			$data['title'] = I('title','');   // 标题
			$countryNames = I('country_name',''); //所属国家
			$data['country_name'] = implode(',',$countryNames);
			$current_state = I('current_state',''); // 阶段
			$data['current_state'] = implode(',',$current_state);
			$data['author'] = session('user_name'); // 作者
			$data['content'] = I('content',''); // 文本内容
			$data['update_time'] = time();
			$specialModel = D('Special');
			$result = $specialModel->editSpecial($where,$data);
			if($result) {
				$this->ajaxReturn(array('status'=>1,'msg'=>'操作成功！','back_url'=>U('Special/index')));
			}
			$this->ajaxReturn(array('status'=>-1,'msg'=>'操作失败！'));
			
		}
		// 获取专题信息
		$id = I('get.id',0);
		$specialModel = D('Special');
		$where['id'] = array('eq',$id);
		$list = $specialModel->getOneList($where);
		//获取全部国家
		$country = M('country')->select();
		
		$this->assign('list',$list);
		$this->assign('country',$country);
		$this->display();
	}
	
	//改变专题状态
	public function change_state() {
		$id = I('id',0); //专题id
		$status = I('status',0); // 专题状态
		$is_del = I('is_del',0); // 是否下线
		if( is_array($id) ) {
			$ids = implode(',',$id);
			$where['id'] = array('in',$ids);
		}else {
			$where['id'] = array('eq',$id);
		}
		$data['del_time'] = $is_del ? time() : 0; 
		$data['status'] = $status; // -1为下线  1为上线
		$specialModel = D('Special');
		$result =  $specialModel->changeStatus($where,$data);
		if($result) {
			$this->ajaxReturn(array('status'=>1,'msg'=>'操作成功！'));
		}
		$this->ajaxReturn(array('status'=>-1,'msg'=>'操作失败！'));
	}
	
	
	//　上传专题图片
	public function upload() {
		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
			//图片相关的配置
			$qn_info =  array(
					'maxSize'    =>   5*1024*1024,//文件大小
					'rootPath'   =>    './', //保存的根路径
					'savePath'   =>    '',  //保存路径
					'saveName'   =>    array('uniqid',''),
					'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  // 允许上传的后缀
					'autoSub'    =>    true,
					'subName'    =>    C("SPECIAL_AVATAR_PREFIX"),
					'driver' => 'Qiniu',
					'driverConfig' => C('QN_DRIVER_CONFIG'),
			);
			$upload = new \Think\Upload($qn_info);
			$info = $upload->upload();
			if( $info ){
				$url = C('QN_CDN_URL$info').str_replace('/','_',$info['savePath']);
				$result = array(
					'code' => '0',
					'msg'  => '',
				    'data' => array(
				    	'src' => $info['file']['url'],
				    	'title' => '',	
				    ),
				);
				$this->ajaxReturn($result);
			}
		}
	}
	
	
	// 清空回收站
	public function delAllSpecial() {
		$id = I('id',0);
		$ids = implode(',',$id);
		$where['id'] = array('in',$ids);
		$specialModel = D('Special');
		$result = $specialModel->delData($where);
		if($result !== false) {
			$this->ajaxReturn(array('status'=>1, 'msg'=>'操作成功'));
		}
		$this->ajaxReturn(array('status'=>-1, 'msg'=>'操作失败'));
	}
	
	
	 
}