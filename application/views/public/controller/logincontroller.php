<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/10
 * Time: 15:37
 */
/*
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="lin_lean";
$conn = mysqli_connect($servername, $username, $password,$dbname);*/
// 创建连接
/*$conn = new mysqli($servername, $username, $password, $dbname);*/
Session_start();
require("config.php");

global $db_username,$db_password,$db_name,$db_servername;

$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//die ("连接成功");
$username1 = $_POST['email'];
//设置session
$_SESSION["name"]=$username1;
$user_password = $_POST['password'];


//server part validation
if($username1==""||$user_password==""){
    echo -2;

}


$sql = "select * from user where user_email = '$username1'";
$res = mysqli_query($conn,$sql);
if (!$res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        if($user_password == $row["password"]){
            $_SESSION["user_id"]=$row["user_id"];
            $_SESSION["user_type"]=$row["user_type"];
            echo $row["user_type"];
        }
        else{
            //wrong password
            echo -1;
        }
    }
}else{
    //cant find the username
    echo 0;
}