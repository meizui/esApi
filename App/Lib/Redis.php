<?php

namespace App\Lib;

use EasySwoole\Component\Singleton;
use EasySwoole\Spl\Exception\Exception;

class Redis
{
    use Singleton;
    protected $redis = null;

    public function __construct()
    {
        try
        {
            if (!extension_loaded('redis')) {
                throw new Exception('redis 扩展未安装!');
            }
            $this->redis  = new \Redis();
            $host = '127.0.0.1';
            $port = 6379;
            $timeout = 5;
            $res = $this->redis->connect($host,$port,$timeout);

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