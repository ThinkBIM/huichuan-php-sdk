<?php
namespace ThinkBIM\UCSDK\Group;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取username下所有的推广组\
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array
     */
    public function getAllAdGroup()
    {
        return $this->httpPostJson('adgroup/getAllAdGroup');
    }
}
