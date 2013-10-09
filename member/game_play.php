<?php
//  玩游戏，，game_play.php，
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

	include(DEDEMEMBER."/templets/game_play_list.htm");
	exit();
}
// 获取游戏服务器列表
if ($game_id) {
	$rs = $mainSiteApi->get_server_list($game_id);
	$serverList = $rs['ret'] == 1 ? $rs['server'] : array();
	include(DEDEMEMBER."/templets/game_server_list.htm");
	exit();
}

if ($game_id&&$server_id){




	
}
	$ip = $cfg_ml->fields['loginip'];
	$order_no = str_replace("-", "", date("Y-m-dH-i-s")).rand(1000,2000);
	$pay_user = $cfg_ml->fields['userid'];
	$time = time();

	





