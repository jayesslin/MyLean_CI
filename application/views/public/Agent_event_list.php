<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/24
 * Time: 13:42
 */

session_start();
$name =  $_SESSION["name"];
$user_id =  $_SESSION["user_id"];
$user_type=$_SESSION['user_type'];
/*echo "individual";*/
//$name = $_GET["email"];

require("./controller/config.php");

global $db_username,$db_password,$db_name,$db_servername;
$db_tablename = "event";
$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
$sql =  "select * from $db_tablename";
$res = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<title>Individual</title>
<head>
    <meta charset="UTF-8">
    <title>Hello &nbsp;<?php $name?></title>
    <link rel="stylesheet" href="css/head.css" type="text/css" />
    <link rel="stylesheet" href="css/leanevent.css "/>
    <link rel="stylesheet" href="css/foot.css" type="text/css" />
   

</head>
<div style="font-family:Roboto;width: 100%;background-color: #90C7E3">
    <table   style="padding-left: 10%;">


        <td style="text-align:center;width: 20%;">
            <img src="pic/headsign.png" style="vertical-align:middle;" ><b >LEANEVENTOS</b>
        </td>

        <?php if($user_type==3){
            echo " <td style=\"width: 35%; text-align: right\" ><a  href=\"Agent_home.php\" >Inicio</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"Agent_Individual_list.php\" > Lista de Voluntarios</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"Agent_business_list.php\" > Lista de Fundaciones</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"Agent_event_list.php\" > Eventos</a></td>";
        }else{
            echo " <td style=\"width: 67%; text-align: right\" ><a  href=\"Homepage.html\" >Inicio</a></td>";
        }

        ?>
        <td style="padding-left: 10px" >&nbsp; <a  href="Profilepage.php" > <?php echo $name?></a></td>
        </tr>
    </table>
</div>

<div style="height: 10rem ;padding-top:75px;text-align: center">
    <h1 style="font-size: 2.5em">Lista de Eventos</h1>
</div>


<div style="text-align: right;padding-right: 20%">
    <a href="Agent_event_append.php"><button type="submit"  size="60" style=" cursor:pointer;width:80px;border:none;height:30px;color: white;background-color: 	#2E8B57; border-radius:15px; "> Confirmar </button></a>
</div>
<div style="width: 100%; height: 25rem; ">
    <table style="width:100%;padding: 0% 10% 0% 10%" border-color="#D3C5C2">
        <tr style="height:30px;background-color:#D3C5C2;">
            <th style="width:50%;text-align: center">DETALLES DEL EVENTOS</th>
            <th style="width:10%;"> LUGAR</th>
            <th> MODIFICAR </th>
            <th> ELIMINAR</th>
            <th style="width:15%"> ASISTENCIA</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($res)){ ?>
            <tr style="height:30px; ">
                <td style="padding-left: 10px">
                  <!--  <img src="<?php /*echo $row["pic_address"]; */?>" style="vertical-align: middle;">-->
                    <div class="limi_img" style="display:inline;margin-right: 1rem;"><img class="limi_img"  src="<?php echo $row["pic_address"]?>.png" style="vertical-align: middle"></div>
                    <?php echo $row["event_name"]; ?>
                </td>
                <td style="text-align: center">
                    <?php echo $row["place"]; ?>
                </td>
                <td style="text-align: center">
                    <?php echo $row["start_time"]; ?>
                </td>
                <td style="text-align: center">
                    <div style="width: 100%;padding-left: 30%;padding-right: 30%">
                        <div type="submit"  size="60" onclick="modifyEvent(<?php echo $row["event_id"]; ?>)"style="padding-top: 0.8rem; cursor:pointer;width:3.5rem;border:none;height:1.8rem;color: white;background-color: #FFC300; border-radius:20px; ">
                            <img src="pic/conf/modify_16inch.png">
                        </div>
                    </div>
                </td>
                <td style="text-align: center">
                    <div style="width: 100%;padding-left: 30%;padding-right: 30%">
                        <form method="post" id="form1" name="form1"action="##" onsubmit="return false">
                        <div type="submit"  size="60" onclick="deleteEvent(<?php echo $row["event_id"]; ?>)"style=" padding-top: 0.8rem; cursor:pointer;width:3.5rem;border:none;height:1.8rem;color: white;background-color:red; border-radius:20px; ">
                            <img src="pic/conf/delete_16inch.png">
                        </div>
                        </form>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>


<style>
    .limi_img{ width:3rem; height:3rem}
    .limi_img img{width:3rem; height:3rem}
</style>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    function deleteEvent(id) {
        var event_id = id;
        if(confirm("Are you sure Delete this event? Event id : "+id)){
            $.ajax({
                type: "POST",
                url: "./controller/Agent_Event_edit_delete_controller.php" ,
                dataType:"JSON",
                data:{
                    "event_id":event_id
                },
                success: function (data) {
                    console.log(data);
                    if(data){
                        alert("Successfully delete!")
                    }else {
                        alert("Failed  delete!")
                    }
                },
                error : function(data) {
                }
            });

        }else{

            alert("no");
        }
    }
    function modifyEvent(id) {
        window.location.href="Agent_event_edit.php?id="+id;
    }
    function addEvent() {
        if(confirm("Are you sure Delete this event? Event id : ")){
            alert("yes")
        }else{
            alert("no");
        }
    }

</script>
        
        
        
        
<div class="footer"><p  class="footerbox footerfont">copyright ©2019 All rights reserved | This web is made with ♡ by <a class="footer" href="https://www.diazapp.com">DiazApps</a></p>
</div>
</div>
<div>
    <a href="#top"><img class="wrap" src="pic/conf/up-square-fill.png" ></a>
</div>


</html>