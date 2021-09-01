<?php

use think\facade\Config;
use ThinkBIM\UCSDK\HCClient;

require "../vendor/autoload.php";

echo 1111;

// $account = new HCClient('平安寿险-汇川-英才宝贝01');

try{
    print_r(Config::get('test.'));die;
    // $res = $account->creative->getCreativeByCreativeId([57579029]);

}catch (Exception $e) {
    print_r($e);
}
// print_r($res);die;
