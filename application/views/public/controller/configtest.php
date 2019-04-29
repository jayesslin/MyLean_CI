<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/10
 * Time: 20:35
 */
require("config.php");

global $db_username,$db_password,$db_name,$db_servername;
echo "数据库用户名：".$db_username."<br />";
echo "数据库密码：".$db_password."<br />";
echo $db_name;
echo $db_servername;

$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}echo "连接成功";
$user1 = "lindaoyana@gmail.com";

$sql = "select * from user"  ;

$res = mysqli_query($conn,$sql);
if (!$res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}