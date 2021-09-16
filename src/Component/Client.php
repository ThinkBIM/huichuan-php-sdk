<?php


namespace ThinkBIM\UCSDK\Component;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 更新推广创意.
     *
     * @param $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getTemplates()
    {
        return $this->httpPostJson('component/getComponentTemplates');
    }

    /**
     * 更新推广创意.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getIdByCampaignIds(array $params)
    {
        return $this->httpPostJson('component/getComponentIdByCampaignIds', $params);
    }

}
