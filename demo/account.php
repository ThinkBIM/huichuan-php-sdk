<?php

use ThinkBIM\UCSDK\HCClient;

require "../vendor/autoload.php";


// $config = [
//     '九星互动2021', 'jxhd1234', 'f4efec71-0d09-4460-8872-903597cb58e9'
// ];
$client = new HCClient([
    'username' => '九星互动2021',
    'password' => 'jxhd1234',
    'token' => 'f4efec71-0d09-4460-8872-903597cb58e9',
]);

// $account = new HCClient('账户名称', '密码', 'token');
$res = $client->account->getAccount();


// $ress = $client->creative->getCreativeByCreativeId([12345678]);

print_r($res);
// print_r($ress);
