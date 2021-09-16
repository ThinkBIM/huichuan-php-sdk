<?php
namespace ThinkBIM\UCSDK\Group;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 新增推广组.
     *
     * @param array $adGroupTypes
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function add(array $adGroupTypes)
    {
        $params = [
            'AdGroupTypes' => $adGroupTypes
        ];
        return $this->httpPostJson('adgroup/add', $params);
    }

    /**
     * 获取username下所有的推广组\
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array
     */
    public function getAllAdGroup()
    {
        return $this->httpPostJson('adgroup/getAllAdGroup');
    }

    /**
     * 更新推广组状态.
     *
     * @param array $adGroupIds
     * @param bool  $paused
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updatePaused(array $adGroupIds, $paused)
    {
        $params = [
            'adGroupIds' => $adGroupIds,
            'paused'     => $paused,
        ];

        return $this->httpPostJson('adgroup/paused/update', $params);
    }

    /**
     * 更新推广组.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function update(array $params)
    {
        return $this->httpPostJson('adgroup/update', $params);
    }
}
