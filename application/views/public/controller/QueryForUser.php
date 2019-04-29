<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/8
 * Time: 17:01
 */

require("config.php");

global $db_username,$db_password,$db_name,$db_servername;

$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功";

$sql = "select * from user"  ;

$res = mysqli_query($conn,$sql);
if (!$res) {
    printf("Error: %s\n", mysqli_error($conn));

}
print_r($res);
/*
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        echo $row["password"];
        echo "hello";
    }
}else{
    echo "0 results";
}*/
$email = "sdsds";
$firstname = "sdsds";
$type="sdsds";
$lastname="sdsds";
$password="sdsds";
$country="sdsds";
$county="sdsds";
$address="sdsds";
$zipcode="sdsds";
$stmt = $conn->prepare("INSERT INTO user (user_email, password,first_name, last_name, user_address,user_state,user_county,user_code, user_type)
 VALUES (?, ?, ?,?, ?, ?,?, ?, ?)");
$stmt->bind_param("sssssssss", $email,$password,$firstname, $lastname, $address,$country,$county,$zipcode,$type);
$stmt->execute();
echo 1;


mysqli_close($conn);
mysqli_free_result($res);
