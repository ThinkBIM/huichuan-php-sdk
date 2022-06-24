<?php

use GuzzleHttp\Exception\GuzzleException as GuzzleExceptionAlias;
use ThinkBIM\UCSDK\HCClient;

require "../vendor/autoload.php";

$client = new HCClient([
    'username' => '账户名称',
    'password' => '账户密码',
    'token' => '申请汇川API时得到的token值',
    // 'target' => 'target字段表示被该账户管家或者代理商管辖和操作的账户名'
]);

//获取当前账户管家或者代理商下的子账户列表
try {
    $client->account->getChildrenAccountByAccountId();
} catch (GuzzleExceptionAlias $e) {

}

