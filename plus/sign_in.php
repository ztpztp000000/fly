<?php
/**
 *
 * 每日签到
 *
 * @version        $Id: sign_in.php 1 15:59 2013年10月1日 Kane $
 * @package        QiFei.Site
 * @copyright      Copyright (c) 2013, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once(dirname(__FILE__)."/../include/common.inc.php");
require_once(DEDEINC.'/memberlogin.class.php');

$cfg_ml = new MemberLogin();

$rs = $dsql->Getone("SELECT * from `#@__member_signin` WHERE mid='".$cfg_ml->M_ID."' ORDER BY signintime DESC");

$today = GetDateMk(time());
$lastSigintime = GetDateMk($rs['signintime']);

if ($today == $lastSigintime) {
    echo '亲，您今天已经签过到了！';
    exit();
}

$addMoney = 1;
$dsql->ExecuteNoneQuery("UPDATE `#@__member` SET money = money + $addMoney WHERE mid='".$cfg_ml->M_ID."'");
$dsql->ExecuteNoneQuery("INSERT INTO `#@__member_signin` (`mid`, `signintime`) VALUES (".$cfg_ml->M_ID.", ".time().")");
include_once(DEDETEMPLATE.'/plus/sign_in.htm');
exit();
