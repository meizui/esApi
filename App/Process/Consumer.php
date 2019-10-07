<?php

namespace App\Process;

use App\Lib\Redis;
use EasySwoole\Component\Process\AbstractProcess;
use Swoole\Process;

class Consumer extends AbstractProcess
{
    private $isRun = false;
    public function run($arg)
    {
        // TODO: Implement run() method.
        /*
         * 举例，消费redis中的队列数据
         * 定时500ms检测有没有任务，有的话就while死循环执行
         */
        $this->addTick(500000,function (){
            if(!$this->isRun){
                $this->isRun = true;
                $redis = new redis();//此处为伪代码，请自己建立连接或者维护redis连接
                while (true){
                    try{
                        $task = $redis->lPop('char');
                        if($task){
                            var_dump($this->getProcessName() . '--->'.$task);
                        }else{
                            break;
                        }
                    }catch (\Throwable $throwable){
                        break;
                    }
                }
                $this->isRun = false;
            }
            // 写日志
        });
    }

    public function onShutDown()
    {

    }

    public function onReceive(string $str, ...$args)
    {

    }
}