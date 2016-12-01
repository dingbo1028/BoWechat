<?php
/**
 * Created by PhpStorm.
 * User: Dingbo
 * Date: 2016-12-01
 * Time: 11:30
 */

namespace BoWeChat;


class SourceManager
{
    /**
     * 上传临时素材
     * @param $type 素材类型(image,voice,vedio,thumb)
     * @param $file 文件路径
     * @param bool $mppk    多号模式下的身份标识
     * @return bool|mixed
     */
    public static function updateProvisionalSource($type,$file,$mppk=false){
        if (MU_MODE){

        }
        $ACCESS_TOKEN=AccessToken::getAccessToken($mppk);
        $file=Curl::addFile($file);
        $data=array("media"=>$file);
        $url="https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$ACCESS_TOKEN}&type={$type}";
        $re=Curl::postHttp($url,$data);
        $re=json_decode($re);
        if (isset($re->errcode)){
            ErrorPrint::showErr($re->errcode,$re->errmsg);
            return false;
        }
        return $re;
    }
}