<?php
// +----------------------------------------------------------------------
// | pass.tdedu.org
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: wy<ruoyu.wang@tiandaoedu.com>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;
use Think\Log;


/**
 * 文章属性分类属性分类管理
 */
class ArticlePropertyMappingModel{

	/**
	 * 根据id获取文章属性分类属性分类信息
	 * @param	id    文章属性分类唯一标识
	 * ----------遗弃-----------
	 */
	public function getInfoByArticleId($article_id){
		if (empty($article_id)){
			return false;
		}
	
		$ArticlePropertyMapping = M('ArticlePropertyMapping');
		$map['article_id'] = $article_id;
		$data = $ArticlePropertyMapping->where($map)->field('property_id')->select();
		return $data;
	}
	
	/**
	 * 获取文章属相分类属性分类信息
	 */
	public function getList($where) {
		if (empty($where)){
			return false;
		}
		
		$ArticlePropertyMapping = M('ArticlePropertyMapping');
		$data = $ArticlePropertyMapping->where($where)->select();
		
		return $data;
	}
	
	/**
	 * 获取文章属相分类属性分类id
	 */
	public function getPropertyId($where) {
	    $ArticlePropertyMapping = M('ArticlePropertyMapping');
	    $data = $ArticlePropertyMapping->where($where)->field('property_id')->select();
	    
	    return $data;
	}

	/**
	 * 添加文章属性分类
	 * @param unknown $ArticlePropertyMappingAuthorname
	 * @return boolean|unknown
	 */
	public function add($data){
		if(empty($data)){
			return false;
		}
		$ArticlePropertyMapping = M('ArticlePropertyMapping');
		$result = $ArticlePropertyMapping->data($data)->add();
		return $result;
	}
	
	/**
	 * 修改属性信息
	 */
	public function edit($where, $data){
		if(empty($where)||empty($data)){
			return false;
		}
	
		$ArticlePropertyMapping = M('ArticlePropertyMapping');
		$result = $ArticlePropertyMapping->where($where)->save($data);
		return $result;
	}
	
	
	/**
	 * 删除文章属性分类
	 */
	public function del($where) {
		if(empty($where)){
			return false;
		}
		
		$ArticlePropertyMapping = M('ArticlePropertyMapping');
		$result = $ArticlePropertyMapping->where($where)->delete();
		return $result;
	}
}