<?php


namespace ThinkBIM\UCSDK\lib;


use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MyLogger
{
    public static function log($file, $message = '', $content = [], $name = '')
    {
        $conf = require __DIR__.'/../../config/config.php';
        $path = $name.'/'.date('Ymd');
        // 创建日志服务
        $logger = new Logger($name);
        // 添加一些处理器
        $logger->pushHandler(new StreamHandler($conf['log']['path'].'/'.$path.'/'.$file, Logger::INFO));
        $logger->pushHandler(new FirePHPHandler());

        // 现在你就可以用日志服务了
        $logger->info($message, $content);
    }
}
