<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/23
 * Time: 13:32
 */

$name =  $_SESSION["name"];
$user_id =  $_SESSION["user_id"];
$user_type=$_SESSION['user_type'];
/*echo "individual";*/
//$name = $_GET["email"];

$url = base_url();

?>

<!DOCTYPE html>
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
<body>
<div style="font-family:Roboto;width: 100%; background-color: #90C7E3">
    <table   style="padding-left: 10%;">


        <td style="text-align:center;width: 20%;">
            <img src="<?php echo base_url(); ?>application/views/pic/headsign.png" style="vertical-align:middle;" ><b >LEANEVENTOS</b>
        </td>

      <!--  <?php /*if($user_type==3){
            echo " <td style=\"width: 35%; text-align: right\" ><a  href=\"Agent_home.php\" >Inicio</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"Agent_Individual_list.php\" > Lista de Voluntarios</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"Agent_business_list.php\" > Lista de Fundaciones</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"Agent_event_list.php\" > Eventos</a></td>";
        }else{
            echo " <td style=\"width: 67%; text-align: right\" ><a  href=\"Homepage.html\" >Inicio</a></td>";
        }

        */?>
        <td style="padding-left: 10px" >&nbsp; <a  href="Profilepage.php" > <?php /*echo $name*/?></a></td>-->

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
<div style="height:35rem; ">
    <div class="pic1">

    </div>
</div>





</body>
<style>
    div.pic1 {
        /* height: auto; width: auto\9; width:100%;*/
        background: url("<?php echo base_url(); ?>application/views/pic/Agent_home_bg1.png")no-repeat;
        width:99%;
        height:480px;
        background-size:100% 100%;
        position:absolute;
        filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg-login.png'/*,sizingMethod='scale'*/);
    }
</style>
<script src="<?php echo base_url(); ?>application/views/js/jquery-3.3.1.min.js"></script>

</html>