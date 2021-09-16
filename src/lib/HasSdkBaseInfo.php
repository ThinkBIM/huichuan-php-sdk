<?php

namespace ThinkBIM\UCSDK\lib;

trait HasSdkBaseInfo
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $target;

    protected $source;

    protected $logPath;

    protected $filePath;

    /**
     * @return string
     */
    protected function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    protected function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    protected function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    protected function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    protected function getTarget()
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    protected function setTarget($target)
    {
        $this->target = $target;
    }

    protected function getSource()
    {
        return $this->source;
    }

    protected function setSource($source)
    {
        $this->source = $source;
    }
    /**
     * @return string
     */
    protected function getLogPath()
    {
        return $this->logPath;
    }

    /**
     * @param string $logPath
     */
    protected function setLogPath($logPath)
    {
        $this->logPath = $logPath;
    }

    /**
     * @return string
     */
    protected function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     */
    protected function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }


    /**
     * @return array
     */
    protected function getAuthorization()
    {
        $auth = [
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'token'    => $this->getToken()
        ];
        if($this->target) {
            $auth['target'] = $this->getTarget();
        }

        if($this->source) {
            $auth['source'] = $this->getSource();
        }
        return $auth;
    }
}
