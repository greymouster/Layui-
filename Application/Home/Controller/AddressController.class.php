<?php
// +----------------------------------------------------------------------
// | Tiandao [ 北京天道教育集团 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://tiandaoedu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: run.yuan@tiandaoedu.com
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 咨询控制器
 */
class AddressController extends BaseController {

	public function index() {

		$paging = I('paging', 0);
		$list_rows = I('list_rows', C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 20);
		$sort_field = I('sort_field', '');
		$sort_rule = I('sort_rule', '');
		
		$sort = "add_time desc";
		if ( $sort_field ) {
			$sort = $sort_field . " " . $sort_rule;
		
		}
		
		// 问题标题
		$branch_name = I('branch_name', '');
		if ( ! empty($branch_name) ) {
			$where['branch_name'] = array (
					'like',
					"%$branch_name%" 
			);
		}
		
		$addressModel = D('Address');
		/* 获取总条数 */
		$total = $addressModel->get_count($where);
		
		// 获取未认证用户的数量
		$page = new \Think\Page($total, $list_rows);
		$page->setConfig('first', '首页');
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('last', '尾页');
		$_page = $this->bootstrap_page_style($page->show());
		
		// 查询列表
		$address = $addressModel->get_list($where, $page->nowPage, $list_rows, $sort);
		
		$this->assign('_page', $_page); // 底部分页
		$this->assign('_total', $total); // 列表总数量
		$this->assign('address_list', $address);
		$this->display();
	
	}

	/**
	 * Thinkphp默认分页样式转Bootstrap分页样式
	 *
	 * @param string $page_html
	 *        	tp默认输出的分页html代码
	 * @return string 新的分页html代码
	 */
	function bootstrap_page_style($page_html) {

		if ( $page_html ) {
			$page_show = str_replace('<div>', '<nav><ul class="pagination" >', $page_html);
			$page_show = str_replace('</div>', '</ul></nav>', $page_show);
			$page_show = str_replace('<span class="current">', '<li class="active"><a>', $page_show);
			$page_show = str_replace('</span>', '</a></li>', $page_show);
			$page_show = str_replace(array (
					'<a class="num"',
					'<a class="prev"',
					'<a class="next"',
					'<a class="end"',
					'<a class="first"' 
			), '<li><a', $page_show);
			$page_show = str_replace('</a>', '</a></li>', $page_show);
		}
		return $page_show;
	}

	public function add() {

		$this->display();
	}

	public function save() {

		$branch_name = I('post.branch_name', ''); // 公司名称
		$address = I('post.address', ''); // 公司地址
		$telephone = I('post.telephone', ''); // 咨询电话
		
		$bus = I('post.bus', ''); // 公交线路
		$subway = I('post.subway', ''); // 地铁线路
		$drive = I('post.drive', ''); // 自驾线路
		$weixin = I('post.weixin', ''); // 微博
		$map = I('post.map', ''); // 公司坐标
		
		$data['add_time'] = time();
		$data['branch_name'] = $branch_name;
		$data['address'] = $address;
		$data['telephone'] = $telephone;
		$data['bus'] = $bus;
		$data['subway'] = $subway;
		$data['drive'] = $drive;
		
		$data['weixin'] = $weixin;
		
		$data['map'] = $map;
		
		$addressModel = D('Address');
		if ( $consultid = $addressModel->add_address($data) ) {
			$res['consultid'] = $consultid;
			$this->ajaxReturn(array (
					'status' => 1,
					'msg' => '公司数据添加成功！',
					'back_url' => U('Address/index') 
			));
		}
		$this->ajaxReturn(array (
				'status' => 0,
				'msg' => '公司数据添加失败！' 
		));
	
	}

	public function edit() {

		$id = I('id', ''); // 问题id
		
		$addressModel = D('Address');
		$address = $addressModel->get_infoById($id);
		
		$this->assign('address', $address);
		$this->display();
	
	}

	public function edit_save() {

		$address_id = I('post.address_id', ''); // 问题标题
		$branch_name = I('post.branch_name', ''); // 公司名称
		$address = I('post.address', ''); // 公司地址
		$telephone = I('post.telephone', ''); // 咨询电话
		
		$bus = I('post.bus', ''); // 公交线路
		$subway = I('post.subway', ''); // 地铁线路
		$drive = I('post.drive', ''); // 自驾线路
		$weixin = I('post.weixin', ''); // 微博
		$map = I('post.map', ''); // 公司坐标
		
		$data['branch_name'] = $branch_name;
		$data['address'] = $address;
		$data['telephone'] = $telephone;
		$data['bus'] = $bus;
		$data['subway'] = $subway;
		$data['drive'] = $drive;
		$data['weixin'] = $weixin;
		$data['map'] = $map;
		
		$addressModel = D('Address');
		if ( $res = $addressModel->edit_address($data, $address_id) ) {
			
			$this->ajaxReturn(array (
					'status' => 1,
					'msg' => '公司数据修改成功！',
					'back_url' => U('Address/index') 
			));
		}
		$this->ajaxReturn(array (
				'status' => 0,
				'msg' => '公司数据修改失败！' 
		));
	
	}

	public function status_change() {

		$id = I('id', 0); // 公司id
		$status = I('status', 0); // 要修改的状态
		$data['status'] = $status;
		$addressModel = D('Address');
		
		if ( $addressModel->where(array (
				'id' => $id 
		))->save($data) ) {
			
			$this->ajaxReturn(array (
					'status' => 1,
					'msg' => '操作成功！' 
			));
		}
		$this->ajaxReturn(array (
				'status' => 0,
				'msg' => '操作失败！' 
		));
	}
}