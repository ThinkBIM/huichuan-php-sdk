<?php


namespace ThinkBIM\UCSDK\Dmp;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    protected $baseUri = 'https://qianxing.uc.cn/dmp/openapi/';


    /**
     * 获取筛选后的行业列表
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getIndustrys()
    {
        return $this->httpPostJson('material/getIndustry');
    }

    /**
     * 上传号码人群包所需要的zip压缩包
     * @param $file
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function uploadNumberFile($file)
    {
        return $this->httpPostFile('audience/uploadNumberFile', $file);
    }

    /**
     * 上传号码人群包所需要的zip压缩包
     * @param $file
     *
     * @return array
     */
    public function uploadKeywordsFile($file)
    {
        return $this->httpPostJson('audience/uploadKeywordsFile', $file);
    }

    /**
     * 增加人群包，默认不超过200个
     * @param $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function add($params)
    {
        return $this->httpPostJson('audience/addPackage', $params);
    }

    /**
     * 根据指定的人群包 ID 更新人群包的属性
     * @param $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function update($params)
    {
        return $this->httpPostJson('audience/updatePackage', $params);
    }

    /**
     * 删除人群包.
     * @param array $packageIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function delete(array $packageIds)
    {
        $params = [
            'packageIdArrayParameter' => $packageIds
        ];
        return $this->httpPostJson('audience/deletePackage', $params);
    }

    /**
     * 根据人群包ID，获取人群包的各项属性和设置.
     * @param array $packageIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getPackageById(array $packageIds)
    {
        $params['packageIdArrayParameter']['packageIds'] = $packageIds;
        return $this->httpPostJson('audience/getPackageByPackageId', $params);
    }

    /**
     * 获取所有人群包
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getAllPackage()
    {
        return $this->httpPostJson('audience/getAllPackage');
    }

    /**
     * 获取所有的人群包ID
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getAllPackageIds()
    {
        return $this->httpPostJson('audience/getAllPackageId');
    }

    /**
     * 根据查询条件获取人群包
     * @param $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function queryPackage($params)
    {
        return $this->httpPostJson('audience/queryPackage', $params);
    }

    /**
     * 根据人群包 ID，推送人群包.
     * @param array $packageIds
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function pushPackage(array $packageIds)
    {
        $params['packageIdArrayParameter']['packageIds'] = $packageIds;
        return $this->httpPostJson('audience/queryPackage', $params);
    }

    /**
     * 获取精选标签分组
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getSelectionCrowdGroups()
    {
        return $this->httpPostJson('audience/getSelectionRecommendedCrowdGroupList');
    }

    /**
     * 根据分组ID，获取精选标签列表
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getSelectionCrowds()
    {
        return $this->httpPostJson('audience/getSelectionRecommendedCrowdList');
    }

    /**
     * 获取专属标签分组.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getDedicatedCrowdGroups()
    {
        return $this->httpPostJson('audience/getDedicatedRecommendedCrowdGroupList');
    }

    /**
     * 根据分组ID，获取专属标签列表.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getDedicatedCrowds()
    {
        return $this->httpPostJson('audience/getDedicatedRecommendedCrowdList');
    }

}
