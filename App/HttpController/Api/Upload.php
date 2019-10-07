<?php

namespace App\HttpController\Api;

namespace App\HttpController\Api;
use App\HttpController\Api\Base;
use EasySwoole\EasySwoole\Config;

class Upload extends Base
{

    // 文件上传 -- 视频 图片
    public function file ()
    {
        $request = $this->request();
        var_dump($request);
    }


}