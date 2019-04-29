<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/23
 * Time: 22:58
 */
require "SenMail.php";
$e = new SenMail();
$toEmail = array('xxxx@163.com','xxxxx@qq.com');
$e->sendMail($toEmail,'xx程','测试2号','我是内容');