
#BoWechat`V1.5`
####PHP微信公众号开发SDK

## 新版本特性
* 修复了`config.php`中命名空间的BUG
* 开发了新功能——`功能`中加*号的
* 为部分已完成的类加上了注释

##功能：
* 真实性检查
* 接受消息
* 分发消息
* *被动回复文本、图片、语音、视频、音乐消息
* *自定义菜单的上传、删除和查看
* 获取ACCESS_TOKEN
* *获取JSAPI_TICKET
* *CURL类


##文件结构
* Core
    * data
        * ACCESS
        * log
        * pem
    * accesstoken.lib.php
    * curl.lib.php
    * errorprint.lib.php
    * fileoperate.lib.php
    * menu.lib.php
    * mysql.lib.php
    * responsepassive.lib.php
    * ticket.lib.php
    * wechat.lib.php
    * wechatrequest.lib.php
* autoloader.php
* config.php
* test.php
* wechat.php
* README.md
* LICENSE



##如何使用
* 1、获取你的appid和appsecret，填写在`config.php`中的相应位置
* 2、上传代码包到你的虚拟空间或者云服务器中
* 3、微信开启开发者选项，填写网址`http://你的网址/BoWechat/wechat.php`，TOKEN填写`bowechat`
* 4、发送各种消息可收到对应的回复
* 5、写了简单的主动日志类，日志放在/Core/data/log中，很简单，还没有完善，可以通过`ErrPrint::console($log)`调用

##想说的话
* 会继续更新下去的，直到实现一个完整的拿来可用的SDK
* 完成之后他会有以下功能：
    * 全部的公众号接口调用
    * 支持单微信号和多微信号（多号用mysql数据库存储）
    * 完整的日志模块和调试模式
* 使用过程中如果有问题，可在github上提交问题，或是发邮件给我


##关于作者
```PHP
$DingBo=array(
    "Name"=>"丁波",
    "Email" =>"666@db666.top",
    "School"=>"BNUZ",
    "WeChat"=>"dingbo7173",
    "GitHub"=>"https://github.com/dingbo1028/"
);
```
