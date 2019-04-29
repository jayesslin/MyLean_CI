<?php
/**
* Created by PhpStorm.
* User: 49396
* Date: 2019/2/13
* Time: 16:08
*/

$name =  $_SESSION["name"];
$user_id =  $_SESSION["user_id"];
$user_type = $_SESSION["user_type"];

//conn to database
$db_servername = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name="lin_lean";
$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$user_email = $_POST["email"];
$user_phone = $_POST["phone"];
$user_name = $_POST["username"];
$newpassword = $_POST["password"];



$pic=base_url()."/application/views/upload/".$user_id."/".$user_id;

//user_type ==1  individual
if($user_type==1){
    echo "individual!";
    echo "<br/>";
    //$file= $_POST['file'];
    //$file= $_FILES['file'];
    $last_name =$_POST["lastname"];
    $first_name=$_POST["firstname"];

    $sql = "UPDATE user SET last_name='$last_name' , first_name= '$first_name' ,user_email ='$user_email' , user_phone='$user_phone' , user_name = '$user_name',password='$newpassword',pic_address='$pic' WHERE user_id ='$user_id'";

    $res = mysqli_query($conn,$sql);
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    mysqli_close($conn);
}
if($user_type==2){
    echo "Business";
    echo "<br/>";
    //$file= $_POST['file'];
    //$file= $_FILES['file'];
    $repre =$_POST["lastname"];
    $fundation=$_POST["firstname"];
    //先查询
    $sql = "select * from user_business where business_id = '$user_id'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 0){
        $stmt = $conn->prepare("INSERT INTO user_business (business_id, business_type,business_name,business_Repre)
        VALUES (?, ?, ?,?)");
        $stmt->bind_param("iiss", $user_id,$user_type, $fundation,$repre);
        $stmt->execute();
        $sql_cont = "UPDATE user SET user_email ='$user_email' , user_phone='$user_phone' , user_name = '$user_name',password='$newpassword',pic_address='$pic' WHERE user_id ='$user_id'";
        $res = mysqli_query($conn,$sql_cont);
    }else if(mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $sql = "UPDATE user_business SET business_id='$user_id' , business_type= '$user_type' , business_name ='$fundation' , business_Repre='$repre' WHERE business_id ='$user_id'";
            $res = mysqli_query($conn, $sql);
            $sql_cont = "UPDATE user SET user_email ='$user_email' , user_phone='$user_phone' , user_name = '$user_name',password='$newpassword',pic_address='$pic' WHERE user_id ='$user_id'";
            $res = mysqli_query($conn,$sql_cont);
            mysqli_close($conn);
        }

    }
}
if($user_type==3){
    echo "Agent";
    echo "<br/>";
    //$file= $_POST['file'];
    //$file= $_FILES['file'];
    $agent_num =$_POST["firstname"];
    $agent_name=$_POST["lastname"];
    //先查询
    $sql = "select * from user_agent where agent_id = '$user_id'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 0){
        $stmt = $conn->prepare("INSERT INTO user_agent (agent_id, agent_name,agent_num)
        VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id,$agent_name, $agent_num);
        $stmt->execute();
        $sql_cont = "UPDATE user SET user_email ='$user_email' , user_phone='$user_phone' , user_name = '$user_name',password='$newpassword' WHERE user_id ='$user_id'";
        $res = mysqli_query($conn,$sql_cont);
    }else if(mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $sql = "UPDATE user_agent SET agent_id='$user_id' , agent_name= '$agent_name' , agent_num ='$agent_num' WHERE agent_id ='$user_id'";
            $res = mysqli_query($conn, $sql);
            $sql_cont = "UPDATE user SET user_email ='$user_email' , user_phone='$user_phone' , user_name = '$user_name',password='$newpassword',pic_address='$pic' WHERE user_id ='$user_id'";
            $res = mysqli_query($conn,$sql_cont);
            mysqli_close($conn);
        }

    }
}

if (1)//这个地方可以填写上传文件的限制，比如格式大小要求等，为了方便测试，这里没有写上传限制。
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";//获取文件返回错误
    }
    else
    {
        //打印文件信息
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";//获取文件名
        echo "Type: " . $_FILES["file"]["type"] . "<br />";//获取文件类型
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";//获取文件大小
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";//获取文件临时地址

        //自定义文件名称
        $array=$_FILES["file"]["type"];
        $array=explode("/",$array);
        $newfilename=$user_id;//自定义文件名（测试的时候中文名会操作失败）
        $_FILES["file"]["name"]=$newfilename.".".$array[1];
        /*$new = new edition();
        $new->ImageShrink( $_FILES["file"]["tmp_name"] ,50,50);*/


        if (!is_dir("upload/".$_SESSION["user_id"]))//当路径不穿在
        {
            mkdir("upload/".$_SESSION["user_id"]);//创建路径
        }
        $url="upload/".$_SESSION["user_id"]."/";//记录路径
        if (file_exists($url.$_FILES["file"]["name"]))//当文件存在
        {
            echo $_FILES["file"]["name"] . " already exists. ";
            //存在则开始删除图片后 继续上传
            $res = unlink($url.$_FILES["file"]["name"]);
            if($res){
                echo "Now modify the pic of ".$user_id;
                $url=$url.$_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"],$url);
                echo "Modify success!" . $url;
            }
            else{
                    echo "can not delete the pic! some thing wrong";
            }
        }
        else//当文件不存在 直接存
        {
            $url=$url.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],$url);
            echo "Stored in: " . $url;
        }
    }
 }
else
{
    echo "Invalid file";
}
?>

<html>
<body>
<br><br>
<img src="<?php echo $url;?>">
</body>
</html>