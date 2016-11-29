<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-29
 * Time: 9:58
 */

namespace BoWeChat;


class Ticket
{
    public static function getTicket($mppk=false){
        if(MU_MODE){

        }
        $Ticket=self::_checkTicket($mppk);
        if($Ticket!==false){
            return $Ticket;
        }else{
            return self::_getTicket();
        }
    }
    public static function _getTicket($mppk=false){
        $ACCESS_TOKEN=AccessToken::getAccessToken($mppk);
        if(!MU_MODE){
            $mppk="myself";
        }
        $url="https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token={$ACCESS_TOKEN}&type=jsapi";
        $results=Curl::getHttp($url);
        $results=json_decode($results);
        if($results->errcode=='0'){
            $Ticket=array(
                "ticket"=>$results->ticket,
                "expires_in"=>time()+7200
            );
            $Ticket=json_encode($Ticket);
            FileOperate::setPHPFile("TICKET".DIRECTORY_SEPARATOR."{$mppk}.php",$Ticket);
            return $results->ticket;
        }else{
            ErrorPrint::showErr($results->errcode,$results->errmsg);
            return false;
        }
    }
    public static function _checkTicket($mppk=false){
        if(!MU_MODE){
            $mppk="myself";
        }
        $results=FileOperate::getPHPFile("TICKET".DIRECTORY_SEPARATOR."{$mppk}.php");
        if ($results){
            $results=json_decode($results);
            if($results->expires_in-time()<120){
                return false;
            }else
                return $results->ticket;
        }else
            return false;
    }
}