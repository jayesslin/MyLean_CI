<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/8
 * Time: 14:34
 */


// validation for sign up
$f_name = $_POST['first'];
$l_name = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['pass1'];
$password1 = $_POST['pass2'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$nationality = $_POST['nationality'];
$date = $_POST['birthdate'];
$details =$_POST['details'];
$link = $_POST['link'];
echo $f_name,$l_name,$nationality,$date,$details,$link;


//validation!
$pattern_email='/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
$pattern_phone='/^\(?(?:\d{3})\)?[.-]?\d{3}[.-]?(?:\d{4})$/';
$pattern_psd='/^[a-zA-Z]\w{8,16}$/';
$str_email=preg_match($pattern_email, $email);
$str_phone=preg_match($pattern_phone, $phone);
$str_psd=preg_match($pattern_psd, $password);
if(!$str_email){
    echo "wrong email";
    //header('location: success.php');
}
else if(!$str_phone){
    //header('location: wrong.php');
    echo "wrong phone";
}
else if(!$str_psd){
    echo "wrong psd!";
}
else{
    //insert into database
    echo "now registr!";
    $db_servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name="exam_test";
    $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
    $sql = "INSERT INTO artists (FirstName,LastName,Nationality,YearOfDeath,Details,ArtistLink) values (?,?,?,?,?,?)";
    $stam = $conn->prepare($sql);
    $stam->bind_param('sssdss', $f_name,$l_name,$nationality,$date,$details,$link);
    $stam->execute();
    header('location: pageTwo.php');
}
