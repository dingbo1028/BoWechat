<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-28
 * Time: 17:02
 */

namespace BoWeChat;


class ResponsePassive
{
    public static function sendText($fromusername,$tousername,$content){
        ErrorPrint::console("构造xml");
        $response = <<<xml
                    <xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[text]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                    </xml>
xml;
        ErrorPrint::console("准备返回xml啦");
        return sprintf($response, $fromusername, $tousername, time(), $content);
    }

}