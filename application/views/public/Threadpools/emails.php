<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/21
 * Time: 21:31
 */
/*$email_addr= $_POST["Email"];
echo "email addr is: ".$email_addr;*/
require "work_enQueue.php";

require_once "work_deQueue.php";

$email_addr= "sd";
$work_en=new work_enQueue();



echo "now use enqueue()";

    for ($x=0; $x<=10; $x++) {
        $email_addr= "sd".$x;
        $work_en->enqueue($email_addr);
    }

$work_de=new work_deQueue();
