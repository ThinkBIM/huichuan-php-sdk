<?php

use think\App;
use ThinkBIM\UCSDK\HCClient;

require "../vendor/autoload.php";




$account = new HCClient('九星互动2021', 'jxhd1234', 'f4efec71-0d09-4460-8872-903597cb58e9', '平安寿险-汇川-英才宝贝01');



try{
    $res = $account->material->getCounties();
    var_dump($res);die;
}catch (Exception $e) {
    print_r($e->getMessage());die;

}

