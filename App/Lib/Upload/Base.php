<?php
namespace App\Lib\Upload;

use function PHPSTORM_META\type;

class Base {

    public $request;
    public $type;

    public function __construct($request)
    {

        $this->request = $request;
        $file = $this->request->getSwooleRquest()->files;
        $types = array_keys($file);
        var_dump($types[0]);
    }

    public function upload ()
    {
        if($this->type != $this->fileType) return false;
    }


}