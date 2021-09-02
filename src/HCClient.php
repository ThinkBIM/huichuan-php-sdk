<?php


namespace ThinkBIM\UCSDK;

use think\Config;
use ThinkBIM\UCSDK\lib\HasSdkBaseInfo;
/**
 * Class Client.
 * @property \ThinkBIM\UCSDK\Report\Client $report
 * @property \ThinkBIM\UCSDK\Account\Client $account
 * @property \ThinkBIM\UCSDK\Group\Client $group
 * @property \ThinkBIM\UCSDK\Campaign\Client $campaign
 * @property \ThinkBIM\UCSDK\Creative\Client $creative
 * @property \ThinkBIM\UCSDK\Material\Client $material
 * @property \ThinkBIM\UCSDK\Order\Client $order
 */
class HCClient
{
    use HasSdkBaseInfo;

    protected $providers = [
        'report'   => \ThinkBIM\UCSDK\Report\Client::class,
        'account'  => \ThinkBIM\UCSDK\Account\Client::class,
        'group'    => \ThinkBIM\UCSDK\Group\Client::class,
        'campaign' => \ThinkBIM\UCSDK\Campaign\Client::class,
        'creative' => \ThinkBIM\UCSDK\Creative\Client::class,
        'material' => \ThinkBIM\UCSDK\Material\Client::class,
        'order'    => \ThinkBIM\UCSDK\Order\Client::class,
    ];

    public function __construct($username, $password, $token, $target = null)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setToken($token);
        $this->setTarget($target);
    }

    public function __get($name)
    {
        if (property_exists($this, 'providers') && array_key_exists($name, $this->providers)) {
            $username = $this->getUsername();
            $password = $this->getPassword();
            $token = $this->getToken();
            $target = $this->getTarget();
            return new $this->providers[$name]($username, $password, $token, $target);
        }
        // throw new Exception("Undefined property $name", 500);
    }


}
