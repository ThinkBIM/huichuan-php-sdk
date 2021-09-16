<?php
namespace ThinkBIM\UCSDK\Campaign;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建推广计划.
     *
     * @param array $campaignType
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function add(array $campaignType)
    {
        $params = [
            'campaignTypes' => $campaignType
        ];
        return $this->httpPostJson('campaign/add', $params);
    }

    /**
     * 更新推广计划.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function update(array $params)
    {
        return $this->httpPostJson('campaign/update', $params);
    }

    /**
     * 更新推广计划的出价.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateBid(array $params)
    {
        return $this->httpPostJson('campaign/bid/update', $params);
    }

    /**
     * 更新推广计划的出价(按百分比).
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateBidPercentage(array $params)
    {
        return $this->httpPostJson('campaign/bid/percentage/update', $params);
    }

    /**
     * 更新推广计划的状态.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updatePaused(array $params)
    {
        return $this->httpPostJson('campaign/paused/update', $params);
    }

    /**
     * 更新推广计划的地域.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateRegion(array $params)
    {
        return $this->httpPostJson('campaign/region/update', $params);
    }

    /**
     * 更新推广计划网络环境.
     *
     * @param array  $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateNetworkEnv(array $params)
    {
        return $this->httpPostJson('campaign/network/update', $params);
    }

    /**
     * 更新推广计划的年龄.
     *
     * @param array  $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateAge(array $params)
    {
        return $this->httpPostJson('campaign/age/update', $params);
    }

    /**
     * 更新推广计划的性别.
     *
     * @param array  $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateGender(array $params)
    {
        return $this->httpPostJson('campaign/gender/update', $params);
    }

    /**
     * 更新推广计划的投放平台.
     *
     * @param array  $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updatePlatform(array $params)
    {
        return $this->httpPostJson('campaign/platform/update', $params);
    }

    /**
     * 更新推广计划的转化过滤.
     *
     * @param array  $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateConvertFilter(array $params)
    {
        return $this->httpPostJson('campaign/convertfilter/update', $params);
    }

    /**
     * 更新推广计划的转化过滤.
     *
     * @param array  $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateIntelli(array $params)
    {
        return $this->httpPostJson('campaign/intelli/update', $params);
    }

    /**
     * 更新推广计划的人群包.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateAudience(array $params)
    {
        return $this->httpPostJson('campaign/audience/update', $params);
    }

    /**
     * 更新推广计划的预算.
     *
     * @param array  $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateBudget(array $params)
    {
        return $this->httpPostJson('campaign/budget/update', $params);
    }

    /**
     * 更新推广计划的投放排期和投放时段.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateDataAndPeriod(array $params)
    {
        return $this->httpPostJson('campaign/budget/update', $params);
    }

    /**
     * 申请理赔.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function triggerPaid(array $params)
    {
        return $this->httpPostJson('campaign/triggerPaid', $params);
    }

    /**
     * 开启安心投.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateAnxt(array $params)
    {
        return $this->httpPostJson('campaign/updateAnxt', $params);
    }

    /**
     * 开启超级巡量.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateAutoTargeting(array $params)
    {
        return $this->httpPostJson('campaign/autoTargeting/update', $params);
    }

    /**
     * 开启橙心投.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateChengxt(array $params)
    {
        return $this->httpPostJson('campaign/updateChengxt', $params);
    }

    /**
     * 删除推广计划.
     *
     * @param array $campaignIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function delete(array $params)
    {
        return $this->httpPostJson('campaign/delete', $params);
    }

    /**
     * 根据推广组id获取推广计划.
     *
     * @param $adGroupIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getByAdGroupIds(array $adGroupIds)
    {
        $params = [
            'adGroupIds' => $adGroupIds,
        ];

        return $this->httpPostJson('campaign/getCampaignByAdGroupId', $params);
    }

    /**
     * 根据推广组id获取推广计划id.
     *
     * @param array $adGroupIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getIdsByAdGroupIds(array $adGroupIds)
    {
        $params = [
            'adGroupIds' => $adGroupIds,
        ];

        return $this->httpPostJson('campaign/getCampaignIdByAdGroupId', $params);
    }

    /**
     * 根据推广计划id获取推广计划.
     *
     * @param array $campaignIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getByIds(array $campaignIds)
    {
        $params = [
            'campaignIds' => $campaignIds,
        ];

        return $this->httpPostJson('campaign/getCampaignByCampaignId', $params);
    }
}
