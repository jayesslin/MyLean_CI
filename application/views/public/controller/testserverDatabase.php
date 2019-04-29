<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/8
 * Time: 16:42
 */


$servername = "167.99.105.36";
$username = "daoyanli_root";
$password = "132566jayess";
$dbname="daoyanli_testone";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功";
print_r($_POST);

$stmt = $conn->prepare("INSERT INTO user (username,phone)
 VALUES (?, ?)");
$stmt->bind_param("si", $username, $phone);
$username = "laji";
$email= $_POST['email'];
$firstname = $_POST['firstname'];
$phone = 1112;

$stmt->execute();
echo "新记录插入成功";