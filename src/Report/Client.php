<?php


namespace ThinkBIM\UCSDK\Report;


use GuzzleHttp\Exception\GuzzleException;
use ThinkBIM\UCSDK\lib\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取账户报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getAccountReports(array $params)
    {
        return $this->httpPostJson('report/account', $params);
    }

    /**
     * 获取推广组报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getAdGroupReports(array $params)
    {
        return $this->httpPostJson('report/adgroup', $params);
    }

    /**
     * 获取推广计划报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getCampaignReports(array $params)
    {
        return $this->httpPostJson('report/campaign', $params);
    }

    /**
     * 获取推广创意报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getCreativeReports(array $params)
    {
        return $this->httpPostJson('report/creative', $params);
    }

    /**
     * 获取关键词数据报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getKeywordReports(array $params)
    {
        return $this->httpPostJson('report/winfo', $params);
    }

    /**
     * 获取受众分析报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getAudienceReports(array $params)
    {
        return $this->httpPostJson('report/audience', $params);
    }

    /**
     * 获取搜索词数据报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getQueryReports(array $params)
    {
        return $this->httpPostJson('report/audience', $params);
    }

    /**
     * 获取超级巡量数据报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getAutoTargetingOpenedReports(array $params)
    {
        return $this->httpPostJson('report/autoTargeting/opened', $params);
    }

    /**
     * 获取建议开启超级巡量数据报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getAutoTargetingSuggestOpenReports(array $params)
    {
        return $this->httpPostJson('report/autoTargeting/suggestOpen', $params);
    }

    // 优+定向报告

    /**
     * 获取无效点击报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getInvalidClickReports(array $params)
    {
        return $this->httpPostJson('report/invalidClick', $params);
    }

    /**
     * 获取安心保障数据报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getOcpcPayReports(array $params)
    {
        return $this->httpPostJson('report/ocpcpay', $params);
    }

    /**
     * 获取安心理赔数据报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getOcpcPaidReports(array $params)
    {
        return $this->httpPostJson('report/ocpcpaid', $params);
    }

    /**
     * 获取安心赔付消费数据报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getOcpcPayAccountReports(array $params)
    {
        return $this->httpPostJson('report/ocpcpay/account', $params);
    }

    //橙心投报告

    /**
     * 获取app报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getAppReports(array $params)
    {
        return $this->httpPostJson('report/app', $params);
    }

    /**
     * 获取视频报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getVideoReports(array $params)
    {
        return $this->httpPostJson('report/video', $params);
    }

    //智能词包报告

    /**
     * 获取组件报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getComponentReports(array $params)
    {
        return $this->httpPostJson('report/component', $params);
    }

    // 展现排名报告


    // 猎户销售线索报告

    /**
     * 获取策略层级报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getStrategyReports(array $params)
    {
        return $this->httpPostJson('strategyService/getStrategyKeywords', $params);
    }

    /**
     * 获取策略层级关键词报表.
     *
     * @param array $params
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getStrategyKeywordReports(array $params)
    {
        return $this->httpPostJson('strategyService/getStrategyKeywordReport', $params);
    }


    /**
     * 查询下载任务状态.
     *
     * @param number $taskId
     * @param bool   $adReport
     *
     * @throws GuzzleException
     *
     * @return array
     */
    public function getFile($taskId, $adReport = true): array
    {
        $params = [
            'taskId'   => $taskId,
            'adReport' => $adReport,
        ];

        return $this->httpPostJson('report/getFile', $params);
    }

    /**
     * 下载报表文件并转为数组.
     *
     * @param number $taskId
     * @param bool   $adReport
     *
     * @throws GuzzleException
     * @throws \Exception
     *
     */
    public function downloadFile($filename, $taskId, $adReport = true, $replace = false)
    {
        $filePath = rtrim($this->getFilePath(), '/');

        if($replace) {
            if(file_exists($filePath . '/' . $filename)) {
                return $filePath .'/'. $filename;
            }
        }
        if(!is_dir(dirname($filePath.'/'.$filename))) {
            mkdir(dirname($filePath.'/'.$filename) , 0777, true);
        }
        $params = [
            'taskId'   => $taskId,
            'adReport' => $adReport,
        ];
        return $this->httpCsvFile('report/downloadFile', $params, $filePath.'/'.$filename);
    }
}
