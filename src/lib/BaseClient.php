<?php


namespace ThinkBIM\UCSDK\lib;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class BaseClient
{
    use HasSdkBaseInfo;

    protected $httpClient;

    // protected $baseUri = 'https://e.uc.cn/api/';
    protected $baseUri = 'https://e.uc.cn/shc/api/';

    public function __construct($username, $password, $token, $target, $source, $log, $file)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setToken($token);
        $this->setTarget($target);
        $this->setSource($source);
        $this->setLogPath($log);
        $this->setFilePath($file);
    }

    public function setHttpClient(ClientInterface $httpClient): BaseClient
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    public function getHttpClient(): Client
    {
        if (!$this->httpClient) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }

    /**
     * @param string $url
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    public function httpPostJson(string $url, array $data=[]): array
    {
        return $this->request($url, 'POST', ['json' => $data]);
    }

    /**
     * @param $url
     * @param $files
     * @return array
     * @throws GuzzleException
     */
    public function httpPostFile($url, $files): array
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
                throw new \Exception('??????????????????!');
            }
            // if ($response->getHeaderLine('Content-Length') == 1561) {
            //     // throw new \Exception('????????????');
            // }
            // if ($response->getHeaderLine('Content-Length') == 1561) {
            //     // throw new \Exception('????????????');
            // }
        };
        $options = $this->fixJsonIssue($options);
        if (property_exists($this, 'baseUri') && !is_null($this->baseUri)) {
            $options['base_uri'] = $this->baseUri;
        }

        try {
            $this->getHttpClient()->request('POST', $uri, $options);
            if(!file_exists($filename))
                throw new \Exception('??????????????????');
        } catch (GuzzleException $e) {

        }

        return $options['sink'];
    }

    /**
     * @param $uri
     * @param $method
     * @param $options
     * @return array
     * @throws GuzzleException
     */
    public function request($uri, $method='POST', $options): array
    {
        $authorization = $this->getAuthorization();
        if (!empty($options['multipart'])) {
            $options['multipart'][] = [
                'name' => 'header',
                'contents' => json_encode($authorization)
            ];
            // $options['multipart']['header'] = json_encode($authorization);
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
                MyLogger::log('info.log', '????????????', [$this->baseUri.$uri]);
                MyLogger::log('info.log', '????????????', $options);
                MyLogger::log('info.log', '????????????', $array);
            }
            return (array) $array;
        }
        return [];
    }


    protected function fixJsonIssue(array $options): array
    {
        if (isset($options['json']) && is_array($options['json'])) {
            $options['headers'] = array_merge(
                $options['headers'] ?? [],
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
