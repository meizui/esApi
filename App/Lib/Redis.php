<?php

namespace App\Lib;

use EasySwoole\Component\Singleton;
use EasySwoole\EasySwoole\Config;
use EasySwoole\Spl\Exception\Exception;

class Redis
{
    use Singleton;
    protected $redis = null;

    private function __construct()
    {
        try
        {
            if (!extension_loaded('redis')) {
                throw new Exception('redis 扩展未安装!');
            }

            $config = Config::getInstance()->getConf('REDIS');
            $this->redis  = new \Redis();
            $res = $this->redis->connect($config['host'],$config['port'],$config['timeout']);
            if (!$res) {
                throw  new Exception('链接失败');
            }
        } catch (\Exception $e) {
            throw  new Exception('服务异常');
        }
    }

    public function get ($key)
    {
        return $this->redis->get($key);
    }
}