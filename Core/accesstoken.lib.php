<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 17:58
 */

namespace BoWeChat;
class AccessToken
{
    public static function getAccessToken($mppk=false){
        if (MU_MODE){

        }
        $ACCESS_TOKEN=self::_checkAccessToken($mppk);
        if($ACCESS_TOKEN!==false)
            return $ACCESS_TOKEN;
        else
            return self::_getAccessToken($mppk);
    }

    private static function _checkAccessToken($mppk=false){
        if (!MU_MODE){
            $mppk="myself";
        }
        $results=FileOperate::getPHPFile("ACCESS".DIRECTORY_SEPARATOR."{$mppk}.php");
        if ($results){
            $results=json_decode($results);
            if ($results->expires_in-time()<120)
                return false;
            else
                return $results->access_token;
        }else
            return false;
    }

    private static function _getAccessToken($mppk=false){

        if (MU_MODE){
            //从数据库取
            $appid="";
            $appsecret="";
        }else{
            $appid=APP_ID;
            $appsecret=APP_SECRET;
            $mppk='myself';
        }
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
        $results=Curl::getHttp($url);
        $results=json_decode($results);
        if (!isset($results->access_token))
            ErrorPrint::showErr($results->errcode,$results->errmsg);
        else{
            $results->expires_in=time()+7200;
            $ACCESS_TOKEN=$results->access_token;
            $results=json_encode($results);
            FileOperate::setPHPFile("ACCESS".DIRECTORY_SEPARATOR."{$mppk}.php",$results);
            return $ACCESS_TOKEN;
        }
    }
}