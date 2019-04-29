<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/10
 * Time: 15:34
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


</head>
<div style="font-family:Roboto;width: 100%;background-color: #90C7E3">
    <table   style="padding-left: 10%;">


        <td style="text-align:center;width: 20%;">
            <img src="pic/headsign.png" style="vertical-align:middle;" ><b >LEANEVENTOS</b>
        </td>

        <?php if($user_type==3){
            echo " <td style=\"width: 47%; text-align: right\" ><a  href=\"Agent_home.php\" >Inicio</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"Agent_Individual_list.php\" > Lista de Voluntarios</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"Agent_business_list.php\" > Lista de Fundaciones</a></td>";
            echo "<td style=\"padding-left: 10px\" ><a  href=\"#\" > Eventos</a></td>";
        }else{
            echo " <td style=\"width: 67%; text-align: right\" ><a  href=\"Homepage.html\" >Inicio</a></td>";
        }

        ?>
        <td style="padding-left: 10px" >&nbsp; <a  href="Profilepage.php" > <?php echo $name?></a></td>
        </tr>
    </table>
</div>

<div style="height: 150px ;padding-top:75px;text-align: center">
    <h1 style="font-size: 2.5em">Lista de Eventos</h1>
</div>


<div style="width: 100%; height: 30rem;  ">
    <table style="width:100%;padding: 0% 10% 0% 10%" border-color="#D3C5C2">
        <tr style="height:30px;background-color:#D3C5C2;">
            <th style="width:50%;text-align: center">DETALLES DEL EVENTOS</th>
            <th style="width:10%;"> LUGAR</th>
            <th> FECHA</th>
            <th> HORA</th>
            <th style="width:15%"> ASISTENCIA</th>
        </tr>
<?php while($row = mysqli_fetch_assoc($res)){ ?>
        <tr style="height:30px; ">
            <td style="padding-left: 10px">
                <div class="limi_img" style="display:inline;margin-right: 1rem;"><img class="limi_img"  src="<?php echo $row["pic_address"]?>.png" style="vertical-align: middle"></div>
                <?php echo $row["event_name"]; ?>
            </td>
            <td>
                <?php echo $row["place"]; ?>
            </td>
            <td>
                <?php echo $row["start_time"]; ?>
            </td>
            <td>
                <?php echo $row["place_time"]; ?>
            </td>
            <td style="text-align: center">
                <button type="submit"  size="60" onclick="apply(<?php echo $row["event_id"]; ?>)"style=" cursor:pointer;width:80px;border:none;height:30px;color: white;background-color: #FFC300; border-radius:15px; "> Confirmar </button>

            </td>
        </tr>
    <?php
    }
?>
</table>
</div>
<!--footer file load-->
<div class="footer" style="position: relative"></div>

<!--footer file load over-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/head-foot.js"></script>

<style>
    .limi_img{ width:3rem; height:3rem}
    .limi_img img{width:3rem; height:3rem}
</style>
<script>
    function apply(a) {

        $.ajax({
            type: "POST",
            url: "./controller/RegiforEvent.php",
            //dataType: "JSON",
            /*名字不能传  必须要数字*/
            data: {
                "event_id":a,
                "user_id":<?php echo $user_id?>,
            },
            success: function (data) {
                if (data == 1) {
                    console.log(data);
                    window.alert("Thank you for you join!");
                }else{
                    console.log(data);
                    window.alert("you has already in this Event !");
                }
            }
        });
    }
</script>
</html>