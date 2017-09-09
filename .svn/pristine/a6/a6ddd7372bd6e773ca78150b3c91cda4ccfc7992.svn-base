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

class SpecialModel extends Model  {
	
	/**
	 * 获取专题文章
	 * @param  $where 查询条件
	 */
	public function getAllList($where,$limit) {
		return $this->alias('a')->limit($limit)->where($where)->order('id DESC')->select();
	}
	/**
	  * 根据关键字获取专题
	*/
    public function getKeySpecial($where) {
	 	return $this->where($where)->field('id,title')->select();
	 }	
	/**
	 * 添加专题
	 * @param  $data 添加数据
	 * @return id
	 */
	public function addSpecial($data) {
		return $this->add($data);
	}
	
	/**
	 * 根据条件获取单条专题信息
	 * @param  $where 查询条件
	 */
	public function getOneList($where) {
		return $this->where($where)->find();
	}
	/**
	 * 修改专题
	 * @param  $where  查询条件
	 * @param  $data   修改的数据
	 */
	public function editSpecial($where,$data) {
		return $this->where($where)->save($data);
	}
	
	/**
	 * 下线
	 * @param  $where  查询条件
	 * @param  $data   更改的字段
	 */
	public function changeStatus($where,$data) {
		return $this->where($where)->setField($data);
	}
	
	/**
	 * 获取总数
	 * @param  $where  查询条件
	 */
	public function getCount($where) {
	     return $this->where($where)->count();
	}
	
	/**
	 * 删除数据库数据
	 * @param  $where 查询条件
	 */
	public function delData($where) {
		return $this->where($where)->delete();
	}
}