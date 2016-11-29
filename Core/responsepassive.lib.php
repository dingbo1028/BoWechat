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
    /**
     * 被动回复文本消息
     * @param $fromusername 接收方帐号（收到的openid）
     * @param $tousername   开发者微信号
     * @param $content      文本内容
     * @return mixed
     */
    public static function replyText($fromusername,$tousername,$content){
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

    /**
     * 被动回复语音文本
     * @param $fromusername
     * @param $tousername
     * @param $mediaid  素材上传接口返回的mediaId
     * @return mixed
     */
    public static function replyVoice($fromusername,$tousername,$mediaid){
        $response = <<<xml
                    <xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[voice]]></MsgType>
                        <Voice>
                            <MediaId><![CDATA[%s]]></MediaId>
                        </Voice>
                        
                    </xml>
xml;
        return sprintf($response, $fromusername, $tousername, time(), $mediaid);
    }

    /**
     * 被动回复图片
     * @param $fromusername
     * @param $tousername
     * @param $mediaid
     * @return mixed
     */
    public static function replyImage($fromusername,$tousername,$mediaid){
        $response = <<<xml
                    <xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[image]]></MsgType>
                        <Image>
                            <MediaId><![CDATA[%s]]></MediaId>
                        </Image>
                        
                    </xml>
xml;
        return sprintf($response, $fromusername, $tousername, time(), $mediaid);
    }

    /**
     * 被动恢复视频
     * @param $fromusername
     * @param $tousername
     * @param $mediaid
     * @param $title    视频标题
     * @param $description  视频描述
     * @return mixed
     */
    public static function replyVideo($fromusername,$tousername,$mediaid,$title,$description){
        $response = <<<xml
                    <xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[Video]]></MsgType>
                        <Video>
                            <MediaId><![CDATA[%s]]></MediaId>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                        </Video>
                        
                    </xml>
xml;
        return sprintf($response, $fromusername, $tousername, time(), $mediaid,$title,$description);
    }

    /**
     * 回复音乐信息
     * @param $fromusername
     * @param $tousername
     * @param $title    音乐标题
     * @param $Description  音乐描述
     * @param $musicurl 音乐地址
     * @param bool $HQMusicUrl  高品质音乐地址（Wifi下播放此地址的）,可以不填（填false）则直接用默认地址
     * @param $ThumbMediaId 缩略图的mediaid
     * @return mixed
     */
    public static function replyMusic($fromusername,$tousername,$title,$Description,$musicurl,$HQMusicUrl=false,$ThumbMediaId){
        $response = <<<xml
                    <xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[music]]></MsgType>
                        <Music>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <MusicUrl><![CDATA[%s]]></MusicUrl>
                            <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                            <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
                        </Music>
                        
                    </xml>
xml;
        return sprintf($response, $fromusername, $tousername, time(), $title,$Description,$musicurl,$HQMusicUrl?$HQMusicUrl:$musicurl,$ThumbMediaId);
    }

    /*public static function replyNews($fromusername,$tousername,$Articles){
        $response = <<<xml
                    <xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[voice]]></MsgType>
                        <Voice>
                            <MediaId><![CDATA[%s]]></MediaId>
                        </Voice>
                        
                    </xml>
xml;
        return sprintf($response, $fromusername, $tousername, time(), $mediaid);
    }*/

}