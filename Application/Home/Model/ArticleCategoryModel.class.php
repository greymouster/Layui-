<?php
// +----------------------------------------------------------------------
// | pass.tdedu.org
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: wy<ruoyu.wang@tiandaoedu.com>
// +----------------------------------------------------------------------

namespace Home\Model;

/**
 * 分类管理
 */
class ArticleCategoryModel{
	
	/**
	 * 获取信息
	 */
	public function getInfoByCategoryId($category_id,$system_id) {
		if (empty($category_id)){
			return false;
		}
		$Category = M("ArticleCategory");
		$where = " category_id = {$category_id} and system_id = {$system_id}";
		$result = $Category->where($where)->find();
		return $result;
	}
	
	/**
	 * 获取子分类
	 * @param unknown $pid
	 * @return array
	 */
	public function getChilds($pid,$system_id) {
		$Category = M("ArticleCategory");
		$where = " parent_id = {$pid} and is_delete = 0 "   ;
		
		if ($system_id){
			$where .= " and system_id = {$system_id} ";
		}
		
		$result = $Category->where($where)->select();
		
		if (empty($result)){
			return false;
		}
		
		foreach ($result as $k => $v){
			$result[$k]['parent_id'] = $pid;
		}
		
		return $result;
	}
}