<?php

namespace App\HttpController\Api;

namespace App\HttpController\Api;
use EasySwoole\Mysqli\QueryBuilder;
use EasySwoole\Mysqli\Client;
use App\HttpController\Api\Base;
use EasySwoole\Component\Di;
use App\Lib\Redis;
use EasySwoole\EasySwoole\Config;

class Index extends Base
{

   public function test () {
        return  $this->failed('请求失败');
   }

   public function getData ()
   {
       $conf    = new \EasySwoole\Mysqli\Config(Config::getInstance()->getConf('MYSQL'));
       $client  = new \EasySwoole\Mysqli\Client($conf);
       $client->queryBuilder()->get('video');
       $data =  $client->execBuilder();

        if ($data) {
            return $this->writeOk($data);
        } else {
            return $this->failed();
        }
   }

   public function testReis ()
   {
       $redis = new Redis();
       $data = $redis->get('qgeng');
       if ($data) {
           return $this->writeOk($data);
       } else {
           return $this->failed();
       }
   }

   function yaconf ()
   {
       $data = \Yaconf::get('redis');

       return $this->writeOk($data);
   }

}