<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/10
 * Time: 15:21
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in NOW</title>
    <link rel="stylesheet" href="css/leanevent.css "/>
</head>
<body>
<!--header file load-->
<div class="header"></div>
<!--header file load over-->


<div style="height:300px; ">
    <div class="pic1">
        <div style="padding: 100px 18% 40px 18%; text-align: center">
            <p style="font-size:2.4em;font-family: Roboto;color: #333333">INICIAR SESIÓN</p>
            <p style="font-size:1.5em;text-align: center;color: #333333" ><a href="Homepage.html">INICIO</a> &nbsp;&nbsp; INICIAR SESIÓN</p>
        </div>
    </div>
</div>


<div style="width: 100%; height: 500px;">
    <div style="  height: 330px;margin: 100px 20% 200px 20%;background-color:#C0C0C0 ">
        <form method="post" id="form1" action="##" onsubmit="return false">
        <h1 style="font-family:Roboto;padding-left:20px;padding-top:10px;margin-bottom: 0px">Iniciar Sesión</h1>
            <div style="font-family:Roboto;padding-left:20px;width:45%;display: inline-block">

                <h2>Nombre de Usuario</h2>
                <input class="login" type="text" id="name" name="name" placeholder=" Nombre de Usuario o Correo"  size="55rem" style="height:2rem;font-family: Roboto;">
            </div>
            <div style="padding-left:20px;width:45%;display: inline-block">
                <h2>Contraseña</h2>
                <input class="login"type="password" id="password" name="password" placeholder=" Contraseña" size="55rem" style="height:2rem;font-family: Roboto;">
            </div>
        </form>
        <div style="margin: 20px 0px 20px 0px;text-align: center">
            <a onclick="Show()">Oivido su contraseña?</a>
        </div>
        <div style="margin: 10px 0px 40px 0px;text-align: center">
            <button type="submit"  size="60" onclick="insert()"style=" cursor:pointer;width:60px;border:none;height:30px;color: white;background-color: #FFC300; border-radius:15px; "> Entra </button>
            <p id="a" style="color: red"></p>
        </div>
    </div>
</div>


<!--promption box -->
<div id="shade" class="c1 hide"></div>
<div id="modal" class="c2 hide" style="padding: 10px">
    <h2 >Recuperar su Contrasena</h2>
    <hr/>
    <h2>Corrco</h2>
    <input type="text" size="58" placeholder=" Correo"  style="height:35px;font-family: Roboto;">
    <hr style="margin-top: 30px;margin-bottom: 30px"/>
    <div style="text-align: right">
        <input type="button" style=" cursor:pointer;width:60px;border:none;height:30px; border-radius:15px; "value="Cerrar" onclick="Hide();">
        <input type="button" style=" cursor:pointer;width:60px;border:none;height:30px;color: white;background-color: #FFC300; border-radius:15px; "  value="Enviar">
        <!--<button type="submit"  size="60" style=" cursor:pointer;width:60px;border:none;height:30px;color: white;background-color: #FFC300; border-radius:15px; "> Enviar </button>-->
    </div>
</div>


<!--footer file load-->
<div class="footer" style="position: relative"></div>
<!--footer file load over-->
</body>
<style>
div.pic1{
    background: url("./pic/loginBG1.jpg")no-repeat;
        width:99%;
        height:300px;
        background-size:100% 100%;
        position:absolute;
        filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg-login.png'/*,sizingMethod='scale'*/);
    }
    /*promption*/
    .hide{
    display: none;
}
    .c1{
    position: fixed;
    top:0;
    bottom: 0;
    left:0;
    right: 0;
    background: rgba(0,0,0,.5);
    z-index: 2;
    }
    .c2{
    background-color: white;
        position: fixed;
        width: 400px;
        height: 250px;
        top:30%;
        left: 50%;
        z-index: 3;
        margin-top: -150px;
        margin-left: -200px;
        border-radius: 6px;
    }


</style>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    var session_name;
$(document.body).css({
        "overflow-x":"hidden",
        /*"overflow-y":"hidden"*/
    });

function insert() {

    var email = $("#name").val();

    var password = $("#password").val();

    if(email==""&&password=="")
    {document.getElementById("a").innerHTML="Please fill all fields";
        return false;}
    $.ajax({
        type: "POST",
        /*url: "./controller/login.php" ,*/
        url: "./controller/logincontroller.php" ,
        dataType:"JSON",
        data:{
            "email":email,
            "password":password,
        },
        //data: $('#form1').serialize(),
        success: function (data) {
            console.log(data);
            if(data==1){
                document.getElementById("a").innerHTML="Success";

                window.location.href="Login_home.php";
            }else if(data==2){
                document.getElementById("a").innerHTML="Success";

                window.location.href="Login_home.php";
            }
            else if(data==3){
                document.getElementById("a").innerHTML="Success";

                window.location.href="Agent_home.php";
            }
            else if(data ==-1){
                document.getElementById("a").innerHTML="Wrong password! ";

            } else{
                document.getElementById("a").innerHTML="Username is not exist! ";
            }
        }

        },
    );
}
</script>
<script src="js/head-foot.js"></script>
<script src="js/prompt.js"></script>

</html>