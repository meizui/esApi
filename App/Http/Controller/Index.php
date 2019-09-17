<?php

namespace App\Http\Controller;

use EasySwoole\EasySwoole\Trigger;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;

class Index extends Controller
{
    function index()
    {

        echo 123123;
        $this->writeJson(200, [], 'success');
       
    }

}