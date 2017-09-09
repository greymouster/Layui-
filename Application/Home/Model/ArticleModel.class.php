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

/**
 * 作者管理
 */
class ArticleModel {

	/**
	 * 根据id获取文章信息
	 * @param	id    文章唯一标识
	 */
	public function getInfoById($id) {
		if (empty($id)) {
			return false;
		}

		$Article = M('Article');
		$map['id'] = $id;
		$data = $Article->where($map)->find();

		if ($data) {
			$data['content'] = str_replace('/ueditor/net/upload/', "http://img2.tiandaoedu.com/www/ueditor/net/upload/", $data['content']);
			$data['content'] = str_replace('/ueditor/net/uploadFile/', "http://img2.tiandaoedu.com/www/ueditor/net/uploadFile/", $data['content']);
			$data['content'] = str_replace('/UploadFile/thumbnail/', "http://img2.tiandaoedu.com/www/thumbnail/", $data['content']);

			if (!empty($data['thumb_img'])) {
				if (strpos($data['thumb_img'], "UploadFile") !== false) {
					$data['thumb_img'] = str_replace("/UploadFile/", "http://img2.tiandaoedu.com/www/UploadFile/", $data['thumb_img']);
				} else if (strpos($data['thumb_img'], "ueditor/net/upload") !== false) {
					$data['thumb_img'] = str_replace('/ueditor/net/upload/', "http://img2.tiandaoedu.com/www/ueditor/net/upload/", $data['thumb_img']);
				} else if (strpos($data['thumb_img'], "ueditor/net/uploadFile") !== false) {
					$data['thumb_img'] = str_replace('/ueditor/net/uploadFile/', "http://img2.tiandaoedu.com/www/ueditor/net/uploadFile/", $data['thumb_img']);
				} else if (strpos($data['thumb_img'], "Uploads") !== false) {
					$data['thumb_img'] = str_replace('/Uploads', "http://cb2016.tdedu.org/Uploads", $data['thumb_img']);
				} else if (strpos($data['thumb_img'], "http://res.1gre.cn") !== false) {
					$data['thumb_img'] = $data['thumb_img'];
				} else {
					if ($data['system_id'] == "4") {
						$data['thumb_img'] = "http://toefl.tiandaoedu.com" . $data['thumb_img'];
					} else if ($data['SystemId'] == "3") {
						$data['thumb_img'] = "http://ielts.tiandaoedu.com" . $data['thumb_img'];
					} else if ($data['SystemId'] == "1") {
						$data['thumb_img'] = "http://news.tiandaoedu.com" . $data['thumb_img'];
					} else {
						$data['thumb_img'] = "http://tiandaoedu.com" . $data['thumb_img'];
					}
				}
			}
		}

		//生成移动端url
		//$data['mobile_url'] = get_mobile_url($data['system_id'], $data['id'], $data['category_id'], $data['article_id'], $data['rchannel_id']);

		return $data;
	}
	/**
	 * 自定义条件获取文章信息
	 */
	public function getInfo($where) {
		if (empty($where)) {
			return false;
		}

		$Article = M('Article');
		$data = $Article->where($where)->select();

		if ($data) {
			if (!empty($data['content'])) {
				$data['content'] = str_replace('/ueditor/net/upload/', "http://img2.tiandaoedu.com/www/ueditor/net/upload/", $data['content']);
				$data['content'] = str_replace('/ueditor/net/uploadFile/', "http://img2.tiandaoedu.com/www/ueditor/net/uploadFile/", $data['content']);
				$data['content'] = str_replace('/UploadFile/thumbnail/', "http://img2.tiandaoedu.com/www/thumbnail/", $data['content']);
			}

			if (!empty($data['thumb_img'])) {
				if (strpos($data['thumb_img'], "UploadFile") !== false) {
					$data['thumb_img'] = str_replace("/UploadFile/", "http://img2.tiandaoedu.com/www/UploadFile/", $data['thumb_img']);
				} else if (strpos($data['thumb_img'], "ueditor/net/upload") !== false) {
					$data['thumb_img'] = str_replace('/ueditor/net/upload/', "http://img2.tiandaoedu.com/www/ueditor/net/upload/", $data['thumb_img']);
				} else if (strpos($data['thumb_img'], "ueditor/net/uploadFile") !== false) {
					$data['thumb_img'] = str_replace('/ueditor/net/uploadFile/', "http://img2.tiandaoedu.com/www/ueditor/net/uploadFile/", $data['thumb_img']);
				} else if (strpos($data['thumb_img'], "Uploads") !== false) {
					$data['thumb_img'] = $data['thumb_img'];

				}/*else {
			if ($data['system_id"'] == "4") {
			$data['thumb_img'] = "http://toefl.tiandaoedu.com" . $data['thumb_img'];
			} else if ($data['SystemId"'] == "3") {
			$data['thumb_img'] = "http://ielts.tiandaoedu.com" . $data['thumb_img'];
			} else if ($data['SystemId"'] == "1") {
			$data['thumb_img'] = "http://news.tiandaoedu.com" . $data['thumb_img'];
			} else {
			$data['thumb_img'] = "http://tiandaoedu.com" . $data['thumb_img'];
			}
			}*/
			}
		}

		return $data;
	}

	/**
	 * 添加文章
	 * @param $data
	 * @return boolean|unknown
	 */
	public function add($data) {
		if (empty($data)) {
			return false;
		}
		$Article = M('Article');
		$data['thumb_img'] = $this->upload_pic($_FILES);
		$result = $Article->data($data)->add();
		return $result;
	}

	/**
	 * 修改文章信息
	 */
	public function edit($where, $data) {
		if (empty($where) || empty($data)) {
			return false;
		}

		if (array_key_exists('content', $data)) {
			$data['content'] = str_replace('http://img2.tiandaoedu.com/www/ueditor/net/upload/', "/ueditor/net/upload/", $data['content']);
			$data['content'] = str_replace('http://img2.tiandaoedu.com/www/ueditor/net/uploadFile/', "/ueditor/net/uploadFile/", $data['content']);
			$data['content'] = str_replace('http://img2.tiandaoedu.com/www/thumbnail/', "/UploadFile/thumbnail/", $data['content']);
		}

		if (array_key_exists('thumb_img', $data)) {
			if (strpos($data['thumb_img'], "UploadFile") !== false) {
				$data['thumb_img'] = str_replace("http://img2.tiandaoedu.com/www/UploadFile/", "/UploadFile/", $data['thumb_img']);
			} else if (strpos($data['thumb_img'], "ueditor/net/upload") !== false) {
				$data['thumb_img'] = str_replace('http://img2.tiandaoedu.com/www/ueditor/net/upload/', "/ueditor/net/upload/", $data['thumb_img']);
			} else if (strpos($data['thumb_img'], "ueditor/net/uploadFile") !== false) {
				$data['thumb_img'] = str_replace('http://img2.tiandaoedu.com/www/ueditor/net/uploadFile/', "/ueditor/net/uploadFile/", $data['thumb_img']);
			} else if (strpos($data['thumb_img'], "Uploads") !== false) {
				$data['thumb_img'] = $data['thumb_img'];
			} else {
				if ($data['system_id'] == "4") {
					$data['thumb_img'] = str_replace('http://toefl.tiandaoedu.com', "", $data['thumb_img']);
				} else if ($data['SystemId'] == "3") {
					$data['thumb_img'] = str_replace('http://ielts.tiandaoedu.com', "", $data['thumb_img']);
				} else if ($data['SystemId'] == "1") {
					$data['thumb_img'] = str_replace('http://news.tiandaoedu.com', "", $data['thumb_img']);
				} else {
					$data['thumb_img'] = str_replace('http://tiandaoedu.com', "", $data['thumb_img']);
				}
			}
		}
		$Article = M('Article');
		if ($_FILES) {
			$data['thumb_img'] = $this->upload_pic($_FILES);
		}

		//var_dump($_FILES);die;
		$result = $Article->where($where)->save($data);
		return $result;
	}

	/**
	 * 删除文章
	 */
	public function del($where) {
		if (empty($where)) {
			return false;
		}

		$Article = M('Article');
		$result = $Article->where($where)->delete();
		return $result;
	}

	/**
	 * 获取文章数量
	 */
	public function getCount($data) {
		$where = " td_article_category.is_delete = 0 ";
		$join = ' INNER JOIN __ARTICLE_CATEGORY__ on __ARTICLE__.category_id=__ARTICLE_CATEGORY__.category_id and __ARTICLE__.system_id = __ARTICLE_CATEGORY__.system_id';

		//留学案例
		if (array_key_exists('is_machting', $data)) {
			if (($data['is_machting'] == 1)) {
				$where .= " and  td_article.article_id in (select article_id from td_offer where is_delete = 0 and article_id > 0  )";
			} else if (($data['is_machting'] == 2)) {
				$where .= " and  td_article.article_id not in (select article_id from td_offer where is_delete = 0 and article_id > 0  )";
			} else if (array_key_exists('year', $data) || array_key_exists('country', $data) || array_key_exists('education', $data) || array_key_exists('money_status', $data)) {
				$join .= ' INNER JOIN __OFFER__ on __ARTICLE__.article_id =  __OFFER__.article_id ';
				$where .= ' and td_offer.is_main = 1 and td_offer.is_delete = 0 ';
			}
		}

		//按标签
		if (array_key_exists('property', $data)) {
			$join .= ' INNER JOIN __ARTICLE_PROPERTY_MAPPING__ on __ARTICLE__.id =  __ARTICLE_PROPERTY_MAPPING__.article_id ';
			$where .= " and td_article_property_mapping.property_id in ({$data['property']}) and  td_article_property_mapping.table_name = '{$data['table_name']}' ";
		}

		//留学案例----->按年份
		if (array_key_exists('year', $data)) {
			$where .= " and td_offer.year in ('{$data['year']}') ";
		}

		//留学案例----->按国家
		if (array_key_exists('country', $data)) {
			$where .= " and td_offer.country in ('{$data['country']}') ";
		}

		//留学案例----->按学历
		if (array_key_exists('education', $data)) {
			$where .= " and td_offer.education in ('{$data['education']}') ";
		}

		//留学案例----->按奖学金
		if (array_key_exists('money_status', $data)) {
			$where .= " and td_offer.money_status in ('{$data['money_status']}') ";
		}

		if (!array_key_exists("is_delete", $data)) {
			$data['is_delete'] = 0;
		}

		$where .= " and td_article.is_delete = " . $data['is_delete'];

		if (array_key_exists("status", $data) || array_key_exists("status", $data)) {
			$where .= " and td_article.status = " . $data['status'];
		}

		//名师访谈查询条件之一
		if (array_key_exists("ti_keyword", $data) || array_key_exists("ti_type", $data)) {
			$join .= ' INNER JOIN __TEACHER_INTERVIEW__ on __ARTICLE__.id=__TEACHER_INTERVIEW__.article_id';
		}

		if (array_key_exists("c_start_time", $data)) {
			$where .= " and td_article.create_time >= " . $data['c_start_time'];
		}

		if (array_key_exists("c_end_time", $data)) {
			$where .= " and td_article.create_time < " . ($data['c_end_time']+60 * 60 * 24);
		}

		if (array_key_exists("p_start_time", $data)) {
			$where .= " and td_article.publish_time >= " . $data['p_start_time'];
		}

		if (array_key_exists("p_end_time", $data)) {
			$where .= " and td_article.publish_time < " . ($data['p_end_time']+60 * 60 * 24);
		}

		if (array_key_exists("u_start_time", $data)) {
			$where .= " and td_article.update_time >= " . $data['u_start_time'];
		}

		if (array_key_exists("u_end_time", $data)) {
			$where .= " and td_article.update_time < " . ($data['u_end_time']+60 * 60 * 24);
		}

		if (array_key_exists("author", $data)) {
			$where .= " and td_article.author = '{$data['author']}' ";
		}

		if (array_key_exists("subject", $data)) {
			$where .= " and td_article.subject like '%{$data['subject']}%' ";
		}

		if (array_key_exists("flag", $data)) {
			$where .= " and instr (flag,'{$data['flag']}') > 0 ";
		}

		if (array_key_exists("stages", $data)) {
			$where .= " and ";
			foreach ($data['stages'] as $v) {
				$where .= " td_article.application_stage like '%{$v}%' or";
			}
			$where = substr($where, 0, strlen($where) - 2);
		}

		if (array_key_exists("aspects", $data)) {
			$where .= " and ";
			foreach ($data['aspects'] as $v) {
				$where .= " td_article.application_aspects like '%{$v}%' or";
			}
			$where = substr($where, 0, strlen($where) - 2);
		}

		if (array_key_exists("ti_type", $data)) {
			$where .= " and td_teacher_interview.type in ( ";
			foreach ($data['ti_type'] as $v) {
				$where .= " '{$v}',";
			}
			$where = substr($where, 0, strlen($where) - 1) . ')';
		}

		if (array_key_exists("ti_keyword", $data)) {
			$where .= " and ";
			foreach ($data['ti_keyword'] as $v) {
				$where .= " td_teacher_interview.keyword like '%{$v}%' or";
			}
			$where = substr($where, 0, strlen($where) - 2);
		}

		//专业解析一级分类
		if (array_key_exists("rchannel_id", $data)) {
			$where .= " and td_article.rchannel_id in ( ";
			foreach ($data['rchannel_id'] as $v) {
				$where .= $v . ',';
			}
			$where = substr($where, 0, strlen($where) - 1) . ')';
		}

		if (array_key_exists("system_id", $data)) {
			$where .= " and td_article.system_id = {$data['system_id']} and td_article_category.system_id = {$data['system_id']}";
		}

		if (array_key_exists("category_id", $data)) {
			if (is_array($data['category_id'])) {
				$where .= " and td_article.category_id in ( ";
				foreach ($data['category_id'] as $v) {
					$where .= $v . ',';
				}
				$where = substr($where, 0, strlen($where) - 1) . ')';
			} else {
				$where .= " and td_article.category_id = {$data['category_id']} ";
			}
		}

		$Model = M('Article');
		$data = $Model->join($join)->where($where)->count();

		return $data;
	}

	/**
	 * 获取文章列表
	 * @param $sid  int	分类id
	 * @param	$status	状态 1、显示   默认为查询所有
	 * @return	array
	 */
	public function getList($data, $page = 1, $listRows = 20, $sort = "td_article.id desc") {
		$where = " td_article_category.is_delete = 0 ";
		$join = ' INNER JOIN __ARTICLE_CATEGORY__ on __ARTICLE__.category_id=__ARTICLE_CATEGORY__.category_id and __ARTICLE__.system_id = __ARTICLE_CATEGORY__.system_id';
		$field = ' td_article.*,td_article_category.category_name,td_article_category.directory ';

		if (array_key_exists("ti_keyword", $data) || array_key_exists("ti_type", $data)) {
			$join .= ' INNER JOIN __TEACHER_INTERVIEW__ on __ARTICLE__.id=__TEACHER_INTERVIEW__.article_id';
			$field .= ' , td_teacher_interview.type,td_teacher_interview.keyword ';
		}

		//留学案例
		if (array_key_exists('is_machting', $data)) {
			if (($data['is_machting'] == 1)) {
				$where .= " and  td_article.article_id in (select article_id from td_offer where is_delete = 0 and article_id > 0  )";
			} else if (($data['is_machting'] == 2)) {
				$where .= " and  td_article.article_id not in (select article_id from td_offer where is_delete = 0 and article_id > 0  )";
			} else if (array_key_exists('year', $data) || array_key_exists('country', $data) || array_key_exists('education', $data) || array_key_exists('money_status', $data)) {
				$join .= ' INNER JOIN __OFFER__ on __ARTICLE__.article_id =  __OFFER__.article_id ';
				$where .= ' and td_offer.is_main = 1 and td_offer.is_delete = 0 ';
			}
		}

		//按标签
		if (array_key_exists('property', $data)) {
			$join .= ' INNER JOIN __ARTICLE_PROPERTY_MAPPING__ on __ARTICLE__.id =  __ARTICLE_PROPERTY_MAPPING__.article_id ';
			$field .= ' , td_article_property_mapping.id as td_pm_id';
			$where .= " and td_article_property_mapping.property_id in ({$data['property']}) and  td_article_property_mapping.table_name = '{$data['table_name']}' ";
		}

		//留学案例----->按年份
		if (array_key_exists('year', $data)) {
			$where .= " and td_offer.year in ('" . str_replace(',more', '', $data['year']) . "') ";
		}

		//留学案例----->按国家
		if (array_key_exists('country', $data)) {
			$where .= " and td_offer.country in ('{$data['country']}') ";
		}

		//留学案例----->按学历
		if (array_key_exists('education', $data)) {
			$where .= " and td_offer.education in ('{$data['education']}') ";
		}

		//留学案例----->按奖学金
		if (array_key_exists('money_status', $data)) {
			$where .= " and td_offer.money_status in ('{$data['money_status']}') ";
		}

		if (!array_key_exists("is_delete", $data)) {
			$data['is_delete'] = 0;
		}

		$where .= " and td_article.is_delete = " . $data['is_delete'];

		if (array_key_exists("status", $data)) {
			$where .= " and td_article.status = " . $data['status'];
		}

		if (array_key_exists("c_start_time", $data)) {
			$where .= " and td_article.create_time >= " . $data['c_start_time'];
		}

		if (array_key_exists("c_end_time", $data)) {
			$where .= " and td_article.create_time < " . ($data['c_end_time']+60 * 60 * 24);
		}

		if (array_key_exists("p_start_time", $data)) {
			$where .= " and td_article.publish_time >= " . $data['p_start_time'];
		}

		if (array_key_exists("p_end_time", $data)) {
			$where .= " and td_article.publish_time < " . ($data['p_end_time']+60 * 60 * 24);
		}

		if (array_key_exists("u_start_time", $data)) {
			$where .= " and td_article.update_time >= " . $data['u_start_time'];
		}

		if (array_key_exists("u_end_time", $data)) {
			$where .= " and td_article.update_time < " . ($data['u_end_time']+60 * 60 * 24);
		}

		if (array_key_exists("author", $data)) {
			$where .= " and td_article.author = '{$data['author']}' ";
		}

		if (array_key_exists("subject", $data)) {
			$where .= " and td_article.subject like '%{$data['subject']}%' ";
		}

		if (array_key_exists("flag", $data)) {
			$where .= " and instr (flag,'{$data['flag']}') > 0 ";
		}

		if (array_key_exists("stages", $data)) {
			$where .= " and ";
			foreach ($data['stages'] as $v) {
				$where .= " td_article.application_stage like '%{$v}%' or";
			}
			$where = substr($where, 0, strlen($where) - 2);
		}

		if (array_key_exists("aspects", $data)) {
			$where .= " and ";
			foreach ($data['aspects'] as $v) {
				$where .= " td_article.application_aspects like '%{$v}%' or";
			}
			$where = substr($where, 0, strlen($where) - 2);
		}

		//专业解析一级分类
		if (array_key_exists("rchannel_id", $data)) {
			$where .= " and td_article.rchannel_id in ( ";
			foreach ($data['rchannel_id'] as $v) {
				$where .= $v . ',';
			}
			$where = substr($where, 0, strlen($where) - 1) . ')';
		}

		//名师访谈 留学
		if (array_key_exists("ti_type", $data)) {
			$where .= " and td_teacher_interview.type in ( ";
			foreach ($data['ti_type'] as $v) {
				$where .= " '{$v}',";
			}
			$where = substr($where, 0, strlen($where) - 1) . ')';
		}

		if (array_key_exists("ti_keyword", $data)) {
			$where .= " and ";
			foreach ($data['ti_keyword'] as $v) {
				$where .= " td_teacher_interview.keyword like '%{$v}%' or";
			}
			$where = substr($where, 0, strlen($where) - 2);
		}

		if (array_key_exists("system_id", $data)) {
			$where .= " and td_article.system_id = {$data['system_id']} and td_article_category.system_id = {$data['system_id']}";
		}

		if (array_key_exists("category_id", $data)) {
			if (is_array($data['category_id'])) {
				$where .= " and td_article.category_id in ( ";
				foreach ($data['category_id'] as $v) {
					$where .= $v . ',';
				}
				$where = substr($where, 0, strlen($where) - 1) . ')';
			} else {
				$where .= " and td_article.category_id = {$data['category_id']} ";
			}
		}
		//批量发布--查询时间内的数据集合
		if (array_key_exists("s_predict_pub_time", $data)) {
			$where .= " and td_article.predict_pub_time between {$data['s_predict_pub_time']} and {$data['e_predict_pub_time']} ";
		}

		if ($page >= 1) {
			$page = $page - 1;
		}

		$Model = M('Article');
		$data = $Model->join($join)->where($where)->limit($page * $listRows, $listRows)->order($sort)->field($field)->select();

		$_data = array();
		//生成移动端url
		/*foreach ($data as $k => $v) {
		$v['mobile_url'] = get_mobile_url($v['system_id'], $v['id'], $v['category_id'], $v['article_id'], $v['rchannel_id']);
		$_data[] = $v;
		}*/

		return $data;
	}

	/**
	 * 字段是否存在
	 * @param unknown $data
	 */
	public function isExist($where) {
		if (empty($where)) {
			return false;
		}

		$Article = M('Article');
		$result = $Article->where($where)->field('id')->find();

		return $result;
	}
	
	/**
	  * 根据关键字获取学子访谈
	*/
    public function getKeyOffer($where){
		$Article = M('Article');	 
	 	$data = $Article->where($where)
					 ->field('article_id,subject')	 	
                     ->limit(0,10)					 
	 	             ->select();
 
	 	return $data;

	 }	
	 
	/**
	 * 上传图片
	 * @param  $file 图片信息
	 * @return string
	 */
	public function upload_pic($file) {
		if (isset($file['file']) && $file['file']['error'] == 0) {
			//图片相关的配置
			$qn_info = array(
				'maxSize' => 2 * 1024 * 1024, //文件大小
				'rootPath' => './', //保存的根路径
				'savePath' => '', //保存路径
				'saveName' => array('uniqid', ''),
				'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 允许上传的后缀
				'autoSub' => true,
				'replace' => true, //存在同名是否覆盖
				'subName' => C("OFFER_PREFIX"),
				'saveExt' => 'jpg',
				'driver' => 'Qiniu',
				'driverConfig' => C('QN_DRIVER_CONFIG'),
			);
			$upload = new \Think\Upload($qn_info);
			$info = $upload->upload();
			if ($info) {
				$img = $info['file']['url'];
				return $img;
			}
			return '';
		}
	}

}