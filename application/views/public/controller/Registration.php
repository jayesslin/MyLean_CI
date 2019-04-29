<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/10
 * Time: 13:47
 */

	header("Content-Type: text/html; charset=utf-8");
	include ("database/human.php");
	session_start();
	//输入POST非空时赋值
	if (!empty($_POST))
    {
        $_SESSION['number'] = $_POST['number'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['sex'] = $_POST['sex'];
        $_SESSION['pwd'] = $_POST['pwd'];
        $_SESSION['zy'] = $_POST['zy'];
        $_SESSION['subject'] = $_POST['subject'];
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['month'] = $_POST['month'];
        $_SESSION['birth'] = $_POST['birth'];
    }
	if($_SESSION['number']=='' || $_SESSION['name']=='')
    {
        header('Location:index.php');
    }
	//联系数据库
	$hpi = new HttpPostInf();
	//调用静态函数方法 “::” 1-学生
	$result = Human::id_vf($_SESSION['name'],$_SESSION['pwd'],1);
	if($result!=-1) { //-1表示没有用户
        echo "<script>alert('抱歉,您提交的用户名id已存在!');window.history.go(-1)</script>";
        session_destroy();
        exit();
    }
	if($result==-1) { //插入数据库
        $sql = "INSERT INTO Student_Info (SInf_ID,SInf_Name,SInf_Sex,SInf_Maj,SInf_Eym,SInf_Pwd,SInf_Email,SInf_Score,Sinf_Bir) VALUES (";
        $sql .= "'".$_SESSION['number']."',";
        $sql .= "'".$_SESSION['name']."',";
        $sql .= "'".$_SESSION['sex']."',";
        $sql .= "'".$_SESSION['subject']."',";
        $sql .= "'".$_SESSION['year'].$_SESSION['month']."',";
        $sql .= "'".$_SESSION['pwd']."',";
        $sql .= "'".$_SESSION['email']."',";
        $sql .= "'0',";  //分数非空
        $sql .= "'".$_SESSION['birth']."'";
        $sql .= ");";

        //echo $sql;
        $hgi=new HttpPostInf();
        $result=$hgi->doquery('1',$sql);
        //echo $result;
        if($result=='error'){ //添加失败
            echo "<script>alert('抱歉,您注册用户失败!');window.history.go(-1)</script>";
            session_destroy();
            exit();
        }
	}

