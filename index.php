<?php
/**
 * @version        $Id: index.php 1 9:23 2010-11-11 tianya $
 * @package        DedeCMS.Site
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
if(!file_exists(dirname(__FILE__).'/data/common.inc.php'))
{
    header('Location:install/index.php');
    exit();
}

if (isset($_GET['tid'])) {
    if (isset($_COOKIE['pid'])) {
        if ($_COOKIE['pid'] != $_GET['tid']) {
            setCookie("pid", $_GET['tid'], time() + 3600);
        }
    } else {
        setCookie("pid", $_GET['tid'], time() + 3600);
    }
}

//自动生成HTML版
if(isset($_GET['upcache']) || !file_exists('index.html'))
{
    require_once (dirname(__FILE__) . "/include/common.inc.php");
    require_once DEDEINC."/arc.partview.class.php";
    require_once(DEDEINC."/api.php");

    $mainSiteApi = new MainSiteApi($cfg_api_url, $cfg_site_id, $cfg_site_key);
    $rs = $mainSiteApi->get_new_server();
    $serverList = $rs['ret'] == 1 ? $rs['server'] : array();
    
    $GLOBALS['_arclistEnv'] = 'index';
    $row = $dsql->GetOne("Select * From `#@__homepageset`");
    $row['templet'] = MfTemplet($row['templet']);
    $pv = new PartView();
    $pv->SetTemplet($cfg_basedir . $cfg_templets_dir . "/" . $row['templet']);
    $row['showmod'] = isset($row['showmod'])? $row['showmod'] : 0;
    if ($row['showmod'] == 1)
    {
        $pv->SaveToHtml(dirname(__FILE__).'/index.html');
        include(dirname(__FILE__).'/index.html');
        exit();
    } else { 
        $pv->Display();
        exit();
    }
}
else
{
    header('HTTP/1.1 301 Moved Permanently');
    header('Location:index.html');
}
?>