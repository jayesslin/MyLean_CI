<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/9
 * Time: 0:18
 */

require("config.php");

global $db_username,$db_password,$db_name,$db_servername;

$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);

//server part validation
if($_POST['email']==""||$_POST['type']==""||$_POST['lastname']==""||$_POST['password']==""||$_POST['country']==""||$_POST['address']==""){
    echo -2;
}


// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//die ("连接成功");
$username1 = $_POST['email'];
$sql = "select * from user ";
$res = mysqli_query($conn,$sql);
global  $flag;
if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        if($username1 == $row["user_email"]){
            $flag +=1;
        }
    }
}else{
    echo "0 results";
}
if ($flag>0){
    //echo "username exit!";
    echo 0;
}else{
    $email = $username1;
    $firstname = $_POST['firstname'];
    $type=$_POST['type'];
    $lastname=$_POST['lastname'];
    $password=$_POST['password'];
    $country=$_POST['country'];
    $county=$_POST['county'];
    $address=$_POST['address'];
    $zipcode=$_POST['zipcode'];
    $stmt = $conn->prepare("INSERT INTO user (user_email, password,first_name, last_name, user_address,user_state,user_county,user_code, user_type)
 VALUES (?, ?, ?,?, ?, ?,?, ?, ?)");
    $stmt->bind_param("sssssssss", $email,$password,$firstname, $lastname, $address,$country,$county,$zipcode,$type);
    $stmt->execute();
    echo 1;
}

mysqli_close($conn);
mysqli_free_result($res);



