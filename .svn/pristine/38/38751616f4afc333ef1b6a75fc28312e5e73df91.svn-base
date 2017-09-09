<?php
// +----------------------------------------------------------------------
// | Tiandao [ 北京天道教育集团 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: leedxing
// +----------------------------------------------------------------------
namespace Home\Model;

use Think\Model;

class AddressModel extends Model {
	
	/**
	 * 获取公司地址数据
	 * @return array
	 */
	public function get_list($where, $page = 1, $listRows=20, $sort="add_time desc") {
		if ($page >= 1){
			$page = $page-1;
		}				 
       return  $this->where($where)->limit($page*$listRows,$listRows)->order($sort)->select();
 
	}
	/**
	 * 获取公司地址记录数
	 * @return array
	 */
	public function get_count($where) {
				 
         return $this->where($where)->count();
 
	}	
	/**
	 * 通过id获取分公司地址数据
	 * @return array
	 */
	public function get_infoById($id) {
				 
        return $this->where(array('id'=>$id))->find();
		 
	}	
	/**
	 * 添加分公司地址数据
	 * @param  array $data 地址信息
	 * @return int 分公司id
	 */
	public function add_address($data) {
		
		return $this->add($data);
		 
	}
	/**
	 * 修改分公司地址数据
	 * @param  array $data 地址信息
	 * @param  int $id 分公司id
	 * @return boolean
	 */
	public function edit_address($data,$id) {
		
		return $this->where(array('id'=>$id))->save($data);
		 
		 
	}	

}	