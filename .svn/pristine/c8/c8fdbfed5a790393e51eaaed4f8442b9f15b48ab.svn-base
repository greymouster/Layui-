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

class AdvertModel extends Model {

	
	/**
	 * 添加广告内容数据
	 * @return int id
	 */
	public function add_advert($data) {
		
		 return $this->add($data);
	}
	
	/**
	 * 修改广告内容
	 * @param  array $data 广告内容
	 * @param  int $id 广告id
	 * @return boolean
	 */
	public function edit_advert($data,$id) {
		return $this->where(array('id'=>$id))->save($data);
	}
	
	public function _before_insert(&$data,$option){
		if( empty($_FILES['file']) && $_FILES['file']['error'] !=0 ) {
			$this->error="请上传广告图片！";
			return false;
		}
		$data['advert_img'] = $this->upload_pic($_FILES);
		
	}
	
	public function _before_update(&$data,$option){
		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
	    	$data['advert_img'] = $this->upload_pic($_FILES);
		}	
	}
	
	/**
	 * 上传图片
	 * @param  $file 图片信息
	 * @return string
	 */
	public function upload_pic($file){
		
		//图片相关的配置
		$qn_info =  array(
			'maxSize'    =>   2*1024*1024,//文件大小
			'rootPath'   =>    './', //保存的根路径
			'savePath'   =>    '',  //保存路径
			'saveName'   =>    array('uniqid',''),
			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  // 允许上传的后缀
			'autoSub'    =>    true,
			'replace'    =>    true, //存在同名是否覆盖
			'subName'    =>    C("AD_PREFIX"),
			'saveExt'    =>    'jpg',
			'driver' => 'Qiniu',
			'driverConfig' => C('QN_DRIVER_CONFIG'),
		);
		$upload = new \Think\Upload($qn_info);
		$info = $upload->upload();
		
		if($info) {
			$img = $info['file']['url'];
			return $img;
		}
	}
}