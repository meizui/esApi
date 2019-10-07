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
        $uploaded_file = $request->getUploadedFile('file');
        $file = $request->getUploadedFiles();

        var_dump($file);



//        $res = $file->moveTo('/upload/'.time().'.md');
//        if ($res) {
//            $this->message('上传成功');
//        } else {
//            $this->failed('上传失败');
//        }

    }


}