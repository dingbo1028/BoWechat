<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 17:49
 */

namespace BoWeChat;


class WechatRequest
{
    public static function switchRequest($request,$mppk=false){
        ErrorPrint::console("开始分析消息类型");
        $data=array();
        switch ($request['MsgType']){
            //事件消息
            case 'event':

                switch ($request['Event']){
                    //关注事件&扫描带参数二维码事件- 用户未关注时
                    case "subscribe":
                        //判断是不是扫码关注的
                        if (isset($request['EventKey'])&&isset($request['Ticket'])){
                            //是扫码关注的
                            $data=self::scanSubscribe($request,$mppk);
                        }else{
                            //不是扫码关注的
                            $data=self::subscribe($request,$mppk);
                        }
                        break;
                    //取消关注事件
                    case "unsubscribe":
                        $data=self::unsubscribe($request,$mppk);
                        break;
                    //扫描带参数二维码事件-用户已关注时的事件推送
                    case "SCAN":
                        $data=self::SCAN($request,$mppk);
                        break;
                    //上报地理位置事件
                    case "LOCATION":
                        $data=self::EVENT_LOCATION($request,$mppk);
                        break;
                    //自定义菜单事件-点击菜单拉取消息时的事件推送
                    case "CLICK":
                        $data=self::CLICK($request,$mppk);
                        break;
                    //自定义菜单事件-点击菜单跳转链接时的事件推送
                    case "VIEW":
                        $data=self::VIEW($request,$mppk);
                        break;
                }
                break;
            //文本消息
            case 'text':
                ErrorPrint::console("文本信息哦");
                $data=self::text($request,$mppk);
                break;
            //图片消息
            case 'image':
                $data=self::image($request,$mppk);
                break;
            //语音消息
            case 'voice':
                $data=self::voice($request,$mppk);
                break;
            //视频消息
            case 'video':
                $data=self::video($request,$mppk);
                break;
            //小视频消息
            case "shortvideo":
                $data=self::shortvideo($request,$mppk);
                break;
            //地理位置消息
            case "location":
                $data=self::location($request,$mppk);
                break;
            //连接消息
            case "link":
                $data=self::link($request,$mppk);
                break;
            //未识别消息
            default:
                $data=ResponsePassive::sendText($request['FromUserName'],$request['ToUserName'],"这个消息类型我没见过哦");
                break;
        }
        return $data;
    }

    public static function text($request,$mppk=false){
        ErrorPrint::console("开始处理文字信息");
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        ErrorPrint::console($fromusername."发给".$tousername);
        $content="我收到了文本信息";
        ErrorPrint::console("准备回消息啦！");
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }

    public static function image($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="我收到了图片信息";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function voice($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="我听你在说话";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function video($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="这视频真好看";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function shortvideo($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你在干啥呢";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function location($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你在这地方？";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function link($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你想让我看看这个连接？";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function scanSubscribe($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="谢谢你关注我，我的二维码好看么";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function subscribe($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你来看我了？";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function unsubscribe($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你不理我了，虽然你也收不到这条信息";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function SCAN($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你扫到了啥？";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function EVENT_LOCATION($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你想要位置？";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function CLICK($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你点我的菜单啦哈哈";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }
    public static function VIEW($request,$mppk=false){
        $tousername=$request['ToUserName'];
        $fromusername=$request['FromUserName'];
        $content="你要去这个地方";
        return ResponsePassive::sendText($fromusername,$tousername,$content);
    }


}