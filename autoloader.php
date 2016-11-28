<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-27
 * Time: 15:09
 */

namespace BoWeChat;


class AutoLoader
{
    const NAMESPACE_PREFIX="BoWeChat\\";
    public static function register(){
        spl_autoload_register(array(new self, 'autoload'));
    }

    /**
     * 根据类名载入所在文件
     */
    public static function autoload($className)
    {
        $namespacePrefixStrlen = strlen(self::NAMESPACE_PREFIX);
        if (strncmp(self::NAMESPACE_PREFIX, $className, $namespacePrefixStrlen) === 0) {
            $className = strtolower($className);
           /* $filePath = "Core" . DIRECTORY_SEPARATOR . $className . '.lib.php';
            $filePath = realpath(__DIR__ . (empty($filePath) ? '' : DIRECTORY_SEPARATOR) . $filePath);*/
            $filePath = str_replace('\\', DIRECTORY_SEPARATOR, substr($className, $namespacePrefixStrlen));
            $filePath=__DIR__ . (empty($filePath) ? '' : DIRECTORY_SEPARATOR) .'Core'.DIRECTORY_SEPARATOR. $filePath . '.lib.php';
            $filePath = realpath($filePath);
            if (file_exists($filePath)) {
                require_once $filePath;
            } else {
                echo $filePath;
            }
        }
    }
}