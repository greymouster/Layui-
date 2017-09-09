<?php
// +----------------------------------------------------------------------
// | pass.tdedu.org
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: liukw<kaiwei.liu@tiandaoedu.com>
// +----------------------------------------------------------------------

namespace Home\Model;

/**
 * 作者管理
 */
class ArticleAuthorModel{

	/**
	 * 根据id获取用户信息
	 */
	public function getInfoById($id){
		if (empty($id)){
			return false;
		}
	
		$ArticleAuthor = M('ArticleAuthor');
		$map['id'] = $id;
		$data = $ArticleAuthor->where($map)->find();
		return $data;
	}
	
	
	/**
	 * 添加用户
	 * @param unknown $ArticleAuthorname
	 * @param unknown $age
	 * @param unknown $sex
	 * @param unknown $email
	 * @return boolean|unknown
	 */
	public function add($data){
		if(empty($data)){
			return false;
		}

		$ArticleAuthor = M('ArticleAuthor');
		$result = $ArticleAuthor->data($data)->add();
		return $result;
	}
	
	/**
	 * 修改用户信息
	 */
	public function edit($where, $data){
		if(empty($where)||empty($data)){
			return false;
		}
	
		$ArticleAuthor = M('ArticleAuthor');
		$result = $ArticleAuthor->where($where)->save($data);
		return $result;
	}
	
	/**
	 * 删除用户
	 */
	public function del($map) {
		$ArticleAuthor = M('ArticleAuthor');
		$result = $ArticleAuthor->where($map)->delete();
		return $result;
	}
	
	/**
	 * 获取作者 列表
	 * @param string $where
	 * @return array
	 */
	public function getList($where = ' 1 ') {
		$ArticleAuthor = M('ArticleAuthor');
		$data = $ArticleAuthor->where($where)->select();
		
		return $data;
	}
	
}