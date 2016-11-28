<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 18:17
 */

namespace BoWeChat;


class ErrorPrint
{
    public static function showErr($code,$msg,$style="be"){
        if($style=="be"){
            echo "
            <div style='height: auto;width: auto;padding: 50px;background-color: #dd4f52'>
                <h1 style='color: #ffffff'>发生了一个错误:)</h1>
                <p style='color: #ffffff'>{$code}</p>
                <p style='color: #ffffff'>{$msg}</p>
</div>
            
            ";
        }else{
            echo "错误：".$code.":".$msg;
        }
    }
    public static function console($log){
        if (!FileOperate::setLogFile($log))
            self::showErr("","写入日志失败");
    }
}