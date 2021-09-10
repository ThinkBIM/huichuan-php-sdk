<?php


namespace ThinkBIM\UCSDK\lib;


use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use think\facade\Config;

class MyLogger
{
    public static function log($file, $message = '', $content = [], $name = '')
    {
        $conf = require __DIR__.'/../../config/config.php';
        $conf = array_merge($conf, Config::get('huichuan') ?? []);
        $path = trim($name.'/'.date('Ymd').'/'.$file, '/');
        $filePath = rtrim($conf['logPath'], '/');
        // 创建日志服务
        $logger = new Logger($name);
        // 添加一些处理器
        $logger->pushHandler(new StreamHandler($filePath .'/'.$path, Logger::INFO));
        $logger->pushHandler(new FirePHPHandler());

        // 现在你就可以用日志服务了
        $logger->info($message, $content);
    }
}
