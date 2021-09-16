<?php


namespace ThinkBIM\UCSDK\Adconvert;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 批量创建激活api、sdk转化.
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function addAdconvert($params)
    {
        return $this->httpPostJson('adconvert/add', $params);
    }

    /**
     * 创建sdk
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function addSdk($params)
    {
        return $this->httpPostJson('sdk/add', $params);
    }

    /**
     * 根据追踪方式获取转化
     * @param int $trackMode
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function listAdconvert(int $trackMode)
    {
        $params = [
            'trackMode' => $trackMode
        ];
        return $this->httpPostJson('adconvert/list', $params);
    }

    /**
     * 获取sdk
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function listSdk()
    {
        return $this->httpPostJson('sdk/list');
    }


}
