<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-11-28
 * Time: 13:31
 */
namespace BoWeChat;

/* Debug模式：输出详细的日志文件
 *默认开启
 * DEBUG_FILE日志文件名称
 * DEBUG_PATH日志文件路径
 */
define("DEBUG",true);
define("DEBUG_PATH", __DIR__ . DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR."log".DIRECTORY_SEPARATOR);
define("DEBUG_FILE","wechat.log");

/*
 * 多公众号模式：用于多个公众号，通过数据库储存多个不同微信号的信息，数据库可通过data/sql/database.sql创建
 * MU_MODE默认关闭
 *
 * */
define("MU_MODE",false);

/*
 * TOKEN设置
 * */
define("TOKEN","bowechat");


/*
 * APPID和APPSECRET设置
 * 在开发_基本配置里可以找到
 * APP_ID
 * APP_SECRET
 *
 * */
define("APP_ID","");        //在这里填写appid
define("APP_SECRET","");    //在这里填写appsecret
/*
 * 数据库设置
 * DB_HOST     数据库地址
 * DB_PORT     端口
 * DB_NAME     数据库名称
 * CHARSET     字符集
 * DB_USER     登录名
 * DB_PASS     登录密码
 * */
define('DB_HOST','localhost');
define('DB_PORT','3306');
define('DB_NAME','wxapi');
define('CHARSET','utf8');
define('DB_USER','root');
define('DB_PASS','bnuz');


