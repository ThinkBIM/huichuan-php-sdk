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
    protected function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    protected function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    protected function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    protected function setToken(string $token)
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
    protected function setTarget(string $target)
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
    protected function getLogPath(): string
    {
        return $this->logPath;
    }

    /**
     * @param string $logPath
     */
    protected function setLogPath(string $logPath)
    {
        $this->logPath = $logPath;
    }

    /**
     * @return string
     */
    protected function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     */
    protected function setFilePath(string $filePath)
    {
        $this->filePath = $filePath;
    }


    /**
     * @return array
     */
    protected function getAuthorization(): array
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
