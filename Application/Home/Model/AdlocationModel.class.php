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

class AdlocationModel extends Model {
	
	/**
	 * 获取广告内容数据
	 * @return array
	 */
	public function get_advertlist($where) {
	    $ad_mapping = M('Ad_mapping');
	 	$data = $ad_mapping->alias('a')
	 	             ->where($where)
	 	             ->join("RIGHT JOIN td_advert b ON a.advertid = b.id ")
	 	             ->field("a.start_time,end_time,click_num,status,sort,special,specialid,advertid,b.advert_title,advert_img,advert_url")
	 	             ->order('sort DESC')
	 	             ->select();
		return $data;			 
 
	}

	
	/**
	 * 添加广告关联表数据
	 * @return array
	 */
	public function add_ad_mapping($data) {
	    $ad_mapping = M('Ad_mapping');
	 	$ad_mappingid = $ad_mapping->add($data);
		return $ad_mappingid;			 
 
	}

	/**
	 * 通过id获取广告内容
	 * @return array
	 */
	public function getInfoById($id) {
		
	    $ad_mapping = M('Ad_mapping');
	 	$data = $ad_mapping->alias('a')
	 	             ->where(array('a.advertid'=>$id,'a.status'=>1))
	 	             ->join("RIGHT JOIN td_advert b ON a.advertid = b.id ")
	 	             ->field("a.start_time,a.end_time,a.click_num,a.status,a.sort,a.special,a.specialid,a.offer,a.offerid,a.url_type,a.advertid,b.advert_title,advert_img,advert_url")
	 	             ->order('sort DESC')
	 	             ->find();
		return $data;			 
	}

	
	/**
	 * 修改广告关联表数据
	 * @param  array $data 广告内容
	 * @param  int $id 关联表id
	 * @return boolean
	 */
	public function edit_ad_mapping($data,$id) {
	    $ad_mapping = M('Ad_mapping');
	 	return $ad_mapping->where(array('advertid'=>$id))->save($data);		 
	}		
	/**
	 * 获取问答数据记录数
	 * @return array
	 */
	public function get_count($where) {
				 
         return $this->where($where)->count();
 
	}	
	
	/**
	 * 添加广告位
	 * @param  $data 添加的数据
	 */
 	public function add_adlocation($data) {
 		return $this->add($data);
 	}
 	
 	/**
 	 * 修改广告位
 	 * @param  $where 条件
 	 * @param  $data  广告位内容
 	 */
 	public function edit_adlocation($where,$data) {
 		return $this->where($where)->save($data);
 	}
 	
 	/**
 	 * 更改数据库字段
 	 */
 	public function save_field($where,$data){
 		return $this->where($where)->setField($data);
 	} 
 	
 	/**
 	 * 获取广告位全部数据
 	 * @param unknown $where
 	 */
 	public function getAllList($where,$limit){
 		return $this->where($where)->order('id desc')->limit($limit)->select();
 	}
 	
 	
}	