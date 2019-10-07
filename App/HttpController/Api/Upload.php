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
        $upFile  = $request->getUploadedFile('file');
        $savePath = '/www/esApi';
        $save = $savePath . '/' . time() . '.' . $upFile->getClientFilename();
        $res = $upFile->moveTo($save);
        if ($res) {
            $this->writeOk(['url'=>$save]);
        } else {
            $this->failed('上传失败');
        }

    }


}