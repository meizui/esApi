<?php

namespace App\Lib;

use EasySwoole\Component\Singleton;
use EasySwoole\Spl\Exception\Exception;
use EasySwoole\Mysqli\QueryBuilder;
use EasySwoole\Mysqli\Client;

class Db
{
    use Singleton;
    protected $db = null;

    public function __construct()
    {
        try
        {
            if (!extension_loaded('mysqli')) {
                throw new Exception('mysqli 扩展未安装!');
            }
            $config = \Yaconf::get('Db');
            $db = new \EasySwoole\Mysqli\Mysqli($config);

            $res = $this->redis->connect($config['host'],$config['port'],$config['timeout']);
            if (!$res) {
                throw  new Exception('链接失败');
            }
        } catch (\Exception $e) {
            throw  new Exception('服务异常');
        }
    }
}