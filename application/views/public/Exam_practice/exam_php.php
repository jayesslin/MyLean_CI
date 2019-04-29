<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/7
 * Time: 13:28
 */
$email = $_POST['email'];
$pas = $_POST['password'];
$phone = $_POST['phone'];
echo $email .$phone.$pas;

/*
最佳解决思路
至少八个字符，至少一个字母和一个数字：

"^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
至少八个字符，至少一个字母，一个数字和一个特殊字符：

"^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$"
最少八个字符，至少一个大写字母，一个小写字母和一个数字：

"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"
至少八个字符，至少一个大写字母，一个小写字母，一个数字和一个特殊字符：

"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}"
最少八个最多十个字符，至少一个大写字母，一个小写字母，一个数字和一个特殊字符：

"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,10}"

北美电话
^\(?(?:\d{3})\)?[.-]?(?\d{3})[.-]?(?:\d{4})$
*/

$pattern='/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
$str=preg_match($pattern, $email);
if($str==1){
    echo "邮箱格式正确";
    //header('location: success.php');
}
else if($str==0){
    //header('location: wrong.php');
    echo "错误";
}
else{
    echo "something wrong!";
}
/*include_once ('ValidationResult.class.php');
if($_SERVER["REQUEST_METHOD"]=='POST'){
    $emailvalid = ValidationRessult::checkParameter("email",'/(.+)@([^\.].*)\.([a-z]{2,})/','Enter a valid email [PHP]');
    $passvalid = ValidationResult::checkParameter("password",'/^[a-zA-Z]\w{8,16}$/','Enter a valid PSD! [PHP]');

}
if($emailvalid->isValid()&&$passvalid->isValid()){
    header('location: success.php');
}
else{
    header('location: wrong.php');
}*/