<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/21
 * Time: 21:21
 */

class work_enQueue
{

    public function enqueue($email_addr){
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        echo "echo insert redis";
        $redis->LPUSH("email",$email_addr);
        echo "now object notify thread";
    }
}