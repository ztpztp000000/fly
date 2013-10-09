<?php
// 游戏充值
require_once(dirname(__FILE__).'/config.php');
require_once(DEDEINC."/api.php");

CheckRank(0,0);
$menutype = 'mydede';
$menutype_son = 'op';
$pagesize = isset($pagesize) && is_numeric($pagesize) ? $pagesize : 5;
$pageno = isset($pageno) && is_numeric($pageno) ? max(1,$pageno) : 1;

$mainSiteApi = new MainSiteApi($cfg_api_url, $cfg_site_id, $cfg_site_key);

// 若无game id，则显示game list
if (empty($game_id)) {
	$rs = $mainSiteApi->get_game_list();
	$gameList = $rs['ret'] == 1 ? $rs['game'] : array();
	//获取用户信息，，，
	$userid = $cfg_ml->fields['userid'];
	$usermny = $cfg_ml->fields['money'];
	$userscores = $cfg_ml->fields['scores'];
	
	//用户平台币读取
	$rs = $mainSiteApi->get_user_vc($user);
	print_r($rs);
	$usermoney = $rs['ret'] == 1 ? $rs['user_vc'] : 0;
	
	include(DEDEMEMBER."/templets/game_list.htm");
	exit();
}
//获取充值模式，，，
if (empty($pay_mode)) {
	$rs = $mainSiteApi->get_paymode();
	$payModeList = $rs['ret'] == 1 ? $rs['paymode'] : array();
	
	include(DEDEMEMBER."/templets/pay_mode_list.htm");
	exit();
}

if (isset($isdopay)) {
	if (empty($select_money) && empty($input_money)) {
		showMsg('充值金额不能为 0 元', -1);
		exit();
	}

	if (isset($input_money) && floatval($input_money) < 0) {
		showMsg('充值金额不能小于 0 元', -1);
		exit();
	}

	if (isset($input_money)) {
		$money = floatval($input_money);

		if (is_nan($money)) {
			showMsg('请输入正确的数字！', -1);
			exit();
		}
	} else {
		$money = floatval($select_money);
	}

	$ip = $cfg_ml->fields['loginip'];
	$order_no = str_replace("-", "", date("Y-m-dH-i-s")).rand(1000,2000);
	$pay_user = $cfg_ml->fields['userid'];
	$time = time();

	$inQuery = "INSERT INTO `#@__pay` (`pay_order_no`, `pay_mode_id`, `pay_user`, `pay_tel`, `pay_game_id`, `pay_server_id`, 
		`pay_game_user`, `pay_money`, `pay_time`, `pay_ip`, `web_src`) values ('$order_no', '$pay_mode', '$pay_user', 
		'$mobile', '$game_id', '$server_id', '$userid', '$money', '$time', '$ip', '$cfg_site_id');";

	if (!$dsql->ExecuteNoneQuery($inQuery)) {
		showMsg('记录充值失败，请重试！', -1);
		exit();
	}

	$rs = $mainSiteApi->req_pay($pay_user, $userid, $server_id, $money, $ip, $pay_mode, $order_no);

	echo json_encode($rs);
	exit();
}

// 获取游戏服务器列表
$rs = $mainSiteApi->get_server_list($game_id);
$serverList = $rs['ret'] == 1 ? $rs['server'] : array();

// 获取人民币充值比例
$rs = $mainSiteApi->game_per($game_id);

$money_per = 0;
$money_name = '';

if ($rs['ret']['code'] == 1) {
	$money_per = $rs['money_per'];
	$money_name = $rs['money_name'];
}

// 获取用户帐户信息
$userid = $cfg_ml->fields['userid'];
// 数据库 暂无 $mobile 字段
$mobile = '';
//用户已经领取的新手卡
//$rs = $mainSiteApi->game_per($game_id);

include(DEDEMEMBER."/templets/pay_edit.htm");
exit();


