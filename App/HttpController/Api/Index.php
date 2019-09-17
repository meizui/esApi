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
        $db = Di::getInstance()->get('MYSQL');
        var_dump($db);


        $data = $db->getOne('video','id,path');
        if ($data) {
            return $this->writeOk($data);
        } else {
            return $this->failed();
        }
   }

}