<?php


namespace ThinkBIM\UCSDK\lib;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class BaseClient
{
    use HasSdkBaseInfo;

    protected $httpClient;

    protected $baseUri = 'https://e.uc.cn/api/';

    public function __construct($username, $password, $token, $target)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setToken($token);
        $this->setTarget($target);
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
