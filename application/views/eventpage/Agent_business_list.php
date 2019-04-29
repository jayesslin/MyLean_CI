<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/23
 * Time: 16:44
 */

$name =  $_SESSION["name"];
$user_id =  $_SESSION["user_id"];
$user_type=$_SESSION['user_type'];
/*echo "individual";*/
//$name = $_GET["email"];

$db_servername = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name="lin_lean";
$db_tablename = "eventdetail";
$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
$sql =  "SELECT user.user_type ,user.user_id ,user.first_name as name, user.user_phone as phone,user.pic_address, user.user_email as email,eventdetail.event_name,eventdetail.event_response,eventdetail.event_detail_id from user,eventdetail where user.user_type = 2 and  user.user_id =eventdetail.user_id order by eventdetail.event_detail_id";
$res = mysqli_query($conn,$sql);
$url = base_url();
?>


<!DOCTYPE html>
<html lang="en">
<title>Individual</title>
<head>
    <meta charset="UTF-8">
    <title>Hello &nbsp;<?php $name?></title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/head.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/leanevent.css "/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/foot.css" type="text/css" />

</head>
<div style="font-family:Roboto;width: 100%;background-color: #90C7E3">
    <table   style="padding-left: 10%;">


        <td style="text-align:center;width: 20%;">
            <img src="<?php echo base_url(); ?>application/views/pic/headsign.png" style="vertical-align:middle;" ><b >LEANEVENTOS</b>
        </td>

        <?php if($user_type==3){
            echo " <td style=\"width: 47%; text-align: right\" ><a  href=\"$url/index.php/eventcontroller/agent\" >Inicio</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"$url/index.php/eventcontroller/indi_list\" > Lista de Voluntarios</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"$url/index.php/eventcontroller/busi_list\" > Lista de Fundaciones</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"$url/index.php/eventcontroller/event_list\" > Eventos</a></td>";
        }else{
            echo " <td style=\"width: 67%; text-align: right\" ><a  href=\"$url/index.php//\" >Inicio</a></td>";
        }

        ?>
        <td style="padding-left: 10px" >&nbsp; <a  href="<?php echo $url?>/index.php/eventcontroller/profile" > <?php echo $name?></a></td>
        </tr>
    </table>
</div>

<div style="height: 150px ;padding-top:75px;text-align: center">
    <h1 style="font-size: 2.5em">Lista de Voluntarios</h1>
</div>


<div style="width: 100%; height: 40rem; ">
    <table style="width:100%;padding: 0% 10% 0% 10%" border-color="#D3C5C2">
        <tr style="height:30px;background-color:#D3C5C2;">
            <th style="width:50%;text-align: center">NOMBRE DE VOLUNTARIO</th>
            <th style="width:10%;">CORREO</th>
            <th> TELEFONO</th>
            <th> EVENTO</th>
            <th style="width:15%"> RESPONSABLE</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($res)){
            $user_pic_id = $row["user_id"];
            $pic_address= $row["pic_address"];
            if($pic_address==null){
                $pic_address ="/upload/default/business";
            }
            ?>
            <tr style="height:30px; ">
                <td style="padding-left: 10px">
                    <div class="limi_img" style="display:inline;margin-right: 1rem;"><img class="limi_img"  src="<?php echo base_url(); ?>application/views<?php echo $pic_address?>.png" style="vertical-align: middle"></div>
                    <?php  if($row['name']==null){
                        echo "unknow";
                    }

                    echo $row["name"];
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    if($row['email']==null){
                        echo "<p>unknown</p>";
                    }echo $row["email"]; ?>
                </td>
                <td style="text-align: center">
                    <?php
                    if($row['phone']==null){
                        echo "<p>unknown</p>";
                    }
                    echo $row["phone"]; ?>
                </td>
                <td style="text-align: center">
                    <?php
                    if($row['event_name']==null){
                        echo "<p>unknown</p>";
                    }
                    echo $row["event_name"]; ?>
                </td>
                <td style="text-align: center">
                    <?php
                    if($row['event_response']==null){
                        echo "<p>unknown</p>";
                    }
                    echo $row["event_response"]; ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <style>
        .limi_img{ width:3rem; height:3rem}
        .limi_img img{width:3rem; height:3rem}
    </style>
</div>


</html>