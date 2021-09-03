<?php


namespace ThinkBIM\UCSDK\Creative;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 新增推广创意
     * @param $creativeType
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function addCreative($creativeType)
    {
        $params['creativeTypes'][] = $creativeType;
        return $this->httpPostJson('creative/add', $params);
    }

    /**
     * 根据指定的创意id获取推广创意
     * @param array $creativeIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getCreativeByCreativeId(array $creativeIds)
    {
        $params = [
            'creativeIds' => $creativeIds,
        ];
        return $this->httpPostJson('creative/getCreativeByCreativeId', $params);
    }

    /**
     * 获取推广创意样式模板.
     *
     * @param array $adGroupId
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
