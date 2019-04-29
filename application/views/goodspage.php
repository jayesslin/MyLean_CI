<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/19
 * Time: 22:06
 */
$db_servername = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name="lin_lean";

$db_tablename = "goods";
$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
$sql =  "select * from $db_tablename";
$res = mysqli_query($conn,$sql);
$count = 0;
/*if(mysqli_num_rows($res) > 0){
    while ($row = mysqli_fetch_assoc($res)) {
        $pic_addr =  $row['goods_pic'];
        $goods_name = $row['goods_name'];
        $goods_price=$row['goods_price'];
        $goods_desc=$row['goods_desc'];
    }
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy from us </title>
    <link rel="stylesheet" href="css/leanevent.css "/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

</head>
<body>
<!--header file load-->
<div class="header"></div>
<!--header file load over-->

<!--pic1-->
<div style="height: 200px;">
    <div class="pic1">
        <div style="padding: 40px 18% 40px 18%; text-align: center">
            <p style="font-size:2.2em;font-family: Roboto;color: #333333">COMPRAR</p>
            <p style="font-size:1.5em;text-align: center" ><a href="Homepage.html">Inicio</a> &nbsp;&nbsp;  COMPRAR BOLETOS</p>
        </div>
    </div>
</div>

<!--text are   with line -->
<div style="height: 170px">
    <!--draw a line!!!!!!-->
    <div style="text-align: center;padding-top:30px;padding-bottom:0px ">
        <hr style="vertical-align:middle;margin:8px;width:100px;height:1px;border:0px;background-color:#FFC300;color:#FFC300;display: inline-block"/>
        <h1 style="display: inline-block"> NUESTROS EVENTOS</h1>
        <hr style="vertical-align:middle;margin:8px;width:100px;height:1px;border:0px;background-color:#FFC300;color:#FFC300;display: inline-block"/>
    </div>
    <p style="font-size:1.2em; text-align: center;padding: 0px 20% 0px 20%">Tu asistencia es importante para nosotros visitanos en los eventos qu estamos realizando.
    </p>
</div>


<div style="width: 100%;padding: 0 20% 0 20%;">
    <div class="goods" style="width: 50rem;">
<table  >
<tr style="height:16rem; width: 100%" >
<?php if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        $pic_addr =  $row['goods_pic'];
        $goods_name = $row['goods_name'];
        $goods_price=$row['goods_price'];
        $goods_desc=$row['goods_desc'];
        $goods_id=$row['goods_id'];
        $count+=1;
        ?>

            <td width="25%" style="text-align:center;padding-left: ">
                <div class="limi_img">
                  <!--  <a href="goods_detail.php?goods_id=<?php /*echo $goods_id */?>"><img class="dis" src="<?php /*echo $pic_addr*/?>.png">-->
                    <a href="<?php echo base_url()?>index.php/home/goods?goods_id=<?php echo $goods_id ?>">
                        <img class="limi_img" src="<?php echo base_url(); ?>application/views<?php echo $pic_addr?>.png">
                        <h3><?php echo $goods_name?></h3>
                    </a>
                    <p>$<?php echo $goods_price ?></p>
                    <p style="display: none"><?php echo $goods_id ?></p>
                </div>
            </td>

        <?php
        if ($count%4==0){
            echo "</tr>";
            echo "<tr style=\"height:15rem; \">";
        }
    }

}
?>
</tr>
</table >
    </div>
</div>

<style>
    h3{
      font-family: Roboto;
        font-size: 1.0em;
    }
    .L_center_img img {
        max-height:250px;
        max-width: 200px;
        vertical-align:middle;
    }


    .limi_img{ width:14rem; height:25rem}
    .limi_img img{width:10rem; height:18rem}

</style>

<!--subscribe-->
<div class="subscribe" style="position: relative"></div>


<!--footer file load-->
<div class="footer" style="position: relative"></div>
<!--footer file load over-->

</body>
<style>
    div.pic1 {
        /* height: auto; width: auto\9; width:100%;*/
        background: url("<?php echo base_url(); ?>application/views/pic/goodsbg1.jpg")no-repeat;
        width:99%;
        height:200px;
        background-size:100% 100%;
        position:absolute;
        filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg-login.png'/*,sizingMethod='scale'*/);
    }
</style>
<script src="js/jquery-3.3.1.min.js"></script>

</html>
