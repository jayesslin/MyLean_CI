<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/3
 * Time: 12:31
 */

require("config.php");

global $db_username,$db_password,$db_name,$db_servername;

$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);


$firstname = $_POST['firstname'];
$lastname=$_POST['lastname'];
$subject=$_POST['subject'];
$email=$_POST['email'];
$content=$_POST['content'];

$stmt = $conn->prepare("INSERT INTO contactus (firstname, lastname,subject,email, content)
 VALUES (?, ?, ?,?, ?)");
$stmt->bind_param("sssss", $firstname, $lastname,$subject,$email, $content);
$stmt->execute();
echo 1;
