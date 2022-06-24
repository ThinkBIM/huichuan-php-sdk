<?php


namespace ThinkBIM\UCSDK\Kr;


use GuzzleHttp\Exception\GuzzleException;
use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 根据推广计划推荐关键词.
     * @param array $params
     * @throws GuzzleException
     * @return array
     */
    public function getByCampaignId(array $params): array
    {
        return $this->httpPostJson('kr/getKRByCampaignId', $params);
    }

    /**
     * 根据种子词推荐关键词.
     *
     * @param array $params
     *
     * @return array
     *
     * @throws GuzzleException
     */
    public function getByQuery(array $params): array
    {
        return $this->httpPostJson('kr/getKRByQuery', $params);
    }
}
