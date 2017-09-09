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

class ConsultModel extends Model {
	
	/**
	 * 获取问答数据
	 * @return array
	 */
	public function get_list($where, $page = 1, $listRows=20, $sort="pub_time desc") {
		if ($page >= 1){
			$page = $page-1;
		}				 
       return  $this->where($where)->limit($page*$listRows,$listRows)->order($sort)->select();
 
	}
	/**
	 * 获取问答数据记录数
	 * @return array
	 */
	public function get_count($where) {
				 
         return $this->where($where)->count();
 
	}	
	/**
	 * 通过获取问答数据
	 * @return array
	 */
	public function get_infoById($id) {
				 
        return $this->where(array('id'=>$id))->find();
		 
	}	
	/**
	 * 添加经典问答
	 * @param  array $data 问答信息
	 * @return int 问答id
	 */
	public function add_consult($data) {
		
		return $this->add($data);
		 
	}
	/**
	 * 修改经典问答
	 * @param  array $data 问答信息
	 * @param  int $id 问答id
	 * @return boolean
	 */
	public function edit_consult($data,$id) {
		
		return $this->where(array('id'=>$id))->save($data);
		 
		 
	}	
	/**
	 * 获取国家列表
	 * @return array
	 */
	public function get_country() {
		
		$Country = M('Country');
        return $Country->select();
	}
	/**
	 * 获取咨询类目
	 * @return array
	 */
	public function get_cate($data) {
		
		$Cate = M('Cate');
        return $Cate->select();
		 
	}
	/**
	 * 获取留学阶段
	 * @return array
	 */
	public function get_edu($data) {
		
		$Edu = M('Edu');
        return $Edu->select();
		 
	}	
}	