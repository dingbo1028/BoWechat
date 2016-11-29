<?php
/**
 * Created by PhpStorm.
 * User: Dingbo
 * Date: 2016-11-29
 * Time: 10:57
 */

namespace BoWeChat;

/**
 * Class Menu   自定义菜单类
 * @package BoWeChat
 */
class Menu
{
    public static function formateData($data=array()){
        if (empty($data)){
            return false;
        }else{

        }
    }

    /**
     * 检查数据格式正确性
     * @param array $data 待检查的数组数据
     * @return bool
     */
    public static function checkData($data=array()){
        if (empty($data)){
            return false;
        }
        //1、一级菜单数量
        $pSize=count($data['button']);
        if ($pSize>3){
            ErrorPrint::showErr("error","超过三个一级菜单");
            return false;
        }
        //2、二级菜单数量
        //3、字数是否超过
        foreach ($data['button'] as $item) {
            if (count($item)==2){
                //如果是2，就有二级菜单
                //二级菜单数量
                //echo count($item['sub_button'])."haha";
                if (count($item['sub_button'])>5){
                    ErrorPrint::showErr("error","二级菜单太多了");
                    return false;
                }elseif (mb_strlen($item['name'],'utf-8')>7){
                    ErrorPrint::showErr("error","二级菜单超过7字限制");
                    return false;
                }
            }elseif(count($item)>=3){
                //没有二级菜单
                if (mb_strlen($item['name'],"utf-8")>4){
                    ErrorPrint::showErr("error","一级菜单字超过四个字的限制");
                    return false;
                }

            }
            //if (count($item))
        }
        return true;


    }

    /**
     * 向服务器发送自定义菜单数据
     * @param $data 要发送的数据，json格式
     * @param bool $mppk    多号模式下的公众号身份标识，单号不用，默认false
     * @return bool
     */
    public static function sentToServer($data,$mppk=false){
        if(MU_MODE){

        }
        $ACCESS_TOKEN=AccessToken::getAccessToken($mppk);
        $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$ACCESS_TOKEN}";
        $rs=Curl::postJsonHttp($url,$data);
        $rs=json_decode($rs);
        if($rs->errcode=="0"){
            return true;
        }else
           ErrorPrint::showErr($rs->errcode,$rs->errmsg);
    }

    /**
     * 获取自定义菜单
     * @param bool $mppk 多号模式下公众号身份标识，默认不用填
     * @return mixed
     */
    public static function getMenu($mppk=false){
        if (MU_MODE){

        }
        $ACCESS_TOKEN=AccessToken::getAccessToken($mppk);
        $url="https://api.weixin.qq.com/cgi-bin/menu/get?access_token={$ACCESS_TOKEN}";
        return Curl::getHttp($url);
    }

    /**
     * 删除现有的自定义菜单
     * @param bool $mppk 多号模式下的身份标识
     * @return bool
     */
    public static function deleteMenu($mppk=false){
        if(MU_MODE){

        }
        $ACCESS_TOKEN=AccessToken::getAccessToken($mppk);
        $url="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token={$ACCESS_TOKEN}";
        $re=Curl::getHttp($url);
        $re=json_decode($re);
        if ($re->reecode=="0")
            return true;
        ErrorPrint::showErr($re->errcode,$re->errmsg);
        return false;
    }
}