<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/24
 * Time: 19:56
 */

session_start();
$name =  $_SESSION["name"];
$user_id =  $_SESSION["user_id"];
$user_type =$_SESSION["user_type"];
$event_id =$_POST["event_id"];
echo $event_id;
//conn to database

require("config.php");
global $db_username,$db_password,$db_name,$db_servername;
$con = mysqli_connect($db_servername, $db_username, $db_password,$db_name);


$sql_delete_detail="DELETE FROM eventdetail WHERE event_id= '$event_id'";
$sql_delete_event="DELETE FROM event WHERE event_id= '$event_id'";
print $sql_delete_event;
if(mysqli_query($con,$sql_delete_detail)&&
mysqli_query($con,$sql_delete_event)){
    echo 1;
}

/*
$con->query($sql_delete_detail);
$con->query($sql_delete_event);*//*
if ($con->query($sql_delete_detail) === TRUE) {
    echo "delte detail s!";
} else {
    echo "Error: " . $sql_delete_detail . "<br>" . $con->error;
}

if ($con->query($sql_delete_event) === TRUE) {
    echo "delte event s!";
} else {
    echo "Error: " . $sql_delete_event . "<br>" . $con->error;
}*/
?>