<?php
namespace App\Lib\Upload;

use App\Lib\Upload\Base;

class Video extends Base
{
    public $fileType = "video";
    public $maxSize = 2048;
}