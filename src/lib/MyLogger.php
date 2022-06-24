<?php


namespace ThinkBIM\UCSDK\lib;


use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use think\facade\Config;

class MyLogger
{
    /**
     * @param $file
     * @param string $message
     * @param array $content
     * @param string $name
     * @return void
     */
    public static function log($file, string $message = '', array $content = [], string $name = '')
    {
        $conf = require __DIR__.'/../../config/config.php';
        try{
            $conf = array_merge($conf, Config::get('huichuan', []));
        }catch (\Exception $e) {

        }
        $path = trim($name.'/'.date('Ymd').'/'.$file, '/');
        $filePath = rtrim($conf['logPath'], '/');
        // 创建日志服务
        $logger = new Logger($name);
        // 添加一些处理器
        $logger->pushHandler(new StreamHandler($filePath .'/'.$path, Logger::INFO));
        $logger->pushHandler(new FirePHPHandler());
        $logger->info($message, $content);
    }
}
