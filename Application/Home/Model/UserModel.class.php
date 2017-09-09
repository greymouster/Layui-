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

class UserModel extends Model {

	/**
	 * 获取用户
	 * @param  $where 查询条件
	 */
	public function getUser($where) {
		return $this->where($where)->find();
	}
	
	/**
	 * 添加用户信息
	 * @param  $data 添加的数据
	 * @return id
	 */
	public function addUser($data) {
		return $this->add($data);
	}
	
	public function changeStatus($uid){
		return $this-> where("uid = $uid")->setField(array('del_state'=>2));
	}
	
	/**
	 * 添加图片
	 * @param  $option
	 */
	public function _after_insert($data,$option) {
		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
			//图片相关的配置
			$qn_info =  array(
					'maxSize'    =>   2*1024*1024,//文件大小
					'rootPath'   =>    './', //保存的根路径
					'savePath'   =>    '',  //保存路径
					'saveName'   =>    "{$data['uid']}",
					'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  // 允许上传的后缀
					'autoSub'    =>    true,
					'replace'    =>    true, //存在同名是否覆盖
					'subName'    =>    C("AVATAR_PREFIX"),
					'saveExt'    =>    'jpg',
					'driver' => 'Qiniu',
					'driverConfig' => C('QN_DRIVER_CONFIG'),
			);
			$upload = new \Think\Upload($qn_info);
			$info = $upload->upload();
		}
	}
}	