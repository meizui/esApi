<?php
namespace App\Lib\Upload;

use function PHPSTORM_META\type;

class Base {

    public $request;
    // 上传文件的key的名称
    public $type;
    public $size;

    public function __construct($request)
    {
        $this->request = $request;
        $files = $this->request->getSwooleRequest()->files;
        $types = array_keys($files);
        $this->type = $types[0];
    }

    public function upload ()
    {
        // 检查文件类型
        if($this->fileType != $this->type) return false;

        $upFile = $this->request->getUploadedFile($this->type);
        var_dump($upFile->getSize());
        var_dump($upFile->getClientMediaType());

        $savePath = '/www/esApi';
        $save = $savePath . '/' . time() . '.' . $upFile->getClientFilename();
        $res = $upFile->moveTo($save);

        if ($res) {
            return [
                'path'=>$save
            ];
        }else {
            return false;
        }

    }


    // 检验文件大小
    public function checkSize ()
    {
        if (empty($this->maxSize)) return false;
        if  ($this->maxSize < $this->getGetMediaSize()) {
            return false;
        }
    }

    // 获取文件大小
    public function getMediaSize ()
    {

    }

    // 获取文件类型
    public function getGetMediaType ()
    {

    }

    public function checkFileType ()
    {

    }


}