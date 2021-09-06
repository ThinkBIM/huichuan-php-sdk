<?php
namespace ThinkBIM\UCSDK\Campaign;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建推广计划.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function add(array $params)
    {
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
     * @param array $campaignIds
     * @param bool  $paused
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updatePaused(array $campaignIds, $paused)
    {
        $params = [
            'campaignIds' => $campaignIds,
            'paused'      => $paused,
        ];

        return $this->httpPostJson('campaign/paused/update', $params);
    }

    /**
     * 更新推广计划的地域.
     *
     * @param array $campaignIds
     * @param int   $allRegion
     * @param int[] $region
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateRegion(array $campaignIds, $allRegion, array $region = [])
    {
        $params = [
            'campaignIds' => $campaignIds,
            'allRegion'   => $allRegion,
            'region'      => $region,
        ];

        return $this->httpPostJson('campaign/region/update', $params);
    }

    /**
     * 更新推广计划网络环境.
     *
     * @param array  $campaignIds
     * @param string $target
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateNetworkEnv(array $campaignIds, $target)
    {
        $params = [
            'campaignIds' => $campaignIds,
            'target'      => $target,
        ];

        return $this->httpPostJson('campaign/network/update', $params);
    }

    /**
     * 更新推广计划的年龄.
     *
     * @param array  $campaignIds
     * @param number $target
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateAge(array $campaignIds, $target)
    {
        $params = [
            'campaignIds' => $campaignIds,
            'target'      => $target,
        ];

        return $this->httpPostJson('campaign/age/update', $params);
    }

    /**
     * 更新推广计划的性别.
     *
     * @param array  $campaignIds
     * @param number $target
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateGender(array $campaignIds, $target)
    {
        $params = [
            'campaignIds' => $campaignIds,
            'target'      => $target,
        ];

        return $this->httpPostJson('campaign/gender/update', $params);
    }

    /**
     * 更新推广计划的投放平台.
     *
     * @param array  $campaignIds
     * @param number $target
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updatePlatform(array $campaignIds, $target)
    {
        $params = [
            'campaignIds' => $campaignIds,
            'target'      => $target,
        ];

        return $this->httpPostJson('campaign/platform/update', $params);
    }

    /**
     * 更新推广计划的转化过滤.
     *
     * @param array  $campaignIds
     * @param number $target
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateConvertFilter(array $campaignIds, $target)
    {
        $params = [
            'campaignIds' => $campaignIds,
            'target'      => $target,
        ];

        return $this->httpPostJson('campaign/convertfilter/update', $params);
    }

    /**
     * 更新推广计划的转化过滤.
     *
     * @param array  $campaignIds
     * @param number $target
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateIntelli(array $campaignIds, $target)
    {
        $params = [
            'campaignIds' => $campaignIds,
            'target'      => $target,
        ];

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
     * @param array  $campaignIds
     * @param number $budget
     * @param bool   $forceBudget
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateBudget(array $campaignIds, $budget, $forceBudget)
    {
        $params = [
            'campaignIds' => $campaignIds,
            'budget'      => $budget,
            'forceBudget' => $forceBudget,
        ];

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
     * @param array $campaignIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function triggerPaid(array $campaignIds)
    {
        $params = [
            'campaignIds' => $campaignIds,
        ];

        return $this->httpPostJson('campaign/triggerPaid', $params);
    }

    /**
     * 开启安心投.
     *
     * @param array $campaignIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateAnxt(array $campaignIds)
    {
        $params = [
            'campaignIds' => $campaignIds,
        ];

        return $this->httpPostJson('campaign/updateAnxt', $params);
    }

    /**
     * 开启超级巡量.
     *
     * @param array $campaignIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateAutoTargeting(array $campaignIds)
    {
        $params = [
            'campaignIds' => $campaignIds,
        ];

        return $this->httpPostJson('campaign/autoTargeting/update', $params);
    }

    /**
     * 开启橙心投.
     *
     * @param array $campaignIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateChengxt(array $campaignIds)
    {
        $params = [
            'campaignIds' => $campaignIds,
        ];

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
    public function delete(array $campaignIds)
    {
        $params = [
            'campaignIds' => $campaignIds,
        ];

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
