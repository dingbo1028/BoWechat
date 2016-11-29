<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 15:18
 */

namespace BoWeChat;
header('content-type:text/html;charset=utf-8');
session_start();
include_once __DIR__."/autoloader.php";
include_once __DIR__."/config.php";
AutoLoader::register();
//FileOperate::setPHPFile("ACCESS".DIRECTORY_SEPARATOR."hcuhuucf.php","huuchcujfhcufi");
//echo FileOperate::getPHPFile('hcuhuucf.php');
//ErrorPrint::showErr("40001","invalid appid");
/*$_SESSION['mppk']="12345";
$ac = AccessToken::getAccessToken();
ErrorPrint::showErr('ok',$ac);*/

//ErrorPrint::console("哈哈哈");
echo "hah";
ErrorPrint::showErr("ok",Ticket::getTicket());



