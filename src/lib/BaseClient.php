<?php


namespace ThinkBIM\UCSDK\lib;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class BaseClient
{
    use HasSdkBaseInfo;

    protected $httpClient;

    // protected $baseUri = 'https://e.uc.cn/api/';
    protected $baseUri = 'https://e.uc.cn/shc/api/';

    public function __construct($username, $password, $token, $target, $log, $file)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setToken($token);
        $this->setTarget($target);
        $this->setLogPath($log);
        $this->setFilePath($file);
    }

    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    public function getHttpClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }

    public function httpPostJson($url, $data=[])
    {
        return $this->request($url, 'POST', ['json' => $data]);
    }

    public function httpPostFile($url, $files)
    {
        return $this->request($url, 'POST', ['multipart' => $files]);
    }

    public function  httpCsvFile($uri, $data, $filename)
    {
        $authorization = $this->getAuthorization();
        $options['json'] = [
            'header' => $authorization,
            'body'   => $data,
        ];
        $options['debug'] = true;
        $options['sink'] = $filename;
        $options['on_headers'] = function (ResponseInterface $response) use($options){
            MyLogger::log('info.log', 'Content-Length', $response->getHeader('Content-Length'));
            MyLogger::log('info.log', 'options', $options);
            if (empty($response->getHeaderLine('Content-Type')) || strpos($response->getHeaderLine('Content-Type'), 'octet-stream') === false) {
                throw new \Exception('接口返回错误!');
            }
            // if ($response->getHeaderLine('Content-Length') == 1561) {
            //     // throw new \Exception('参数错误');
            // }
            // if ($response->getHeaderLine('Content-Length') == 1561) {
            //     // throw new \Exception('参数错误');
            // }
        };
        $options = $this->fixJsonIssue($options);
        if (property_exists($this, 'baseUri') && !is_null($this->baseUri)) {
            $options['base_uri'] = $this->baseUri;
        }

        $this->getHttpClient()->request('POST', $uri, $options);
        if(!file_exists($filename)) {
            throw new \Exception('文件创建失败');
        }
        return $options['sink'];
    }

    public function request($uri, $method='POST', $options)
    {
        $authorization = $this->getAuthorization();
        if (!empty($options['multipart'])) {
            $options['multipart']['header'] = json_encode($authorization);
        } else {
            if (empty($options['json'])) {
                $options['json']['header'] = $authorization;
            } else {
                $options['json'] = [
                    'header' => $authorization,
                    'body'   => $options['json'],
                ];
            }
        }
        $method = strtoupper($method);
        $options = $this->fixJsonIssue($options);

        if (property_exists($this, 'baseUri') && !is_null($this->baseUri)) {
            $options['base_uri'] = $this->baseUri;
        }
        $response = $this->getHttpClient()->request($method, $uri, $options);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, true, 512, JSON_BIGINT_AS_STRING);
        if (JSON_ERROR_NONE === json_last_error()) {
            if(!isset($array['header']['status']) || $array['header']['status'] != 0) {
                MyLogger::log('info.log', '请求地址', [$this->baseUri.$uri]);
                MyLogger::log('info.log', '请求参数', $options);
                MyLogger::log('info.log', '错误响应', $array);
            }
            return (array) $array;
        }
        return [];
    }


    protected function fixJsonIssue(array $options)
    {
        if (isset($options['json']) && is_array($options['json'])) {
            $options['headers'] = array_merge(
                isset($options['headers']) ? $options['headers'] : [],
                ['Content-Type' => 'application/json']
            );
            if (empty($options['json'])) {
                $options['body'] = json_encode($options['json'], JSON_FORCE_OBJECT);
            } else {
                $options['body'] = json_encode($options['json'], JSON_UNESCAPED_UNICODE);
            }
            unset($options['json']);
        }
        return $options;
    }
}
