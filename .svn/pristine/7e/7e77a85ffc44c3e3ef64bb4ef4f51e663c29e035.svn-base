<?php
// +----------------------------------------------------------------------
// | Tiandao [ 北京天道教育集团 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: run.yuan@tiandaoedu.com 
// +----------------------------------------------------------------------

namespace Home\Controller;

use Think\Controller;
/**
 * 管理员控制器
 */
class AdminController extends Controller {
	
	// 登录
	public function login() {
		if(IS_POST) {
			$username = I('username','');  // 用户名
			$password = I('password','');  // 密码
			$data = array(
					'username' => $username, //用户名
					'password' => authcode($password, 'ENCODE', C('AUTH_KEY'), 0), //密码
					'ip' => get_client_ip($type = 0), //IP
					'APPID' => C('APPID'), //接口校验
					'APPSECRET' => C('APPSECRET'),
					'AUTH_KEY' => C('AUTH_KEY'), //密钥
			);
			//请求RTX接口
			$url = C('RTX_URL') . 'login';
			$obj = http_curl($url, $data);
			$result = json_decode($obj,true);
			if ( $result['code'] === 0 ) {
				session('user_id', $result['data']['id']);
				session('user_name', $result['data']['username']);
					
				$this->ajaxReturn(array('status' => 1, 'msg' => '登录成功','back_url'=>'/'));
			}
			$this->ajaxReturn(array('status' => -1, 'msg' => $result['data']['msg']));
		}
		
		$this->display();
	}
	
	
	// 修改密码
	public function changepwd(){
		
		if(IS_POST){
			$username = session('user_name'); //用户名
			$oldpassword = I('oldpassword',''); // 密码
			$newpassword = I('newpassword',''); // 新密码
			$repassword = I('repassword',''); // 确认密码
			$data = array(
				'username' => $username, //用户名
				'password' => authcode($oldpassword, 'ENCODE', C('AUTH_KEY'), 0),
				'npassword' => authcode($newpassword, 'ENCODE', C('AUTH_KEY'), 0),
				'rnpassword' => authcode($repassword, 'ENCODE', C('AUTH_KEY'), 0),
				'APPID' => C('APPID'), //接口校验
				'APPSECRET' => C('APPSECRET'),
				'AUTH_KEY' => C('AUTH_KEY'), //密钥
			);
			$url = C('RTX_URL') . 'edit_pass';
			$obj = http_curl($url, $data);
			$result = json_decode($obj,true);
			if($result['code'] === 0 ) {
				$this->ajaxReturn(array('status'=> 1,'msg'=> '修改密码成功！','back_url'=> U('Admin/loginOut')));
			}
			$this->ajaxReturn(array('status'=>-1,'msg'=>$result['data']['msg']));
		}
		$username = session('user_name');
		$this->assign('username',$username);
		$this->display();
	}
	
	//退出登录
	public function loginOut() {
		session('user_id',null);
		session('user_name',null);
		session('real_name',null);
		session_unset();
		session_destroy();
		$this->redirect('Admin/login');
	}
}