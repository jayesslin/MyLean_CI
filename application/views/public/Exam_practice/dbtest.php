<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/7
 * Time: 14:53
 */
$db_servername = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name="exam_test";
//$conn = mysqli_connect($db_servername,$db_name,$db_username,$db_password);


//echo $sd[1];
function insert($f_name,$l_name,$weight)
{
    $db_servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name="exam_test";
    $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
    $sql = "INSERT INTO test1 (f_name,l_name,weight) values (?,?,?)";
    $stam = $conn->prepare($sql);
    //$sd=array("lin","daoyan","123");
    $stam->bind_param('sss', $f_name,$l_name,$weight);
    $stam->execute();
}
function query()
{
    $db_servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name="exam_test";
    $conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
    $sql = "SELECT * from test1";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo $row['user_id'];
            echo $row['f_name'];
            echo $row['l_name'];
            echo $row['weight'];
            echo `<hr/>`;
        }
    }
}

function update($user_id,$val){
    $db_servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name="exam_test";
    $conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
    $sql="UPDATE test1 SET f_name = '$val' WHERE user_id = '$user_id'";
    if(mysqli_query($conn,$sql)){
     echo "改成功！";
    }
    else{
        echo "worng";
    }
}
function delete($user_id){
    $db_servername = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name="exam_test";
    $sql = "delete from test1 where user_id = '$user_id' ";
    $conn = mysqli_connect($db_servername,$db_username,$db_password,$db_name);
    if(mysqli_query($conn,$sql)){
        echo "删成功！";
    }
    else{
        echo "worng";
    }
}

insert("daoyan1","daoyan2","1545");
update(0,"yeysyeu");
query();
echo "删除";
delete(2);
query();