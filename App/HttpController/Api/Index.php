<?php

namespace App\HttpController\Api;

namespace App\HttpController\Api;
use App\HttpController\Api\Base;
use EasySwoole\Component\Di;

class Index extends Base
{

   public function test () {
        return  $this->failed('请求失败');
   }

   public function getData ()
   {
       $conf = new \EasySwoole\Mysqli\Config(\EasySwoole\EasySwoole\Config::getInstance()->getConf('MYSQL'));
       $db = new \EasySwoole\Mysqli\Mysqli($conf);
       $data = $db->get('video');//获取一个表的数据

        if ($data) {
            return $this->writeOk($data);
        } else {
            return $this->failed();
        }
   }

}