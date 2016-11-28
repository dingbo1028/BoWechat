<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 17:25
 */
namespace BoWeChat;
session_start();
/*引入配置文件和自动载入函数*/
include_once __DIR__."/config.php";
include_once __DIR__."/autoloader.php";
//自动载入
AutoLoader::register();

//多号模式从数据库取出appid和appsecret
if (MU_MODE){
    $mppk=$_REQUEST['mppk'];
}
ErrorPrint::console("进入系统");
$wechat=new Wechat(TOKEN);
if(isset($_GET['echostr'])){
    ErrorPrint::console("真实性检测");
    $wechat->checkSignature();
}else{
    ErrorPrint::console("进入run函数！");
    $re = $wechat->run();
    ErrorPrint::console($re);
    echo $re;
}

