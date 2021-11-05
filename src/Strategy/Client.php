<?php


namespace ThinkBIM\UCSDK\Strategy;


use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 新建盯排名策略.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function add(array $params)
    {
        return $this->httpPostJson('strategyService/addStrategy', $params);
    }

    /**
     * 为盯排名策略添加关键词.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function addKeyword(array $params)
    {
        return $this->httpPostJson('strategyService/addStrategyKeyword', $params);
    }

    /**
     * 为盯排名策略添加关键词.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function updateStrategy(array $params)
    {
        return $this->httpPostJson('strategyService/updateStrategy', $params);
    }

    /**
     * 删除盯排名策略.
     *
     * @param int $strategyId
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function delete(int $strategyId)
    {
        $params = [
            'strategyId' => $strategyId
        ];
        return $this->httpPostJson('strategyService/deleteStrategy', $params);
    }

    /**
     * 移除指定策略中的关键词.
     *
     * @param array $params
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function deleteKeyword(array $params)
    {
        return $this->httpPostJson('strategyService/deleteStrategyKeyword', $params);
    }

    /**
     * 获取用户下所有的策略列表.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getStrategies()
    {
        return $this->httpPostJson('strategyService/getStrategies');
    }

    /**
     * 获取指定策略下所有的关键词信息.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    public function getStrategyKeywords(int $strategyId)
    {
        $params = [
            'strategyId' => $strategyId
        ];
        return $this->httpPostJson('strategyService/getStrategyKeywords', $params);
    }
}
