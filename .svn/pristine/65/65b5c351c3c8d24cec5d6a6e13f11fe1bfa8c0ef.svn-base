<?php 
// +----------------------------------------------------------------------
// | Tiandao [ 北京天道教育集团 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: run.yuan@tiandaoedu.com
// +----------------------------------------------------------------------
namespace Home\Model;

use Think\Model;

class MemberModel extends Model{
	
	//调用配置文件中的数据库配置1
	 protected $connection = 'DB_CONFIG1';
	 
	 /**
	  * 获取用户信息
	  * @param $where 查询条件
	  * @return array
	  */
	 public function getMember($where){
	 	
	 	return $this->where($where)->find();
	 }
	 
	 /**
	  * 添加用户信息
	  * @param  $data 添加的数据
	  * @return id 
	  */
	 public function addMember($data) {
	 	return $this->add($data);
	 }
	 
	 /**
	  * 获取全部的会员信息
	  */
	 public function getAllList($where,$limit,$field) {
	 	$data = $this->alias('a')
	 	             ->where($where)
	 	             ->join("RIGHT JOIN onion.td_user b ON a.id = b.uid ")
	 	             ->limit($limit)
	 	             ->field($field)
	 	             ->order('uid DESC')
	 	             ->select();
	 	
	 	return $data;

	 }

	 /**
	  * 获取全部的会员信息
	  */
	 public function getKeyMember($where){
	 
	 	$data = $this->alias('a')
	 	             ->where($where)
					 ->field('b.uid,nickname')
	 	             ->join("RIGHT JOIN onion.td_user b ON a.id = b.uid ")
	 	             ->select();
	 	return $data;

	 }
	 
	 /**
	  * 改变用户的登录状态
	  * @param  $uid  用户id 
	  * @param  $status  用户登录状态  -5 表示留学app禁止登录
	  */
	 public function changeUserStatus($uid,$status){
	 	return $this-> where("id = $uid ")->setField(array('status'=> $status ));
	 }
	 
	 
	 public function getCount($where){
	 	return $this->alias('a')->where($where)->join("RIGHT JOIN onion.td_user b ON a.id = b.uid ")->count();
	 }
	
}
