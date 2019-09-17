<?php

namespace App\HttpController;

use EasySwoole\EasySwoole\Trigger;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Http\Message\Status;

class Base extends Controller
{

    public function  index ()
    {
        return $this->notFond();
    }

    public function writeOk ($data = [])
    {
        return $this->writeJson(Status::CODE_OK,  $data, 'success');
    }

    public function message ($msg)
    {
        return $this->writeJson(Status::CODE_OK,  [], $msg);
    }

    public function failed ($msg = 'failed')
    {
        return $this->writeJson(Status::CODE_BAD_REQUEST, [], $msg);
    }

    public function notFond ($msg = 'Not Fond!')
    {
        return $this->writeJson(Status::CODE_NOT_FOUND, [] , $msg);
    }

}