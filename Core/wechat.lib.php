<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 17:32
 */

namespace BoWeChat;

class Wechat
{
    private $request;
    private $mppk;
    public function __construct($token,$mppk=false)
    {
        ErrorPrint::console("wechat构造函数开始");
        //判断是否通过消息真假性验证
        if($this->isValid() && $this->validateSignture($token)){
            return $_GET['echostr'];
        }
        //接受微信服务器发送的 XML数据
        $xml=(array)simplexml_load_string($GLOBALS['HTTP_RAW_POST_DATA'],'SimpleXMLElement',LIBXML_NOCDATA);
        //将数组键名转换为小写
        //$this->request=array_change_key_case($xml,CASE_LOWER);
        $this->request=$xml;
        $this->mppk=$mppk;
        ErrorPrint::console("wechat构造函数结束");
        
    }

    public function run(){
        ErrorPrint::console("进入run");
        return WechatRequest::switchRequest($this->request,$this->mppk);
    }
    
    private function isValid(){
        return isset($_GET['echostr']);
    }
    
    private function validateSignture($token){
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $signatureArray = array($token, $timestamp, $nonce);
        sort($signatureArray, SORT_STRING);
        return sha1(implode($signatureArray)) == $signature;
    }

    public function checkSignature(){
        //获取真假性验证参数
        $signature=$_GET['signature'];
        $timestamp=$_GET['timestamp'];
        $nonce=$_GET['nonce'];
        $echostr=$_GET['echostr'];
        
        $token=TOKEN;
        //签名
        $tmpArr=array($token,$timestamp,$nonce);
        sort($tmpArr,SORT_STRING);
        $tmpArr=implode($tmpArr);
        $tmpArr=sha1($tmpArr);
        
        if ($tmpArr==$signature){
            echo $echostr;
           return true;
        }else
            return false;
    }
}