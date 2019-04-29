<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/22
 * Time: 21:38
 */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/head.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/leanevent.css "/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">


</head>
<style>


</style>
<body >
<!--
<div style="width: 100%;background-color: #90C7E3">
    <div style="height: 80px;" >
        &lt;!&ndash;<div style="margin-left:65px;display:inline-block;">
            <img src="pic/headsign.png" style="vertical-align:middle;" ><b style="font-size: large">LEANEVENTOS</b>
        </div>&ndash;&gt;
        <div id="pichead">
            <img src="pic/headsign.png" style="vertical-align:middle;" ><b style="font-size: large">LEANEVENTOS</b>
        </div>
        <ul id="ulhead"  >
            <li class="head"><a class="header" href="Homepage.html" >Inicio</a></li>
            <li class="head"><a  class="header" href="AboutusPage.html" >Quienes Somos</a></li>
            <li class="head"><a class="header" href="#" >Blog</a></li>
            <li class="head"> <a  class="header" href="Signuppage.html"  >Registrate</a> </li>
            <li class="head"> <a class="header" href="Contactpage.html"  >Contacto</a> </li>
            <li class="head"> <a  class="header" href="Login.php"  >Iniciar Seesion</a> </li>
            <li class="head"> <a  class="header" href="Goodspage.html"  >Comprar Boletos</a> </li>
        </ul>
    </div>
</div>
-->

<div class="nav" style="width: 100%;">

    <!--<div style="margin-left:65px;display:inline-block;">
        <img src="pic/headsign.png" style="vertical-align:middle;" ><b style="font-size: large">LEANEVENTOS</b>
    </div>-->
    <table   style="padding-left: 10%;padding-right: 10%">
        <td>
        <td style="text-align:center;width: 20%;">
            <img src="<?php echo base_url(); ?>application/views/pic/headsign.png" style="vertical-align:middle;" ><b >LEANEVENTOS</b>
        </td>

        <td style="width: 35%; text-align: right" ><a class="header" href="<?php echo base_url(); ?>index.php/home/" >Inicio</a></td>
        <td style="padding-left: 10px" ><a  class="header" href="<?php echo base_url(); ?>index.php/home/aboutus" >Quienes Somos</a></td>
        <td style="padding-left: 10px"><a class="header" href="http://daoyanlin.uta.cloud/wordpress/" >Blog</a></td>
        <td style="padding-left: 10px"><a  class="header" href="<?php echo base_url(); ?>index.php/home/signup" >Registrate</a> </td>
        <td style="padding-left: 10px"><a class="header" href="<?php echo base_url(); ?>index.php/home/contactus"  >Contacto</a> </td>
        <td style="padding-left: 10px"> <a  class="header" href="<?php echo base_url(); ?>index.php/home/login"  >Iniciar Seesión</a> </td>
        <td style="padding-left: 10px"><a  class="header" href="<?php echo base_url(); ?>index.php/home/buyfromus"  >Comprar Boletos</a> </td>

        </tr>
    </table>

</div>
<style>
    table{
        table-layout: fixed;
    }
</style>
</body>
</html>
