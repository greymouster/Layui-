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
 * 后台首页控制器
 */
class IndexController extends BaseController {

	public function index() {
		$realname = session('real_name');
		$username = session('user_name');
		$this->assign('realname',$realname);
		$this->assign('username',$username);
        $this->display();
    }
    
    // 主体内容
    public function main() {
        
    	$memberModel = D('Member');
    	// 获取用户量
    	$where['a.source'] = array('eq',5); // 留学app注册
    	$userCount = $memberModel->getCount($where);
    	// 获取今日注册量 
    	$date = strtotime(date("Y-m-d"),time());
    	$where['a.reg_time'] = array('egt',$date);
    	$registerCount = $memberModel->getCount($where);
    	//获取案例库文章总数
    	$articleCount = D('Article')->getCount();
    	// 获取专题文章总数
    	$specialCount = D('Special')->getCount();
    	$this->assign('userCount',$userCount);
    	$this->assign('registerCount',$registerCount);
    	$this->assign('articleCount',$articleCount);
    	$this->assign('specialCount',$specialCount);
    	$this->display();
    }
}