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
 *广告位控制器
 */
class AdlocationController extends BaseController {
	
	public function index() { 
	    $position_id = I('position_id',0); // 广告位置id
	    $start_time = I('start_time',0); //开始时间
	    $end_time = I('end_time',0);//截止时间
	    $adname = trim(I('adname','')); // 广告位标题
	    if($position_id) {
	    	$where['position_id'] = array('eq',$position_id);
	    }
	    
	    if($start_time && $end_time) {
	    	$where['add_time'] = array('between',array(strtotime("$start_time 00:00:00"), strtotime("$end_time 23:59:59")));
	    }elseif($start_time) {
	    	$where['add_time'] = array('egt',strtotime("$start_time 00:00:00"));
	    }elseif($end_time){
	    	$where['add_time'] = array('egt', strtotime("$end_time 23:59:59"));
	    }
	    
	    if($adname){
	    	$where['adname'] = array('eq',$adname);
	    }
	    
		$adModel = D('Adlocation'); 
		$where['status'] = array('eq',1);  // 在线状态
		$listRow = 10;
		$count = $adModel->get_count($where);

		$adloctionlist = get_page($adModel, $count,$listRow, $where);	
        
		$position = M('Adposition')->select();	
        
		$this->assign('adloctionlist', $adloctionlist['res']); 
		$this->assign('page',$adloctionlist['show']);	
		$this->assign('position', $position); 			
		$this->display();
	}
	
	//添加修改广告
	public function add() {
		if(IS_POST) {
			$data['adname'] = I('adname','');  //广告位的标题
			$data['remark'] = I('remark','');  // 广告位的备注
			$data['ad_type'] = I('ad_type','');// 广告位的类型 1为轮播  2为图片  3为文字
			$page_id = I('position','');    // 广告位所在的页面
			$position_id = I('adposition',''); // 广告位显示的位置
			$width = I('width','');   // 广告位的宽度
			$height = I('height',''); // 广告位的高度
			$id = I('id',0);   //广告位ｉｄ
			$data['add_time'] = time();
			if( $page_id ){
				$data['page_id'] = $page_id;
				$data['position_id'] = $position_id[$page_id];
				$data['width'] = $width[$page_id];
				$data['height'] = $height[$page_id];
			}
			
			if( !$data['position_id'] ){
				$this->ajaxReturn(array('status'=>-1,'msg'=>'请选择广告位置'));
			}
			
			if(!$data['width'] || !$data['height']) {
				$this->ajaxReturn(array('status'=> -1, 'msg'=> '请输入广告位的尺寸'));
			}
			
			$adlocation = D('Adlocation');
			if(!$id) {
				// 添加广告位
				$res = $adlocation->add_adlocation($data);
				if($res){
					$this->ajaxReturn(array('status'=> 1,'msg'=> '添加广告位成功','back_url'=>U('Adlocation/index')));
				}
				$this->ajaxReturn(array('status'=> -1,'msg'=>'操作失败'));
			}
			//修改广告位
			$where['id'] = array('eq',$id);
			$res = $adlocation->edit_adlocation($where,$data);
			if($res !== false) {
				$this->ajaxReturn(array('status'=> 1,'msg'=> '修改广告位成功','back_url'=>U('Adlocation/index')));
			}
			$this->ajaxReturn(array('status'=> -1,'msg'=>'操作失败'));
			
		}
		$id = I('get.id','');
		//根据id 查询出对应的数据
		$where['id'] = array('eq',$id);
		$ad_data =  M('Adlocation')->where($where)->find();
		//var_dump($ad_data);die;
		$this->assign('val',$ad_data);
		// 获取首页广告位置
		$positionModel = M('Adposition');
		$position1 = $positionModel->where(array('page_id'=>1))->select();
		$position2 = $positionModel->where(array('page_id'=>2))->select();
		$position3 = $positionModel->where(array('page_id'=>3))->select();
		$position4 = $positionModel->where(array('page_id'=>4))->select();
		$this->assign('position1',$position1);
		$this->assign('position2',$position2);
		$this->assign('position3',$position3);
		$this->assign('position4',$position4);
		$this->display();
	}
    
	// 添加修改广告
	public function advert() {
        $location_id=I('id','');  // 页面标识id
        $advertid=I('advertid',''); // 广告id		
        $adlocationModel = D('Adlocation');
        if($advertid) {
        
        	$_advert=$adlocationModel->getInfoById($advertid);
        
        	$this->assign('vol',$_advert);
        }
        
        if(IS_POST) {
        	$advert_title = I('advert_title',''); //广告内容标题
        	$advert_url = I('advert_url',''); //广告内容跳转链接
        	$special = 	I('special','');
        	$specialid = I('special_id','');
        	$offer = 	I('offer','');
        	$offerid = I('offer_id','');			
        	$start_time = I('start_time','');
        	$end_time = I('end_time','');
        	$status = I('status','');
        	$url_type = I('url_type','');			
        	$sort = I('sort','');
        	$locationid = I('locationid',0);
        	$data['advert_title']=$advert_title;
        	$data['advert_url']= $advert_url;
        	
        	/***************广告位关联信息**********/
        	$arr['special']= $special;
        	$arr['specialid']= $specialid;
        	$arr['offer']= $offer;
        	$arr['offerid']= $offerid;			
        	$arr['start_time']=strtotime("$start_time");
        	$arr['end_time']=strtotime("$end_time");
        	$arr['sort']= $sort;
        	$arr['status']=$status;
        	$arr['url_type']=$url_type;
        	$arr['locationid']=$locationid;			
        	$arr['add_time']=time();
        	
        	$advertModel = D('Advert');
        	M()->startTrans();
        	if($advertid) {
        		
        		$res = $advertModel-> edit_advert($data,$advertid);
        		$res2 = $adlocationModel->edit_ad_mapping($arr,$advertid);
        		if($res !== false && $res2 !== false) {
        			M()->commit();
        			$this->ajaxReturn(array('status'=> 1,'msg'=>'广告数据修改成功'));
        		}else{
        			M()->rollback();
        			$error = $advertModel->getError();
        			$msg = $error ? $error : '广告数据修改失败';
        			$this->ajaxReturn(array('status'=>-1,'msg'=>$msg));
        		}
        		
        	}else{
        		$advert_id = $advertModel->add_advert($data);
        		$arr['advertid']=$advert_id;
        		$mappingid = $adlocationModel->add_ad_mapping($arr);
        		if($advert_id && $mappingid) {
        			M()->commit();
        			$this->ajaxReturn(array('status'=> 1,'msg'=>'广告数据添加成功'));
        		}else{
        			M()->rollback();
        			$error = $advertModel->getError();
        			$msg = $error ? $error : '广告数据添加失败';
        			$this->ajaxReturn(array('status'=> -1,'msg' => $msg));
        		}
        		
        	}
        }
        
        
	    $where['a.locationid'] = array('eq', $location_id);
        $where['a.status'] = array('eq',1);
		$advert=$adlocationModel->get_advertlist($where);
		$this->assign('advert',$advert); 		
		$this->assign('location_id',$location_id); 
		$this->display();
	}
	
	// 删除广告
    public function advert_del() {
   		$advertid=I('id',''); 
		$adlocationModel = D('Adlocation');
		$data['status']="-3";  
		
        $result=$adlocationModel->edit_ad_mapping($data,$advertid);	
        $this->ajaxReturn(array('status'=>1,'msg'=>'广告删除成功！')); 		
	}
	
	// 匹配查询专题
    public function get_special() {
		
		$special = I('special',''); //关键词
		$specialModel = D('Special');	

		$where['status'] = array('eq', '1');
		$where['title'] = array('like', "%$special%");	
		$res=$specialModel->getKeySpecial($where);
		foreach($res as $key=>$val){
			$res[$key]['label']=$res[$key]['title'];
		}
 
        echo json_encode($res);		
	}		

	// 匹配查询学子访谈
    public function get_offer() {
		
		$offer = I('offer',''); //关键词
		$articlelModel = D('Article');	

		$where['status'] = array('eq', '4');
		$where['subject'] = array('like', "%$offer%");	
		$where['system_id'] = array('eq', "34");			
		$res=$articlelModel->getKeyOffer($where);
		foreach($res as $key=>$val){
			$res[$key]['label']=$res[$key]['subject'];
		}
 
        echo json_encode($res);		
	}
	
	// 删除广告位
	public function del_adlocation() {
		
		$id = I('id',0); // 广告位id
		if( is_array($id) ) {
			$ids = implode(',',$id);
			$where['id'] = array('in',$ids);
		}else {
			$where['id'] = array('eq',$id);
		}
		$adlocationModel = D('Adlocation');
		$data['status'] = -1; // 删除状态
		$res = $adlocationModel->save_field($where,$data);
		if($res !== false) {
			$this->ajaxReturn(array('status'=> 1,'msg'=> '操作成功！'));
		}
		$this->ajaxReturn(array('status'=> -1,'msg'=> '操作失败！'));
	}
}