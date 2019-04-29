<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/27
 * Time: 15:31
 */

class EventEdit extends CI_Controller
{

    public function __construct() {
        parent::__construct ();
    }
    public function modify(){
        $this->load->library('session');
        $id = $this->input->get ( 'id' );
        $data['id'] = $id;
        $this->load->view('eventpage/Agent_event_edit',$data);
        $this->load->view('foot');
    }
    public function add(){
        $this->load->library('session');
        $this->load->view('eventpage/Agent_event_append');
        $this->load->view('foot');
    }
    public function delete(){
        $event_id = $this->input->post ( 'event_id' );
        $name =  $_SESSION["name"];
        $user_id =  $_SESSION["user_id"];
        $user_type =$_SESSION["user_type"];
//conn to database
        $db_servername = "127.0.0.1";
        $db_username = "root";
        $db_password = "";
        $db_name="lin_lean";
        $con = mysqli_connect($db_servername, $db_username, $db_password,$db_name);


        $sql_delete_detail="DELETE FROM eventdetail WHERE event_id= '$event_id'";
        $sql_delete_event="DELETE FROM event WHERE event_id= '$event_id'";
        print $sql_delete_event;
        if(mysqli_query($con,$sql_delete_detail)&&
            mysqli_query($con,$sql_delete_event)){
            echo 1;
        }

    }
    public function appendevent(){
        $this->load->library('session');
        $name =  $_SESSION["name"];
        $user_id =  $_SESSION["user_id"];
        $user_type =$_SESSION["user_type"];
//conn to database
        $db_servername = "127.0.0.1";
        $db_username = "root";
        $db_password = "";
        $db_name="lin_lean";
        $conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }

        $event_name =$_POST["e_name"];
        $event_response_id=$_POST["e_response_name"];
        $start_time =$_POST["e_date"];
        $place_time=$_POST["e_time"];
        $event_fees=$_POST["e_price"];
        $place=$_POST['e_address'];


        /*$stmt = $conn->prepare("INSERT INTO event (event_name, place,event_response_id, start_time,place_time,event_fees)
         VALUES (?, ?, ?,?, ?,?)");
        $stmt->bind_param("ssssss", $event_name,$place,$event_response_id,$start_time,$place_time,$event_fees);
        $stmt->execute();
        */
        $type=$_GET['type'];

        if($type=='edit'){
            $event_id=$_GET['event_id'];
            $sql = "UPDATE event SET event_name='$event_name' , event_response_id= '$event_response_id' ,start_time ='$start_time' , place_time='$place_time' , event_fees = '$event_fees',place='$place' WHERE event_id ='$event_id'";

            $res = mysqli_query($conn,$sql);
            if (!$res) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }
            mysqli_close($conn);

            if (1)//这个地方可以填写上传文件的限制，比如格式大小要求等，为了方便测试，这里没有写上传限制。
            {
                if ($_FILES["file"]["error"] > 0)
                {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";//获取文件返回错误
                }
                else
                {
                    //打印文件信息
                    echo "upload/event_pic_address/: " . $_FILES["file"]["name"] . "<br />";//获取文件名
                    echo "Type: " . $_FILES["file"]["type"] . "<br />";//获取文件类型
                    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";//获取文件大小
                    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";//获取文件临时地址

                    //自定义文件名称
                    $array=$_FILES["file"]["type"];
                    $array=explode("/",$array);
                    $newfilename=$event_id;//自定义文件名（测试的时候中文名会操作失败）
                    $_FILES["file"]["name"]=$newfilename.".".$array[1];
                    /*$new = new edition();
                    $new->ImageShrink( $_FILES["file"]["tmp_name"] ,50,50);*/


                    if (!is_dir("../upload/event_pic_address/".$event_id))//当路径不穿在
                    {
                        mkdir("../upload/event_pic_address/".$event_id);//创建路径
                    }
                    $url="../upload/event_pic_address/".$event_id."/";//记录路径
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



            echo $event_id;
            echo $type;
        }
        else if($type =='add'){

            $sql_insert = "INSERT INTO `event`(`event_name`,`place`, `event_response_id`, `start_time`,`place_time`,`event_fees`) VALUES ('$event_name','$place','$event_response_id','$start_time','$place_time','$event_fees')";
            //$res = mysqli_query($conn,$sql);
            if ($conn->query($sql_insert) === TRUE) {
                echo 1;
            } else {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }
            $sql_for_eventid= "SELECT * FROM event  ORDER BY event_id DESC LIMIT 1";
            $res = mysqli_query($conn,$sql_for_eventid);
            if(mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $new_event_id =$row['event_id'];
                }
            }
            $pic="./upload/event_pic_address/".$new_event_id."/".$new_event_id;
            $sql = "UPDATE event SET pic_address='$pic'  WHERE event_id ='$new_event_id'";
            $res1 = mysqli_query($conn,$sql);
            if (!$res1) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }else{



                if (1)//这个地方可以填写上传文件的限制，比如格式大小要求等，为了方便测试，这里没有写上传限制。
                {
                    if ($_FILES["file"]["error"] > 0)
                    {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";//获取文件返回错误
                    }
                    else
                    {
                        //打印文件信息
                        echo "upload/event_pic_address/: " . $_FILES["file"]["name"] . "<br />";//获取文件名
                        echo "Type: " . $_FILES["file"]["type"] . "<br />";//获取文件类型
                        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";//获取文件大小
                        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";//获取文件临时地址

                        //自定义文件名称
                        $array=$_FILES["file"]["type"];
                        $array=explode("/",$array);
                        $newfilename=$new_event_id;//自定义文件名（测试的时候中文名会操作失败）
                        $_FILES["file"]["name"]=$newfilename.".".$array[1];
                        /*$new = new edition();
                        $new->ImageShrink( $_FILES["file"]["tmp_name"] ,50,50);*/


                        if (!is_dir("../upload/event_pic_address/".$new_event_id))//当路径不穿在
                        {
                            mkdir("../upload/event_pic_address/".$new_event_id);//创建路径
                        }
                        $url="../upload/event_pic_address/".$new_event_id."/";//记录路径
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

            }
            mysqli_close($conn);
        } else{
            echo $type;
        }

    }

}