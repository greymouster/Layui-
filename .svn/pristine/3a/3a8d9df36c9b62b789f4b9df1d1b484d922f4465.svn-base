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
 * 录取榜
 */
class OfferModel{
    
    /**
     * 添加录取榜
     * @param unknown $data
     * @return boolean|Ambigous <\Think\mixed, boolean, string, unknown>
     */
    public function add($data) {
        if (empty($data)){
            return false;
        }
         
        $Offer = M('Offer');
        $result = $Offer->data($data)->add();
        return $result;
    }
    
    /**
     * 自定义条件获取信息
     * @param   $where      Array|String   自定义条件
     */
    public function getInfo($where) {
    	
        if (empty($where)){
        	return false;
        }
        
        $Offer = M('Offer');
        $result = $Offer->where($where)->select();
        
        return $result;
    }
    
    /**
     * 根据文章id获取信息
     * @param   $article_id     int     文章id
     */
    public function getInfoByArticleId($article_id) {
    	
        if (empty($article_id)){
        	return false;
        }
        
        $Offer = M('Offer');
        $where['article_id'] = $article_id;
        $result = $Offer->where($where)->find();
        return $result;
    }
    
    /**
     * 根据id获取
     * @param unknown $id
     */
    public function getInfoById($id) {
    	
        if (empty($id)){
        	return false;
        }
        
        $Offer = M('Offer');
        $where['id'] = $id;
        $result = $Offer->where($where)->find();
        return $result;
    }
    
    /**
     * 获取列表
     * @param unknown $where
     * @return Ambigous <\Think\mixed, string, boolean, NULL, unknown, mixed, object>
     */
	public function getList($where,$page = 1,$listRows=20,$sort="sort asc") {
	    
	    if (empty($where)){
	        return false;
	    }
	    
	    if ($page >= 1) $page = $page-1;
	    
		$Offer = M('Offer');
		$result = $Offer->where($where)->limit($page*$listRows,$listRows)->order($sort)->select();
		
		return $result;
	}
	
	/**
	 * 获取数量
	 * @param $where
	 */
	public function getCount($where) {
		
	    if (empty($where)){
	    	return false;
	    }
	    
	    $Offer = M('Offer');
	    $count = $Offer->where($where)->count();
	    return $count;
	}
	
	/**
	 * 修改录取榜 
	 * @param unknown $where
	 * @param unknown $data
	 * @return boolean|Ambigous <boolean, unknown>
	 */
	public function edit ($where,$data){
	    if(empty($where)||empty($data)){
	        return false;
	    }
	    
	    $Offer = M('Offer');
	    $result = $Offer->where($where)->save($data);
	    return $result;
	}
	
	/**
	 * 删除录取榜
	 *
	 */
	public function del($where){
		$Offer = M('Offer');
		$data['is_delete']=1;
		$result= $Offer->where($where)->save($data);
		return $result;
	}
	
}