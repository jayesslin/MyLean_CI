<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/12
 * Time: 16:03
 */


require("config.php");

global $db_username,$db_password,$db_name,$db_servername;

$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//die ("连接成功");
$username1 = $_POST['email'];
$user_password = $_POST['password'];
$sql = "select * from user where user_email = '$username1'";
$res = mysqli_query($conn,$sql);
if (!$res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        if($user_password == $row["password"]){
            if($row["user_type"]==1){
                $url="Login_home.php";
            }
            elseif ($row["user_type"]==2){
                $url="businesspage.php";
            }else{
                $url="agentpage.php";
            }
            echo " < script   language = 'javascript'  type = 'text/javascript' > ";
            echo " window.location.href = '$url' ";
            echo " <  /script > ";
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