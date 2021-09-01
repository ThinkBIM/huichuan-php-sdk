<?php


namespace ThinkBIM\UCSDK\Account;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    public function get()
    {
        return $this->httpPostJson('account/getAccount');
    }
}
