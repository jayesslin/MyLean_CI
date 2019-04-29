<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/12
 * Time: 15:37
 */
Session_start();
require("config.php");
$user_type=$_SESSION["user_type"];

global $db_username,$db_password,$db_name,$db_servername;

$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//die ("连接成功");


$user_id = $_POST["user_id"];
$event_id = $_POST["event_id"];
$event_name;
$event_response;
/*$event_name = $_POST["event_name"];
$event_response = $_POST["event_response"];*/
$db_tablename = "event";
$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
$sql =  "select * from event where event_id = $event_id";
$res1 = mysqli_query($conn,$sql);
if(mysqli_num_rows($res1) > 0) {
   while($row = mysqli_fetch_assoc($res1)) {
       $event_name = $row["event_name"];
       $event_response = $row["event_response_id"];
   }
}

$sql_query ="select * from `eventdetail` ";
$result = mysqli_query($conn,$sql_query);

$flag=0;
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        if ($event_id == $row["event_id"]) {
            if ($user_id == $row["user_id"]) {
                $flag += 1;
            }
        }
    }

}else{
    echo "0 results";
}

if ($flag>0){
    //echo "username exit!";
    echo 0;
}else{


    $sql_insert = "INSERT INTO `eventdetail`(`event_id`, `user_id`, `user_type`,`event_name`,`event_response`) VALUES ($event_id,$user_id,$user_type,'".$event_name."','".$event_response."')";
    //$res = mysqli_query($conn,$sql);
    if ($conn->query($sql_insert) === TRUE) {
        echo 1;
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }

}
/*
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($user_id == $row["user_id"]){
            echo 0;
        }else{
            $sql_insert = "INSERT INTO `eventdetail`(`event_id`, `user_id`, `user_type`) VALUES ($event_id,$user_id,'free')";
            //$res = mysqli_query($conn,$sql);
            if ($conn->query($sql_insert) === TRUE) {
                echo 1;
            } else {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }
        }
    }
}*/





/*if(mysqli_num_rows($result)> 0){
    echo 0;
}else{
    $sql_insert = "INSERT INTO `eventdetail`(`event_id`, `user_id`, `user_type`) VALUES ($event_id,$user_id,'free')";
    //$res = mysqli_query($conn,$sql);
        if ($conn->query($sql_insert) === TRUE) {
        echo 1;
        }else{
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
}*/




/*$n=mysql_afftected_rows($res);
if($n>0){
    echo 1;
}else{
    echo 0;
}*/