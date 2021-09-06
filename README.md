# huichuan-php-sdk



## 安装

```bash
composer require thinkbim/huichuan-php-sdk
```

## 环境要求
- PHP 7+
- ThinkPHP 6+


## 配置文件
```php

#新增配置文件 config/huichuan.php

return [
    'header' => [
        'username' => '', //账户名称
        'password' => '', //账户密码
        'token' => '',   //授权token
        'target' => ''  //代理商品
    ],
    'log' => [
        'path' => 'huichuan', //错误日志记录
    ]
];
```

## 使用



```php



use ThinkBIM\UCSDK\HCClient;

try {
   $client = new HCClient(['target' => '代理商账户名称']);
   $result = $client->account->getAccount();
   if(isset($result['header']['status']) && $result['header']['status'] == 0) {
        //接口请求成功
    }else{
        //接口失败处理
    }
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    // Guzzle工具请求异常
}

```


## 参考

- [超级汇川文档](https://www.yuque.com/siyou-lmowq/sow7i0)
- [uc-marketing-sdk](https://github.com/CloudyCity/uc-marketing-sdk)
