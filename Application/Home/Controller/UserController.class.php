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
 * 用户管理控制器
 * @author 
 */
class UserController extends BaseController {
    
	public function index() {
		//用户类型
		$cert = I('cert',0); 
		//注册来源
		$real_user = I('real_user',''); 
		if( $real_user ) {
			$where['b.real_user'] = array('eq', $real_user);
		}
		
		//处理状态
		$del_state = I('del_state',''); 
		if($del_state) {
			$where['b.del_state'] = array('eq', $del_state);
		}
		// 账号状态
		$status = I('status',''); 
		if($status) {
			$where['a.status'] = array('eq', $status);
		} 
		// 查询类型
		$info = I('info',''); 
		$keywords = I('keywords',''); // 关键字
		if($info == 1) {
			$where['a.phone'] = array('eq', $keywords);
		}else if($info == 2) {
			$where['a.email'] = array('eq', $keywords);
		}else if($info == 3){
			$where['a.nickname'] = array('eq', $keywords);
		}
		// 时间类型
		$time = I('time',''); 
		$start_time = I('start_time',0); // 开始时间
		$end_time = I('end_time',0);  // 结束时间
		if( $time == 1 ) {
			if($start_time && $end_time) {
				$where['a.reg_time'] = array('between',array(strtotime("$start_time 00:00:00"), strtotime("$end_time 23:59:59")));
			}elseif($start_time) {
				$where['a.reg_time'] = array('egt',strtotime("$start_time 00:00:00"));
			}elseif($end_time){
				$where['a.reg_time'] = array('egt', strtotime("$end_time 23:59:59"));
			}
		}else if($time == 2) {
		    if($start_time && $end_time) {
				$where['b.log_time'] = array('between',array(strtotime("$start_time 00:00:00"), strtotime("$end_time 23:59:59")));
			}elseif($start_time) {
				$where['b.log_time'] = array('egt',strtotime("$start_time 00:00:00"));
			}elseif($end_time){
				$where['b.log_time'] = array('egt', strtotime("$end_time 23:59:59"));
			}
		}
		//留学状态
		$current_status = I('current_status','');
		if($current_status) {
			$where3['b.current_state'] = array('eq',$current_status);
		}
		
		// 留学app的用户 
		$where['a.source'] = array('eq',5);
	
		$memberModel = D('Member');
		$userModel = D('User');
		
		//获取未认证的用户
		$where1['b.cert_state'] = array('eq',1);
		
		//获取认证的用户
		$where3['b.cert_state'] = array('eq',2);
	    if($cert) {
		    $where2 = $where1;	
		    $where4 = array_merge($where,$where3);
		}else{
			$where2 = array_merge($where,$where1);
			$where4 = $where3;
		}
		
		// 分页条数
		$listRow = C('LIST_ROWS') ? C('LIST_ROWS') : 10;
		// 获取未认证用户数据
		$count1 = $memberModel->getCount($where2);
		$parameter['real_user'] = $real_user;
		$parameter['del_state'] = $del_state;
		$parameter['status'] = $status;
		$parameter['info'] = $info;
		$parameter['time'] = $time;
		$parameter['start_time'] = $start_time;
		$parameter['end_time'] = $end_time;
		$parameter['current_status'] = $current_status;
		$parameter['cert'] = '';
		$data = get_page($memberModel,$count1, $listRow, $where2, $parameter, 'p1');
	
		// 获取认证用户数据
		$count2 = $memberModel->getCount($where4);
	    $parameter['cert'] = 1;
	    $data1 = get_page($memberModel,$count2, $listRow, $where4, $parameter, 'p2');
	    
        $this->assign('page1',$data['show']); // 未认证用户信息分页
        $this->assign('page2',$data1['show']); // 未认证用户信息分页
	    $this->assign('res',$data['res']);  // 未认证用户
        $this->assign('res2',$data1['res']); // 认证用户
	    $this->display();
    }
    
    //添加普通用户
    public function add() {
    	
    	if(IS_POST){
    		$memberModel = D('Member'); // 用户中心模型
    		$userModel = D('User'); 
    		$username = I('username',''); // 昵称
    		
    		// 用户邮箱
    		$email =  I('email',''); 
    		if(!empty($email)){
    			$data = $memberModel->getMember(array('email'=>$email));
    		}
    		if(!empty($data['email'])){
    			$this->ajaxReturn(array('status'=> -1,'msg'=>'用户邮箱已存在'));
    		}
    	  
    		//　用户微信号
    		$weixin = I('weixin','');
    		$where = array('weixin'=>$weixin); 
			$data = $userModel->getUser($where);
    		if( !empty( $data['weixin'] ) ) {
    			$this->ajaxReturn(array('status'=> -1,'msg'=>'用户微信号已经存在！'));
    		}
    		     
    		$password = I('password',''); // 初始化密码
    		$salt = randcode(6, 3);
    		$_password = md5(md5($password).$salt);
    		$data = array();
    		$data['nickname'] = $username;
    		$data['email'] = $email;
    		$data['salt'] = $salt;
    		$data['source'] = 5;	//注册来源 1主站 2移动站 3论坛 4网校 5留学app
    		$data['pass'] = $_password;
    		$data['reg_ip'] = get_client_ip();
    		$data['reg_time'] = time();
    		$data['last_ip'] = get_client_ip();
    		$data['last_time'] = time();
    		$data['status'] = 1;
    		$res['weixin'] = $weixin;
    		$res['real_user'] = 2;  // 2:为水军  1:为真实用户
    		if( $uid = $memberModel->addMember($data) ) {
    			$res['uid'] = $uid;
    			if( $userModel->addUser($res) ) {
    				$this->ajaxReturn(array('status'=>1,'msg'=>'添加用户成功','back_url'=>U('User/index')));
    			}
    		}
    		$this->ajaxReturn(array('status'=>1,'msg'=>'添加用户失败！'));
    	}
        
    	$this->display();
    }
    
    // 改变用户的处理状态
    public function change_status() {
    	$uid = I('uid',0); //用户id
    	$cert = I('cert','');
    	$userModel = D('User');
    	$result = $userModel->changeStatus($uid);
    	if($result !== false) {
    		$back_url = U('User/index',array('cert'=>$cert));
    		$this->ajaxReturn(array('status'=> 1,'msg'=> '操作成功！','back_url'=>$back_url));
    	}
    	$this->ajaxReturn(array('status'=> -1,'msg'=>'操作失败！'));
    }
    
    // 个人信息展示
    public function user_list() {
    	$uid = I('uid',0);  // 用户uid
    	//获取用户的个人信息
    	$memberModel = D('Member');
    	$where['a.id'] = $uid;
    	$data = $memberModel->getAllList($where);
    	$this->assign('data',$data[0]);
    	$this->display('list');
    }
    
    // 处理用户登录状态
    public function change_user_status() {
    	$uid = I('uid',0);  // 用户id
    	$status = I('status',''); // 用户状态
    	$cert = I('cert','');
    	$memberModel = D('Member');
    	if($status == 1){
    		$status = -5;  // -5表示留学app用户禁止登录
    	}else{
    		$status = 1;
    	}
    	$result = $memberModel->changeUserStatus($uid,$status);
    	if($result !== false ) {
    		$back_url = U('User/index',array('cert'=>$cert));
    		$this->ajaxReturn(array('status'=> 1,'msg'=> '操作成功！','back_url'=>$back_url));
    	}
    	$this->ajaxReturn(array('status'=> -1,'msg'=> '操作失败！'));
    }
    
    // 批量导出
    public function export_excel() {
    	$uids = I('uids',''); // 用户的uids
    	$cert = I('cert',''); // 认证用户为1
    	$where['uid'] =  array('in', $uids);
    	$memberModel = D('Member');
    	$data = $memberModel->getAllList($where,'',$field);
    	
    	$strTable = '<table width="500" border="1">';
    	$strTable .= '<tr>';
    	$strTable .= '<td style="text-align:center;font-size:12px;width:120px;">用户ID</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="100">昵称</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">手机号</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">邮箱</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">微信号</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">留学状态</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">学位</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">就读院校</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">就读专业</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">所在地</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">注册时间</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">登录时间</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">处理状态</td>';
    	$strTable .= '<td style="text-align:center;font-size:12px;" width="*">用户状态</td>';
    	$strTable .= '</tr>';
    	
    	foreach($data as $k=>$v){
    		$strTable .= '<tr>';
    		$strTable .= '<td style="text-align:center;font-size:12px;">&nbsp;' . $v['uid'] . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['nickname'] . ' </td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['phone'] . ' </td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['email'] . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['weixin'] . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['current_state'] . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['edu'] . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['school_name'] . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['major_cat'].'-'.$v['major_name'] . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . $v['province'].'-'.$v['city'].'-'.$v['area'] . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . date('Y-m-d H:i:s',$v['reg_time']) . '</td>';
    		$strTable .= '<td style="text-align:left;font-size:12px;">' . date('Y-m-d H:i:s',$v['log_time']) . '</td>';
    		if($v['del_state'] ==1){
    			$strTable .= '<td style="text-align:left;font-size:12px;">未处理</td>';
    		}else{
    			$strTable .= '<td style="text-align:left;font-size:12px;">已处理</td>';
    		}
    		if( $v['status']==1 ) {
    			$strTable .= '<td style="text-align:left;font-size:12px;">正常</td>';
    		}else{
    			$strTable .= '<td style="text-align:left;font-size:12px;">已冻结</td>';
    		}
    		
    		$strTable .= '</tr>';
    	}
    	
    	$strTable .='</table>';
    	downloadExcel($strTable, '用户信息表');
    	exit();
    }    
}