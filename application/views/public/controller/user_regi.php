

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




$email= $_POST['email'];
$firstname = $_POST['firstname'];
$type="individual";
$lastname=$_POST['lastname'];
$password=$_POST['password'];
$country=$_POST['country'];
$county=$_POST['county'];
$address=$_POST['address'];
$zipcode=$_POST['zipcode'];





function validation($username){
    $db_servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name="lin_lean";
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
// test conn
    if ($conn->connect_error) {
        die("failed conn: " . $conn->connect_error);
    }
    echo "success conn";

    // is  username in the db?
    $sql = "select user_email from user";
    $res = mysqli_query($conn,$sql);
    /*$res = $conn->query($sql);*/
    print_r($res);
    if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            /* echo "EMP ID :{$row['user_id']}  <br> ".
                 "EMP NAME : {$row['user_email']} <br> ".
                 "EMP password : {$row['password']} <br> ".
                 "--------------------------------<br>";*/

            if($username == $row["user_email"])
                echo "username exit!";
            return false;
        } //end of while
    }else{
        echo "success registrete!";
        $stmt = $conn->prepare("INSERT INTO user (user_email, password,first_name, last_name, user_address,user_state,user_county,user_code, user_type)
 VALUES (?, ?, ?,?, ?, ?,?, ?, ?)");
        $stmt->bind_param("sssssssss", $email,$password,$firstname, $lastname, $address,$country,$county,$zipcode,$type);
        $stmt->execute();

        echo "新记录插入成功";

        $stmt->close();
        $conn->close();
        return true;
    }
}

?>