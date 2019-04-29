<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/7
 * Time: 22:07
 */

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="lin_lean";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功";
print_r($_POST);

$stmt = $conn->prepare("INSERT INTO user (user_email, password,first_name, last_name, user_address,user_state,user_county,user_code, user_type)
 VALUES (?, ?, ?,?, ?, ?,?, ?, ?)");
$stmt->bind_param("sssssssss", $email,$password,$firstname, $lastname, $address,$country,$county,$zipcode,$type);

$email= $_POST['email'];
$firstname = $_POST['firstname'];
$type="individual";
$lastname=$_POST['lastname'];
$password=$_POST['password'];
$country=$_POST['country'];
$county=$_POST['county'];
$address=$_POST['address'];
$zipcode=$_POST['zipcode'];
$stmt->execute();

echo "新记录插入成功";

$stmt->close();
$conn->close();
?>