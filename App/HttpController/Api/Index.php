<?php

namespace App\HttpController\Api;

namespace App\HttpController\Api;
use App\HttpController\Api\Base;

class Index extends Base
{

   public function test () {
        return  $this->failed('请求失败');
   }

}