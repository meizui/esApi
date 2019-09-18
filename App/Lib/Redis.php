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
            $config = \Yaconf::get('redis');
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
        if (empty($key)) {
            return  '';
        }
        return $this->redis->get($key);

    }

    public function lPop ($key)
    {
        if (empty($key)) {
            return '';
        }
        return $this->redis->lPop($key);
    }
}