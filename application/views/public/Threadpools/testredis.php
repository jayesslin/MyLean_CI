<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/21
 * Time: 19:52
 */
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
//查看服务是否运行
echo "Server is running: " . $redis->set ("key1", "11");
echo "key1: " . $redis->get ("key1");



?>