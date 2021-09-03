<?php

use ThinkBIM\UCSDK\HCClient;

require "../vendor/autoload.php";

$account = new HCClient('账户名称', '密码', 'token', 'target');
$client->account->getAccount();

