
<?php

/**
 * 检查邮箱地址格式
 * @param $email 邮箱地址
 */
function checkEmail($email) {

	if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		return true;
	}
	return false;
}

/**
 * 生成随机字符串
 *
 * @param 长度 $len        	
 * @param 类型 $mode        	
 * @return string
 */
function randcode($len, $mode = 2) {

	$rcode = '';
	switch ($mode) {
		case 1 : // 去除0、o、O、l等易混淆字符
			$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghijkmnpqrstuvwxyz';
			break;
		case 2 : // 纯数字
			$chars = '0123456789';
			break;
		case 3 : // 全数字+大小写字母
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
			break;
		case 4 : // 全数字+大小写字母+一些特殊字符
			$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz~!@#$%^&*()';
			break;
	}
	
	$count = strlen($chars) - 1;
	mt_srand(( double ) microtime() * 1000000);
	for($i = 0; $i < $len; $i ++) {
		$rcode .= $chars[mt_rand(0, $count)];
	}
	
	return $rcode;
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

/**
 * 导出excel
 *
 * @param $strTable 表格内容        	
 * @param $filename 文件名        	
 */
function downloadExcel($strTable, $filename) {

	header("Content-type: application/vnd.ms-excel");
	header("Content-Type: application/force-download");
	header("Content-Disposition: attachment; filename=" . $filename . "_" . date('Y-m-d') . ".xls");
	header('Expires:0');
	header('Pragma:public');
	echo '<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . $strTable . '</html>';
}

/**
 * 获取分页及数据
 *
 * @param $table 实例化表模型        	
 * @param $count 总数        	
 * @param $listRow 分页条数        	
 * @param $parameter 分页传递的参数        	
 * @param $p 分页页码参数        	
 * @param $where 条件晒选        	
 * @return array
 */
function get_page($table, $count, $listRow, $where, $parameter, $p) {

	$page = new \Think\Page($count, $listRow, $parameter, $p);
	$page->setConfig('first', '首页');
	$page->setConfig('prev', '上一页');
	$page->setConfig('next', '下一页');
	$page->setConfig('last', '尾页');
	$show = bootstrap_page_style($page->show());
	$res = $table->getAllList($where, $page->firstRow . ',' . $page->listRows);
	if ( $res ) {
		return array (
				'show' => $show,
				'res' => $res 
		);
	}
}

/**
 * 获取分类列表
 */
function getCategoryList($parent_id, $system_id, $level = 0) {

	$ArticleCategory = D('ArticleCategory');
	$_level = "&nbsp;&nbsp;├&nbsp;";
	$category_list = array ();
	$_return = array ();
	
	if ( $parent_id ) {
		$category_list = $ArticleCategory->getChilds($parent_id, $system_id);
		if ( $category_list ) {
			
			for($i = 0; $i < $level; $i ++) {
				$_level .= "&nbsp;&nbsp;├&nbsp;";
			}
			
			foreach ( $category_list as $k => $v ) {
				$v['category_name'] = $_level . $v['category_name'];
				$_return[count($_return)] = $v;
				
				// 查询该栏目下是否还有子栏目
				$_childs_list = getCategoryList($v['category_id'], $system_id, $level + 1);
				
				if ( $_childs_list ) {
					$_return = array_merge($_return, $_childs_list);
				}
			}
		}
	}
	
	return $_return;
}

/**
 * 获取文章最大 article_id
 */
function get_article_id() {

	$Model = M('Article');
	$maxId = $Model->field('max(article_id)')->select();
	return $maxId[0]['max(article_id)'];
}

/**
 * 成功案例匹配
 */
function matching_offer($offer_id, $article_id) {

	if ( empty($offer_id) || empty($article_id) ) {
		return false;
	}
	// offer_id 、 文章id 不能为空
	
	$Offer = D('Offer');
	$offer_info = $Offer->getInfoById($offer_id);
	
	if ( empty($offer_info) ) {
		return false;
	}
	// 文章信息不存在返回 false
	
	$where = " studentrealname = '{$offer_info['studentrealname']}' and education = '{$offer_info['education']}' and year = '{$offer_info['year']}' ";
	$data['article_id'] = 0;
	$data['is_main'] = 0;
	$res = $Offer->edit($where, $data); // 初始化offer信息
	
	$where = " id = '{$offer_id}' ";
	$data['article_id'] = $article_id;
	$data['is_main'] = 1;
	$res = $Offer->edit($where, $data); // offer信息与文章绑定
	
	return $res;
}

/**
 * 时间戳格式化
 *
 * @param int $time        	
 * @return string 完整的时间显示
 * @author huajie <banhuajie@163.com>
 */
function time_format($time = NULL, $format = 'Y-m-d H:i') {

	if ( empty($time) ) {
		return "";
	}
	// $time = $time === NULL ? NOW_TIME : intval($time);
	$time = intval($time);
	return date($format, $time);
}

/**
 * 通用CURL请求
 *
 * @param $url 需要请求的url        	
 * @param null $data
 *        	return mixed 返回值 json格式的数据
 */
function http_curl($url, $data = null) {

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	if ( ! empty($data) ) {
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$info = curl_exec($curl);
	curl_close($curl);
	return $info;
}

/**
 * $string 明文或密文
 * $operation 加密ENCODE或解密DECODE
 * $key 密钥
 * $expiry 密钥有效期
 */
function authcode($string, $operation = 'ENCODE', $key = 'K5HJ89Yd345K', $expiry = 0) {

	$ckey_length = 4;
	$key = md5($key);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), - $ckey_length)) : '';
	
	$cryptkey = $keya . md5($keya . $keyc);
	$key_length = strlen($cryptkey);
	
	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
	$string_length = strlen($string);
	
	$result = '';
	$box = range(0, 255);
	
	$rndkey = array ();
	for($i = 0; $i <= 255; $i ++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}
	
	for($j = $i = 0; $i < 256; $i ++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}
	
	for($a = $j = $i = 0; $i < $string_length; $i ++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}
	
	if ( $operation == 'DECODE' ) {
		if ( (substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16) ) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc . str_replace('=', '', base64_encode($result));
	}
}

/**
 * http://192.168.30.225/dokuwiki/doku.php?id=start&do=index api文档
 * 获取用户信息
 *
 * @param $username [用户名]        	
 * @return 用户信息
 */
function get_user_info($username) {

	$url = C('RTX_URL') . 'get_user_info';
	$data = array (
			'username' => $username,
			'APPID' => C('APPID'), // 接口校验
			'APPSECRET' => C('APPSECRET'),
			'AUTH_KEY' => C('AUTH_KEY')  // 密钥
		);
	
	$info = http_curl($url, $data);
	return json_decode($info, true);
}
