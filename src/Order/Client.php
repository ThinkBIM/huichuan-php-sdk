<?php


namespace ThinkBIM\UCSDK\Order;


use GuzzleHttp\Exception\GuzzleException;
use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 根据订单id获取订单.
     *
     * @param array $orderIds
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getByIds(array $orderIds): array
    {
        $params = [
            'orderIds' => $orderIds,
        ];

        return $this->httpPostJson('goodsorder/getOrderByOrderId', $params);
    }

    /**
     * 获取指定日期内的订单.
     *
     * @param string $startDate
     * @param string $endDate
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function get($startDate, $endDate): array
    {
        $params = [
            'startDate' => $startDate,
            'endDate'   => $endDate,
        ];

        return $this->httpPostJson('goodsorder/getAllOrder', $params);
    }

    /**
     * 获取指定日期内的订单Id.
     *
     * @param string $startDate
     * @param string $endDate
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getIds($startDate, $endDate): array
    {
        $params = [
            'startDate' => $startDate,
            'endDate'   => $endDate,
        ];

        return $this->httpPostJson('goodsorder/getAllOrderId', $params);
    }
}
