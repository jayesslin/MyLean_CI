<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/22
 * Time: 22:22
 */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
</head>
<body>


<!--pic1-->
<div style="height: 200px;">
    <div class="pic1">
        <div style="padding: 40px 18% 40px 18%; text-align: center">
            <p style="font-size:2.2em;font-family: Roboto;color: #333333">CONTACTO</p>
            <p style="font-size:1.5em;text-align: center" ><a href="Homepage.html">Inicio</a> &nbsp;&nbsp;  CONTACTO</p>
        </div>
    </div>
</div>


<!--new version using table -->
<!--text area-->
<table style="width: 70%; height:300px;margin: 20px 15% 0px 15%; ">

    <th>Informacion del contacto</th>
    <tr>
        <td style="height: 80px;width: 23%;vertical-align: middle;text-align: center">
            <img src="<?php echo base_url(); ?>application/views/pic/conf/location (1).png"style="vertical-align:middle;"> 198 west 21th street suite 721 New York NY 10016
        </td>
        <td style="height: 80px;width: 23%;vertical-align: middle;text-align: center">
            <img src="<?php echo base_url(); ?>application/views/pic/conf/phone%20(1).png"style="vertical-align:middle;"> <a href="tel:1235 2355 98">+ 1235 2355 98</a>
        </td>
        <td style="height: 80px;width: 23%;vertical-align: middle;text-align: center">
            <img src="<?php echo base_url(); ?>application/views/pic/conf/plant_16inch.png"style="vertical-align:middle;"> <a href="mailto:info@diazapps.com">info@diazapps.com</a>
        </td>
        <td style="height: 80px;width: 23%;vertical-align: middle;text-align: center">
            <img src="<?php echo base_url(); ?>application/views/pic/conf/earth (1).png"style="vertical-align:middle;"> <a href="www.diazapps.com">diazapps.com</a>
        </td>
    </tr>
    <!--four icon line -->
    <th>LEAN en las redes sociales</th>
    <tr>
        <td style="height: 80px;width: 23%;vertical-align: middle;text-align: center">
            <img src="<?php echo base_url(); ?>application/views/pic/facebook.png"style="vertical-align:middle;"><p><a href="facebook.com">LEAN Ayuda Humanitaria</a></p>
        </td>
        <td style="height: 80px;width: 23%;vertical-align: middle;text-align: center">
            <img src="<?php echo base_url(); ?>application/views/pic/twitter.png"style="vertical-align:middle;"><p><a href="twitter.com">@LeanEmergentie</a></p>
        </td>
        <td style="height: 80px;width: 23%;vertical-align: middle;text-align: center">
            <img src="<?php echo base_url(); ?>application/views/pic/instagram.png"style="vertical-align:middle;"><p><a href="instagram.com">@LEANAyudaHumanitaria</a></p>
        </td>
        <td style="height: 80px;width: 23%;vertical-align: middle;text-align: center">
            <img src="<?php echo base_url(); ?>application/views/pic/correo.png"style="vertical-align:middle;"><p><a href="gmail.com">Lean Emergentie@gmail.com</a></p>
        </td>
    </tr>
</table>
<!--area box -->
<!--<form name="form1" action="<?php /*echo base_url(); */?>index.php/home/contactus"  id="form1" method="post" >-->
<div style="background-color: #90C7E3;"><p style="color: #a61717"><?php echo validation_errors(); ?></p></div>

    <?php echo form_open('/index.php/home/contactus'); ?>
    <table style="font-family:Roboto;text-align:left;width: 70%; padding-left: 20px;margin: 20px 15% 180px 15%;background-color:#C0C0C0 ">
        <th style="padding-top:10px;font-size: 1.3em"><h1>Estar en contacto</h1></th>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
        <tr>
            <td><input type="text" name="firstname"  placeholder=" Tu Nombre"  style="width: 85%;height:35px;font-family: Roboto;"></td>
            <td><input type="text" name="lastname" placeholder=" Tu Apellido"  style="width: 90%;height:35px;font-family: Roboto;"></td>
        </tr>
        <tr>
            <th>Correo</th>
        </tr>
        <tr>
            <td colspan="2"><input  type="text" name="email" placeholder=" Tu Correr electeonico"  style="width:95%;height:35px;font-family: Roboto;"></td>
        </tr>
        <tr>
            <th>Tema</th>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="subject"  placeholder=" Su asunto de este mensajeo."  style="width:95%;height:35px;font-family: Roboto;"></td>
        </tr>
        <tr>
            <th>Mensaje</th>
        </tr>
        <tr>
            <td colspan="2"><input type="textarea" name="content" placeholder=" Su asunto de este mensajeo."  style="width:95%; height:140px;font-family: Roboto;"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><input type="submit" value=" Enviar mensaje "  size="60" style="margin-top:20px ;margin-bottom: 45px;cursor:pointer;border:none;height:30px;color: white;background-color: #FFC300; border-radius:15px; ">
            </td>
        </tr>
    </table>
</form>


</body>
<style>
    div.pic1 {
        /* height: auto; width: auto\9; width:100%;*/
        background: url("<?php echo base_url(); ?>application/views/pic/contactbg1.jpg")no-repeat;
        width:99%;
        height:200px;
        background-size:100% 100%;
        position:absolute;
        filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg-login.png'/*,sizingMethod='scale'*/);
    }
    th{
        margin-top: 15px;

        font-size: 1.5em;
    }
    input{
        margin-top: 12px;
        margin-bottom: 17px;
    }
</style>
<script src="js/jquery-3.3.1.min.js"></script>
<!--<script>
    function insert(){
        $.ajax({
            type: "POST",
            url: "./controller/contactusController.php" ,
            data: $('#form1').serialize(),
            success: function (data) {
                console.log(data);
                if(data==1) {
                    alert("Succeed!");
                }
            },
            error : function(data) {
            }
        });
    }
    $(function(){

        $(".header").load("head.html");
        $(".footer").load("foot.html");
        $(".subscribe").load("subscribebox.html");
    });
</script>-->
</html>
