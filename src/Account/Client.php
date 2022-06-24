<?php
namespace ThinkBIM\UCSDK\Account;

use GuzzleHttp\Exception\GuzzleException;
use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取username所对应的账户信息
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getAccount(): array
    {
        return $this->httpPostJson('/account/getAccount');
    }

    /**
     * 获取当前账户管家或者代理商下的子账户列表
     *
     * @throws  GuzzleException
     *
     * @return array
     */
    public function getChildrenAccountByAccountId(): array
    {
        return $this->httpPostJson('account/getChildrenAccountByAccountId');
    }
}
