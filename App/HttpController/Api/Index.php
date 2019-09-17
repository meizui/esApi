<?php

namespace App\HttpController\Api;

namespace App\HttpController\Api;
use EasySwoole\Mysqli\QueryBuilder;
use EasySwoole\Mysqli\Client;
use App\HttpController\Api\Base;
use EasySwoole\Component\Di;

class Index extends Base
{

   public function test () {
        return  $this->failed('请求失败');
   }

   public function getData ()
   {
       $conf    = new \EasySwoole\Mysqli\Config(\EasySwoole\EasySwoole\Config::getInstance()->getConf('MYSQL'));
       $client  = new \EasySwoole\Mysqli\Client($conf);
       $client->queryBuilder()->get('video');
       $data =  $client->execBuilder();

        if ($data) {
            return $this->writeOk($data);
        } else {
            return $this->failed();
        }
   }

}