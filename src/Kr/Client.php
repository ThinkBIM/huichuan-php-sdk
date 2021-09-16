<?php


namespace ThinkBIM\UCSDK\Kr;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 根据推广计划推荐关键词.
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array
     */
    public function getByCampaignId($params)
    {
        return $this->httpPostJson('kr/getKRByCampaignId', $params);
    }

    /**
     * 根据种子词推荐关键词.
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array
     */
    public function getByQuery($params)
    {
        return $this->httpPostJson('kr/getKRByQuery', $params);
    }
}
