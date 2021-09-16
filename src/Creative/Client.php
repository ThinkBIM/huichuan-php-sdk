<?php


namespace ThinkBIM\UCSDK\Creative;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{

    /**
     * 创建推广创意.
     *
     * @param array $adGroupId
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getTemplates(array $adGroupId)
    {
        $params = [
            'adgroupId' => $adGroupId,
        ];

        return $this->httpPostJson('creative/getCreativeTemplate', $params);
    }

    /**
     * 创建推广创意.
     *
     * @param array $creativeType
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function add(array $creativeType)
    {
        $params = [
            'creativeTypes' => $creativeType
        ];
        return $this->httpPostJson('creative/add', $params);
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
    public function update(array $params)
    {
        return $this->httpPostJson('creative/update', $params);
    }

    /**
     * 更新推广创意的状态.
     *
     * @param  array$creativeIds
     * @param bool $paused
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updatePaused(array $creativeIds, $paused)
    {
        $params = [
            'adGroupIds' => $creativeIds,
            'paused'     => $paused,
        ];

        return $this->httpPostJson('creative/paused/update', $params);
    }

    /**
     * 删除推广创意.
     *
     * @param array $creativeIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function delete(array $creativeIds)
    {
        $params = [
            'creativeIds' => $creativeIds,
        ];

        return $this->httpPostJson('creative/delete', $params);
    }

    /**
     * 根据推广计划id获取推广创意.
     *
     * @param array $campaignIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getByCampaignIds(array $campaignIds)
    {
        $params = [
            'campaignIds' => $campaignIds,
        ];

        return $this->httpPostJson('creative/getCreativeByCampaignId', $params);
    }

    /**
     * 根据推广计划id获取推广创意id.
     *
     * @param array $campaignIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getIdsByCampaignIds(array $campaignIds)
    {
        $params = [
            'campaignIds' => $campaignIds,
        ];

        return $this->httpPostJson('creative/getCreativeIdByCampaignId', $params);
    }

    /**
     * 根据推广创意id获取推广创意.
     *
     * @param array $creativeIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getByIds(array $creativeIds)
    {
        $params = [
            'creativeIds' => $creativeIds,
        ];

        return $this->httpPostJson('creative/getCreativeByCreativeId', $params);
    }

    /**
     * 获取创意分类列表.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getCreativeIndustries()
    {
        return $this->httpPostJson('material/getCreativeIndustry');
    }
}
