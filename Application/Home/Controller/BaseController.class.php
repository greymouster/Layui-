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
 * 基础控制器
 */
class BaseController extends Controller {
	
	/*
	 * 初始化操作
	*/
	public function _initialize() {
		
		$user = get_user_info(session('user_name'));
		if(session('user_id') > 0 && session('user_id') == $user['data']['id'] ){
			session('real_name',$user['data']['realname']);
			return;
		}else{
			$this->redirect('Admin/login');
		}
	}
}