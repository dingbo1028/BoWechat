<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 18:08
 */

namespace BoWeChat;


class FileOperate
{
    public static function setPHPFile($file,$content){
        $fp = @fopen(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.$file, "w");
        if($fp){
            fwrite($fp, "<?php exit();?>" . $content);
            fclose($fp);
            return true;
        }else{
            return false;
        }

    }
    public static function getPHPFile($file){
        return trim(substr(@file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.$file), 15));
    }

    public static function setLogFile($log,$file=false){
        if (!$file){
            $file=__DIR__.DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."log".DIRECTORY_SEPARATOR."simple.log";
        }
        $log=date('Y-m-d H:i:s',time())."\t".$log."\n";
        $fp=fopen($file,"a+");
        if ($fp){
            fwrite($fp,$log);
            fclose($fp);
            return true;
        }else
            return false;
    }
}