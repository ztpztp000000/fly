<?php
/**
 * @version        $Id: myspread.php 1 8:38 2010年7月9日Z tianya $
 * @package        DedeCMS.Member
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once(dirname(__FILE__)."/config.php");
CheckRank(0,0);
$menutype = 'mydede';
$menutype_son = 'sp';
$pagesize = isset($pagesize) && is_numeric($pagesize) ? $pagesize : 5;
$pageno = isset($pageno) && is_numeric($pageno) ? max(1,$pageno) : 1;
if(empty($dopost)) $dopost = '';


//重载列表
if($dopost=='getlist')
{
    AjaxHead();
    GetList($dsql,$pageno,$pagesize);
    exit();
}



//第一次进入这个页面
if($dopost=='')
{
    $row = $dsql->GetOne("SELECT COUNT(*) AS mid FROM `#@__member_spread` WHERE pid='".$cfg_ml->M_ID."'; ");
    $totalRow = $row['mid'];
    include(dirname(__FILE__)."/templets/myspread.htm");
}

/**
 *  获得特定的关键字列表
 *
 * @access    public
 * @param     object  $dsql  数据库操作类
 * @param     int  $pageno  页面数
 * @param     int  $pagesize  页面尺寸
 * @return    string
 */
function GetList(&$dsql, $pageno, $pagesize)
{
    global $cfg_phpurl,$cfg_ml;
    $pagesize = intval($pagesize);
    $pageno = intval($pageno);
    $start = ($pageno-1) * $pagesize;
    $dsql->SetQuery("SELECT sp.mid,mb.uname,mb.money,mb.jointime,mb.userid FROM `#@__member_spread` sp LEFT JOIN `#@__member` mb ON sp.mid=mb.mid WHERE sp.pid='".$cfg_ml->M_ID."' ORDER BY mid DESC LIMIT $start,$pagesize ");
    $dsql->Execute();
    
    if ($dsql->GetTotalRow() == 0) {
      echo "<div style='padding: 1em;text-align: center;'>暂无分享</div>";
      exit();
    }
    
    $line = "<table width='100%' border='0' cellpadding='0' cellspacing='0' class='list'>
          <thead>
            <tr>
              <th colspan='6'><strong class='fLeft' style='padding-left: 5px;'>我的分享：</strong><span class='fRight'>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td width='18%' style='padding-left: 10px;'>用户名</td>
              <td>注册时间</td>
              <td>充值金额</td>
              <td>详情</td>
            </tr>";


    while($row = $dsql->GetArray())
    {
        $line .= "<tr><td width='18%' style='padding-left: 10px;'>".$row['uname']."</td>
            <td>".GetDateMk($row['jointime'])."</td>
            <td>".$row['money']."</td>
            <td><a href='index.php?uid={$row['userid']}&action=infos' target='_blank'>资料</a></td></tr>";
    }

    $line .= "</tbody></table>";
    
    echo $line;
    exit();
}