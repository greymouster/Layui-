<?php
// +----------------------------------------------------------------------
// | study.tiandaoedu.com
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: <owen.li@tiandaoedu.com>
// +----------------------------------------------------------------------
namespace Home\Controller;

/**
 * 留学案例
 * @author Administrator
 *
 */
class OfferController extends BaseController {

	/**
	 * 列表页
	 * @param	int $paging	手动输入的分页数
	 * @param	int	$category_id	分类id
	 * @param	int $parent_id	分类父id
	 * @param	int	$status		文章状态		默认发布状态
	 * @param	string	$sort	排序字段
	 * @param	string	$c_start_time	录入开始时间
	 * @param	string	$c_end_time		录入截止时间
	 * @param	string	$author		作者
	 * @param	string	$p_start_time	发布开始时间
	 * @param	string	$p_end_time		发布截止时间
	 * @param	string	$subject	文章标题
	 * @param	string 	$flag		自定义属相
	 */
	public function index() {

		$paging = I('paging', 0);
		$category_id = I('category_id', 0);
		$parent_id = I('parent_id', '');
		$sort_field = I('sort_field', '');
		$sort_rule = I('sort_rule', '');
		//$c_start_time = I('c_start_time', '');
		//$c_end_time = I('c_end_time', '');
		$author = I('author', '');
		$time = I('time', '');
		$start_time = I('start_time', '');
		$end_time = I('end_time', '');
		$flags = I('flags', '');
		$status = I('status', '');
		$subject = I('subject', '');
		$system_id = I('system_id', '');
		$years = I('years', '');
		$countrys = I('countrys', '');
		$educations = I('educations', '');
		$money_statuss = I('money_statuss', '');
		$propertys = I('propertys', '');
		$is_machting = I('is_machting', 0);//是否已匹配成功案例, 1、已匹配   2、未匹配

		$list_rows = I('list_rows', C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 20);

		$sort = "td_article.id desc";

		$ArticleCategory = D('ArticleCategory');
		$Article = D('Article');
		$ArticleAuthor = D('ArticleAuthor');
		$Caption = D("Caption");

		//编辑页返回url
		$e_back_url = "?parent_id={$parent_id}&system_id={$system_id}&status={$status}";

		/*查询条件*/
		if ($status == '') {
			$status = 4;
		}

		$where['status'] = $status;

		if ($time) {
			if ($start_time) {
				switch ($time) {
					case 1:
						$where['c_start_time'] = strtotime($start_time);
						break;
					case 2:
						$where['p_start_time'] = strtotime($start_time);
						break;
					case 3:
						$where['u_start_time'] = strtotime($start_time);
						break;
				}
			}
			if ($end_time) {
				switch ($time) {
					case 1:
						$where['c_end_time'] = strtotime($end_time);
						break;
					case 2:
						$where['p_end_time'] = strtotime($end_time);
						break;
					case 3:
						$where['u_end_time'] = strtotime($end_time);
						break;
				}
			}

		}
		//var_dump($where);die;
		/*if ($c_start_time) {
		$where['c_start_time'] = $c_start_time;
		$e_back_url .= "&c_start_time={$c_start_time}";
		}

		if ($c_end_time) {
		$where['c_end_time'] = $c_end_time;
		$e_back_url .= "&c_end_time={$c_end_time}";
		}
		 */
		if ($author) {
			$where['author'] = $author;
			$e_back_url .= "&author={$author}";
		}

		if ($subject) {
			$where['subject'] = $subject;
			$e_back_url .= "&subject={$subject}";
		}

		/*if ($p_start_time) {
		$where['p_start_time'] = $p_start_time;
		$e_back_url .= "&p_start_time={$p_start_time}";
		}

		if ($p_end_time) {
		$where['p_end_time'] = $p_end_time;
		$e_back_url .= "&p_end_time={$p_end_time}";
		}*/

		if ($flags) {
			$where['flag'] = $flags;
			$e_back_url .= "&flags={$flags}";
		}

		$where['is_machting'] = $is_machting;
		$e_back_url .= "&is_machting={$is_machting}";

		if ($is_machting != 1) {
			if ($years) {
				$where['year'] = $years;
				$e_back_url .= "&years={$years}";
			}

			if ($countrys) {
				$where['country'] = $countrys;
				$e_back_url .= "&countrys={$countrys}";
			}

			if ($educations) {
				$where['education'] = $educations;
				$e_back_url .= "&educations={$educations}";
			}

			if ($money_statuss) {
				$where['money_status'] = $money_statuss;
				$e_back_url .= "&money_statuss={$money_statuss}";
			}
		}

		if ($propertys) {
			$where['property'] = $propertys;
			$where['table_name'] = 'tb_Success';
			$e_back_url .= "&propertys={$propertys}";
		}

		if ($sort_field) {
			$sort = "td_article." . $sort_field . " " . $sort_rule;
			$e_back_url .= "&sort_field={$sort_field}&sort_rule={$sort_rule}";
		}

		if ($category_id == $parent_id) {
			$category_id = 0;
		}
		//如果category_id  ==  parent_id   将categroy_id 置为0
		if ($system_id) {
			$where['system_id'] = $system_id;
		}

		if ($category_id || $system_id == 35) {
			switch ($category_id) {
				case 284:
					$where['system_id'] = 4;
					break;
				case 283:
					$where['system_id'] = 3;
					break;
				case 307:
					$where['system_id'] = 27;
					break;
				case 309:
					$where['system_id'] = 29;
					break;
				case 308:
					$where['system_id'] = 28;
					break;
				case 1058:
					$where['system_id'] = 41;
					break;
				case 310:
					$where['system_id'] = 30;
					break;
			}
			$where['category_id'] = $category_id;
			$system_id = 35;
			/*$category_childs = getCategoryList($category_id, $system_id);

		if ($category_childs) {
		foreach ($category_childs as $k => $v) {
		$where['category_id'][$k] = $v['category_id'];
		}
		$where['category_id'][count($category_childs)] = $category_id;
		} else {
		$where['category_id'] = $category_id;
		}
		$e_back_url .= "&category_id={$category_id}";*/
		}

		$category_list = array();
		$parent_info = array();

		if ($parent_id) {
			$parent_info = $ArticleCategory->getInfoByCategoryId($parent_id, $system_id);
			$caption_info = $Caption->getInfoBySystemId($system_id);
			$category_list = getCategoryList($parent_id, $system_id);

			if ($caption_info) {
				$parent_info['caption'] = $caption_info['caption'];
			}

			if ($category_list) {
				foreach ($category_list as $k => $v) {
					if (empty($category_id)) {
						$where['category_id'][$k] = $v['category_id'];
					}
				}
			}

			if (empty($category_id) && array_key_exists('category_id', $where)) {
				array_push($where['category_id'], $parent_id);
			} else if (empty($category_id)) {
				$where['category_id'] = $parent_id;
			}
		}

		/*获取总条数*/
		$total = $Article->getCount($where);

		/*查询列表*/
		$_req = $_REQUEST;

		$_req['list_rows'] = $list_rows;

		$_req['sort_rule'] = $sort_rule;
		$_req['sort_field'] = $sort_field;
		$_req['category_id'] = $category_id;
		//$page = new \Think\Page($total, $list_rows, $_req);

		$page = new \Think\Page($total, $list_rows);
		if ($paging) {
			$page->nowPage = $paging;
		}

		$page->setConfig('first', '首页');
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('last', '尾页');
		$_page = bootstrap_page_style($page->show());

		$list = $Article->getList($where, $page->nowPage, $list_rows, $sort);
		//var_dump($list);die;
		//echo $Article->getLastSql();die;
		$author_list = $ArticleAuthor->getList();

		//缓存Edit页面回调地址
		session(C("EDIT_BACK_URL"), $e_back_url);

		$this->assign('years', $years);
		$this->assign('countrys', $countrys);
		$this->assign('educations', $educations);
		$this->assign('money_statuss', $money_statuss);
		$this->assign('propertys', $propertys);
		$this->assign('subject', $subject);
		$this->assign('time', $time);
		$this->assign('start_time', $start_time);
		$this->assign('end_time', $end_time);
		/*$this->assign('p_start_time', $p_start_time);
		$this->assign('p_end_time', $p_end_time);*/
		$this->assign('author', $author);
		$this->assign('status', $status);
		$this->assign('category_id', $category_id);
		$this->assign('parent_id', $parent_id);
		$this->assign('parent_info', $parent_info);
		$this->assign('flags', $flags);
		$this->assign('sort_rule', $sort_rule);
		$this->assign('sort_field', $sort_field);
		$this->assign('system_id', $system_id);
		$this->assign('list_rows', $list_rows);
		$this->assign('p', $paging ? $paging : '');
		$this->assign('_page', $_page);//底部分页
		$this->assign('_total', $total);//列表总数量
		$this->assign('_list', $list);//文章列表
		$this->assign('_author_list', $author_list);//作者列表
		//$this->assign("_category_list", $category_list);//分类列表
		$this->assign('is_machting', $is_machting);

		$this->display();
	}

	public function add() {
		$this->assign('username', session('user_name'));
		$this->display();
	}

	/**
	 * 添加
	 * @param	string	$subject			文章标题
	 * @param	string	$short_subject		文章简短标题
	 * @param	int	    $category_id  		分类id
	 * @param	string	$is_comment	    	是否允许评论
	 * @param 	string	$author			    作者
	 * @param	string  $source     		文章来源
	 * @param	string  $keyword     		关键词
	 * @param	string  $thumb_img     		缩略图
	 * @param	string 	$flag		    	自定义属相
	 * @param	int 	$rmbq		    	热门标签
	 * @param	int 	$status		    	文章状态
	 * @param	int		$system_id
	 * @param	string	$summary			文章摘要
	 * @param	string	$content			文章内容
	 */
	public function save() {

		//$category_id =I('category_id',0);
		//$parent_id =I('parent_id',0);
		$system_id = I('system_id', 0);
		$px_cate_id = I('px_cate_id', 0);
		$result = $this->system_act($system_id, $px_cate_id);
		$system_id = $result['system_id'];
		$category_id = $result['category_id'];
		$subject = I('post.subject', '');

		$msg = array('status' => 0, 'code' => '添加失败');
		$data = array();
		$maxId = get_article_id();
		$maxId = $maxId + 1;

		//$short_subject = I('post.short_subject', '');
		$author = I('post.author', '');
		//$is_comment = I('post.is_comment');
		//$source = I('post.source', 5);
		$keyword = I('post.keyword', '');
		$thumb_img = I('post.thumb_img', '');
		$status = I('post.status', 4);
		$flag = I('post.flag', '');//自定义属性
		$summary = I('post.summary', '');
		$content = $_POST['content'];
		$rmbq = I('post.rmbq', '');
		$offer_id = I('post.is_main_up', '');
		//var_dump($rmbq);die;
		$data['article_id'] = $maxId;//文章id
		$data['category_id'] = $category_id;
		$data['system_id'] = $system_id;
		$data['subject'] = $subject;
		$data['short_subject'] = $short_subject;
		$data['author'] = $author;
		$data['source'] = '留学App';//注册来源 1主站 2移动站 3论坛 4网校 5留学app
		$data['keyword'] = $keyword;
		$data['thumb_img'] = $thumb_img;
		$data['status'] = $status;
		$data['flag'] = "";
		$data['summary'] = $summary;
		$data['content'] = $content;
		$data['create_time'] = time();
		$publish_time = I('publish_time', '');

		if ($is_comment === "0") {
			$data['is_comment'] = $is_comment;
		} else {
			$data['is_comment'] = "1";
		}

		if ($status == "4") {
			$data['publish_time'] = time();
		} else {
			$data['publish_time'] = $publish_time;
		}

		if ($flag) {
			$data['flag'] = implode(',', array_unique($flag));
		}

		// 调用新增用户接口
		$Article = D('Article');

		$res = $Article->isExist(array('subject' => $subject));//校验标题是否重复
		if ($res) {
			$this->ajaxReturn($msg);
		}
		//标题存在添加失败

		$res = $Article->add($data);

		if ($res) {
			matching_offer($offer_id, $maxId);//成功案例与文章绑定
			//热门标签
			$rmData = array();
			$ArticlePropertyMapping = D('ArticlePropertyMapping');

			foreach ($rmbq as $bq) {
				$rmData['article_id'] = $res;
				$rmData['property_id'] = $bq;
				$rmData['table_name'] = 'tb_Success';

				$result = $ArticlePropertyMapping->add($rmData);
			}

			$msg['status'] = 1;
			$msg['code'] = '添加成功';
			$this->ajaxReturn(array('status' => 1, 'msg' => '案例添加成功！', 'back_url' => U('Offer/index')));
		}
		$this->ajaxReturn($msg);

	}

	/**
	 * 修改
	 * @param	string	$subject			文章标题
	 * @param	string	$short_subject		文章简短标题
	 * @param	int	    $category_id  		分类id
	 * @param	string	$is_comment	    	是否允许评论
	 * @param 	string	$author			    作者
	 * @param	string  $source     		文章来源
	 * @param	string  $keyword     		关键词
	 * @param	string  $thumb_img     		缩略图
	 * @param	string 	$flag		    	自定义属相
	 * @param	int 	$rmbq		    	热门标签
	 * @param	int 	$status		    	文章状态
	 * @param	int		$system_id
	 * @param	string	$summary			文章摘要
	 * @param	string	$content			文章内容
	 */
	public function edit() {
		//var_dump($_FILES);die;
		$a = $_POST;
		//var_dump($a);die;
		$id = I('id', 0);
		$subject = I('post.subject', '');
		//$parent_id = I('parent_id', 0);

		$Article = D('Article');
		$ArticlePropertyMapping = D('ArticlePropertyMapping');

		$info = $Article->getInfoById($id);//获取文章信息
		//var_dump($info);die;
		if ($subject) {
			//var_dump($subject);die;
			$msg = array('status' => 0, 'code' => '编辑失败');
			$where['id'] = $id;

			$data = array();
			$data['subject'] = $subject;
			//$short_subject = I('post.short_subject', '');
			$system_id = I('system_id', 0);
			$px_cate_id = I('px_cate_id', 0);
			$result = $this->system_act($system_id, $px_cate_id);

			$system_id = $result['system_id'];
			$category_id = $result['category_id'];

			//$category_id = I('post.category_id', '');
			$author = I('post.author', '');
			//$source = I('post.source', 5);
			$keyword = I('post.keyword', '');
			//$thumb_img = I('post.thumb_img', '');
			$status = I('post.status', 4);
			$summary = I('post.summary', '');
			$content = $_POST['content'];
			$publish_time = I('post.publish_time', '');
			$rmbq = I('post.rmbq', 0);
			$offer_id = I('post.is_main_up', '');

			//$data['short_subject'] = $short_subject;
			$data['system_id'] = $system_id;
			$data['category_id'] = $category_id;
			$data['author'] = $author;
			$data['source'] = '留学App';
			$data['keyword'] = $keyword;
			//$data['thumb_img'] = $thumb_img;
			$data['status'] = $status;
			//$data['flag'] = "";//自定义属性
			$data['summary'] = $summary;
			$data['content'] = $content;
			$data['update_time'] = time();
			//$data['publish_time'] = $publish_time;

			$flag = I('post.flag', 0);

			$is_comment = I('post.is_comment');

			if ($is_comment === "0") {
				$data['is_comment'] = $is_comment;
			} else {
				$data['is_comment'] = "1";
			}

			if ($flag) {
				$data['flag'] = implode(',', array_unique($flag));
			}

			/**
			 * 热门标签
			 * 判断article_id在td_article_property_mapping有没有记录
			 * 存在先删除在add     不存在add
			 */
			$rmData = array();
			$rmDataArray = $ArticlePropertyMapping->getPropertyId(array('article_id' => $id, 'table_name' => 'tb_Success'));

			if ($rmDataArray) {
				$rmWhere['article_id'] = $id;
				$ArticlePropertyMapping->del($rmWhere);
			}

			foreach ($rmbq as $bq) {
				$rmData['article_id'] = $id;
				$rmData['property_id'] = $bq;
				$rmData['table_name'] = 'tb_Success';
				$res = $ArticlePropertyMapping->add($rmData);
			}

			if ($subject != $info['subject']) {
				//判断当前文章标题是否需要验重
				$res = $Article->isExist(array('subject' => $subject));//校验标题是否重复
				if ($res) {
					$this->ajaxReturn($msg);
				}
				//标题重复,编辑失败
			}

			$res = $Article->edit($where, $data);
			matching_offer($offer_id, $info['article_id']);//成功案例与文章绑定
			if (0 <= $res) {
				$msg['status'] = 1;
				$msg['code'] = '编辑成功';
				$this->ajaxReturn(array('status' => 1, 'msg' => '案例编辑成功！', 'back_url' => U('Offer/index')));
				//$msg['back_url'] = U("ArticleStudyAbroad/index") . session(C("EDIT_BACK_URL"));
			}
			$this->ajaxReturn($msg);
		} else {
			//$ArticleCategory = D('ArticleCategory');
			$Offer = D('Offer');

			/*$parent_info = array();
			$parent_info = $ArticleCategory->getInfoByCategoryId($parent_id, $info['system_id']);

			$category_list = array();
			$category_list = getCategoryList($parent_id, $info['system_id']);*/

			$offer_info = $Offer->getInfoByArticleId($info['article_id']);

			if ($offer_info) {
				$offer_list = $Offer->getList(array('year' => $offer_info['year'], 'background' => $offer_info['background'], 'studentrealname' => $offer_info['studentrealname'], 'is_delete' => 0));

				$this->assign('offer_id', $offer_info['id']);
				$this->assign('offer_list', $offer_list);
			}

			$rmbq = $ArticlePropertyMapping->getPropertyId(array('article_id' => $id, 'table_name' => 'tb_Success'));

			if ($rmbq) {
				$rmStr = "";
				foreach ($rmbq as $rm) {
					foreach ($rm as $r) {
						$rmStr .= $r . ',';
					}
				}
				//$rmStr = substr($rmStr, 0, strlen($rmStr) - 1);
			}
			//var_dump($offer_info['id']);die;

			$this->assign('info', $info);
			$this->assign('rmbqs', $rmStr);
			//$this->assign('category_id', $info['category_id']);
			//$this->assign('parent_info', $parent_info);
			//$this->assign('_category_list', $category_list);
			//$this->assign('back_url', U("ArticleStudyAbroad/index") . session(C("EDIT_BACK_URL")));

			$this->display();
		}
	}

	/**
	 * 获取offer榜列表
	 * @param   $year            int       录取年份
	 * @param   $student_name    string    学生别名
	 * @param   $background      string    申请背景
	 */
	public function getOfferList() {
		$year = I('year', '');
		$student_name = I('student_name', '');
		$background = I('background', '');
		$school_name = I('school_name', '');

		$msg = array('status' => 0, 'code' => '参数错误');

		if (empty($student_name)) {
			$this->ajaxReturn($msg);
		}

		if (empty($background)) {
			$this->ajaxReturn($msg);
		}

		$where['studentrealname'] = $student_name;
		$where['background'] = $background;
		$where['is_delete'] = 0;

		if (!empty($school_name)) {
			$where['school_name'] = $school_name;
		}

		if (!empty($year)) {
			$where['year'] = $year;
		}

		$Offer = D('Offer');
		$list = $Offer->getList($where);

		if ($list) {
			$msg['status'] = 1;
			$msg['_list'] = $list;
		}
		$this->ajaxReturn($msg);
	}

	//system_id处理
	function system_act($system_id, $px_cate_id) {
		if ($system_id == 4 && $px_cate_id != '') {
			//培训案例
			switch ($px_cate_id) {
				case 1:
					$system_id = 4;
					$category_id = 284;
					break;
				case 2:
					$system_id = 3;
					$category_id = 283;
					break;
				case 3:
					$system_id = 27;
					$category_id = 307;
					break;
				case 4:
					$system_id = 29;
					$category_id = 309;
					break;
				case 5:
					$system_id = 28;
					$category_id = 308;
					break;
				case 6:
					$system_id = 41;
					$category_id = 1058;
					break;
				case 7:
					$system_id = 30;
					$category_id = 310;
					break;
			}
		} else {
			switch ($system_id) {
				case 36:
					$category_id = 202;
					break;
				case 34:
					$category_id = 189;
					break;
				case 42:
					$category_id = 1085;
					break;

			}
		}
		$data['system_id'] = $system_id;
		$data['category_id'] = $category_id;
		return $data;
	}

	//修改文章状态
	public function status_change() {
		$id = I('id', 0);//问答id
		$status = I('status', 0);//要修改的状态
		$data['status'] = $status;
		$articleModel = D('Article');

		if ($articleModel->edit(array('id' => $id), $data)) {

			$this->ajaxReturn(array('status' => 1, 'msg' => '操作成功！'));
		}
		$this->ajaxReturn(array('status' => 0, 'msg' => '操作失败！'));

	}

	//删除文章
	public function offer_del() {
		$id = I('id', 0);//问答id
		$is_delete = I('is_delete', 1);//要修改的状态
		$data['is_delete'] = $is_delete;
		$articleModel = D('Article');

		if ($articleModel->edit(array('id' => $id), $data)) {

			$this->ajaxReturn(array('status' => 1, 'msg' => '操作成功！'));
		}
		$this->ajaxReturn(array('status' => 0, 'msg' => '操作失败！'));

	}

}