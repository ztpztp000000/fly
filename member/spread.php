<?php
/**
 * @version        $Id: myspread.php 1 8:38 2010年7月9日Z tianya $
 * @package        DedeCMS.Member
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once(dirname(__FILE__)."/config.php");
if (isset($_GET['tid'])) {
    if (isset($_COOKIE['pid'])) {
        if ($_COOKIE['pid'] != $_GET['tid']) {
            setCookie("pid", $_GET['tid'], time() + 3600);
        }
    } else {
        setCookie("pid", $_GET['tid'], time() + 3600);
    }
}
include(dirname(__FILE__)."/templets/spread.htm");

//CheckRank(0,0);
//$menutype = 'mydede';
//$menutype_son = 'sp';
//$pagesize = isset($pagesize) && is_numeric($pagesize) ? $pagesize : 5;
//$pageno = isset($pageno) && is_numeric($pageno) ? max(1,$pageno) : 1;
//if(empty($dopost)) $dopost = '';


//重载列表
//if($dopost=='getlist')
//{
   // AjaxHead();
   // GetList($dsql,$pageno,$pagesize);
   // exit();
//}



//第一次进入这个页面
//if($dopost=='')
//{
  //  $row = $dsql->GetOne("SELECT COUNT(*) AS mid FROM `#@__member_spread` WHERE pid='".$cfg_ml->M_ID."'; ");
  //  $totalRow = $row['mid'];
    //include(dirname(__FILE__)."/templets/spread.htm");
//}
