<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/13
 * Time: 14:33
 */
session_start();
$name =  $_SESSION["name"];
$user_id =  $_SESSION["user_id"];
$user_type = $_SESSION["user_type"];
require("./controller/config.php");
global $db_username,$db_password,$db_name,$db_servername;
$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
// 检测连接
if ($conn->connect_error) {
    die("Failed conn: " . $conn->connect_error);
}
$sql = "select * from user where user_id = '$user_id'";
$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
        $firstline =$row["first_name"];
        $secondline= $row["last_name"];
        $user_address= $row["user_address"];
        $user_phone =$row["user_phone"];
        $pic_address= $row["pic_address"];
        $user_name = $row['user_name'];
        $user_email=$row['user_email'];
    }
}
if($user_type==2){
    $sql_bs = "select * from user_business where business_id = '$user_id'";
    $res_bs = mysqli_query($conn,$sql_bs);
    if(mysqli_num_rows($res_bs) > 0){
        while($row_bs = mysqli_fetch_assoc($res_bs)){
            if($row_bs["business_name"]){
                $firstline =$row_bs["business_name"];
            }else{
                $firstline=" 1";
            }
            if($row_bs["business_Repre"]){
                $secondline= $row_bs["business_Repre"];
            }else{
                $secondline=" 2";
            }
        }
    }
}
if($user_type==3){
    $sql_ag = "select * from user_agent where agent_id = '$user_id'";
    $res_ag = mysqli_query($conn,$sql_ag);
    if(mysqli_num_rows($res_ag) > 0){
        while($row_ag = mysqli_fetch_assoc($res_ag)){
            if($row_ag["agent_name"]){
                $firstline =$row_ag["agent_name"];
            }else{
                $firstline=" 1";
            }
            if($row_ag["agent_num"]){
                $secondline= $row_ag["agent_num"];
            }else{
                $secondline=" 2";
            }
        }
    }
}
if($pic_address==null){
    $pic_address ="/upload/default/user";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Individual</title>
</head>
<body>

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


<div style="height:300px; ">
    <div class="pic1">
        <div style="padding: 100px 18% 40px 18%; text-align: center">
            <p style="font-size:2.4em;font-family: Roboto;color: #333333">PERFIL</p>
            <p style="font-size:1.5em;text-align: center;color: #333333" ><a href="Homepage.html">INICIO</a> &nbsp;&nbsp; PERFIL</p>
        </div>
    </div>
</div>
<div style="font-size :1.3em;padding: 7% 15% 7% 15% ;height:13rem; ">
        <h1 style="padding-left: 20px">Tu Informacion del Perfil</h1>
    <table style="padding-left: 20px">
        <tr >
            <td width=" 20%" >
                <li style="margin-top: 15px;margin-bottom: 15px"><img src="pic/conf/book-fill (1).png" style="vertical-align: middle"><p style="display:inline;text-align: left"> &nbsp; <?php echo $firstline?></p> </li>
                <li style="margin-top: 15px;margin-bottom: 15px"><img src="pic/conf/book-fill (1).png" style="vertical-align: middle"><p style="display:inline;text-align: left"> &nbsp; <?php echo $secondline?></p> </li>
                <li style="margin-top: 15px;margin-bottom: 15px"><img src="pic/conf/user (1).png" style="vertical-align: middle"><p style="display:inline;text-align: left"> &nbsp; <?php echo $user_name?></p> </li>
            </td>
            <td width=" 20%" >
                <li style="margin-top: 15px;margin-bottom: 15px"> <img src="pic/conf/location_32inch.png" style="vertical-align: middle"><p style="display:inline;text-align: left"> &nbsp; <?php echo $user_address?></p> </li>
                <li style="margin-top: 15px;margin-bottom: 15px"><img src="pic/conf/phone_32inch.png" style="vertical-align: middle"><p style="display:inline;text-align: left"> &nbsp; <?php echo $user_phone?></p> </li>
                <li style="margin-top: 15px;margin-bottom: 15px"><img src="pic/conf/message_32inch.png" style="vertical-align: middle"><p style="display:inline;text-align: left"> &nbsp; <?php echo $name?></p> </li>
            </td>
            <td  width=" 20%" style=" ;text-align: right">
                <div style="height:13rem;padding-left: 5rem;" class="limi_img">
                <img class="limi_img" src=".<?php echo $pic_address?>.png" style="vertical-align: middle">
                </div>

            </td>
        </tr>
    </table>
</div>
<div id="modala" style="padding:  0 20% 7%  15% ; " >
    <form width="100%"  id="form1" name="form1" action="Profilecontroller.php" onsubmit="return Reedit()" method="post" enctype="multipart/form-data" >
        <table style="width:100%;padding-left: 20px; background-color: #C0C0C0">
            <tr>
                <th style="text-align: left">
                    <h1>Estar en contacto</h1>
                </th>
                <th>
                    <p id="a"></p>
                </th>
            </tr>
            <?php if($user_type==1){
                $firstname_comRepre_input="Apellido";
                $lastname_comName_input="Nombres";
                $firstname_comRepre= " Tu&nbsp;Apellido";
                $lastname_comName="Tu&nbsp;Nombre";
            }elseif ($user_type==2){
                $firstname_comRepre_input="Nombres de la Fundacion";
                $lastname_comName_input="Nombres y Appellido";
                $firstname_comRepre= "Tu&nbsp;Nombre&nbsp;y&nbsp;Apellido";
                $lastname_comName="Nombre&nbsp;de&nbsp;la&nbsp;Fundacion";
            }elseif ($user_type==3){
                $firstname_comRepre_input="Nomero de Registro del Inscrito";
                $lastname_comName_input="Nombres";
                $firstname_comRepre= "Nomero&nbsp;de&nbsp;Registro&nbsp;del&nbsp;nscrito";
                $lastname_comName="Tu&nbsp;Nombre";
            }
            ?>
            <tr>

                <td width="50%">
                    <h2><?php echo $lastname_comName_input;?> </h2>
                </td>
            </tr>
            <tr >
                <td width="50%" colspan="2">
                    <input type="text"  name="lastname" id="lastname" placeholder=<?php echo $lastname_comName;?> value="<?php if($firstline!=null){
                        echo $firstline;
                    }?>" style="width:98%;height:35px;font-family: Roboto;">
                </td>
                <td width="50%" rowspan="3" >
                    <div class="limit_img" style="padding-left:20%;padding-right:5%;vertical-align: middle;" id="localImag"><img  class="limi_img" id="preview" width=-1 height=-1 style=" diplay:none;" />
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                    <h2><?php echo $firstname_comRepre_input;?></h2>
                </td>
               <!-- <?php /*if($user_type==1){
                    echo "<td>";
                    echo "<h2>Apellidos</h2>";
                    echo "</td>";
                } */?>
                --><?php /*if($user_type==2){
                    echo "<td>";
                    echo "<h2>Nombres de la Fundacion</h2>";
                    echo "</td>";
                } */?>
            </tr>
            <tr>

                <td width="50%" colspan="2" >
                    <input type="text"  name="firstname" id="firstname" placeholder=<?php echo $firstname_comRepre;?> value="<?php if($secondline!=null){
                        echo $secondline;
                    }?>" style="width:98%;height:35px;font-family: Roboto;">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="margin-top:6px;text-align: center">

                    <label style="cursor:pointer;height:30px;border-radius: 15px; background-color: #FFC300 ;color:white;padding: 10px;" for="file">Seleccionar Logo</label>
                    <input type="file" id="file" name="file"style="position:absolute;clip:rect(0 0 0 0);"onchange="javascript:setImagePreview(this);"/>
                <!--    <input placeholder=" Ciudad" type="file" name="file" id="file" style="border:none; height:30px;color: white;background-color: #FFC300; border-radius:15px;"  onchange="javascript:setImagePreview(this);">-->
                </td>
            </tr>

            <tr style="margin:0px 3px 3px 3px">
                <td colspan="3" width="50%">
                    <h2>Corrco</h2>
                </td>
            </tr>
            <tr style="margin-bottom: 10px">
                <td colspan="3" width="100%"><input type="email" id="email"name="email" value="<?php if($user_email!=null){
                        echo $user_email;
                    }?>" placeholder=" Correo"  style="width:97%;height:35px;font-family: Roboto;"></td></td>
            </tr>

        </table>
        <table style="width:100%;padding-left: 20px; background-color: #C0C0C0">
            <tr style="margin:6px">
                <td colspan="1" width="33%"><h2>Telefono</h2></td>
                <td colspan="1" width="33%"><h2>Usuario</h2></td>
                <td colspan="1" width="33%"><h2>Contraseña</h2></td>
            </tr>
            <tr style="margin-bottom: 15px">
                <td colspan="1"width="33%" ><input type="text" name="phone" id="Telefono" placeholder=" Telefono" value="<?php if($user_phone!=null){
                        echo $user_phone;
                    }?>" style="width:90%;height:35px;font-family: Roboto;"></td>
                <td colspan="1" width="33%" ><input type="text"  name="username" id="Usuario" placeholder=" Nombre de Usuario" value="<?php if($user_name!=null){
                        echo $user_name;
                    }?>" style="width:90%;height:35px;font-family: Roboto;"></td>
                <td colspan="1"width="33%"><input type="text"  type="password"name="password" id="Contrasena" placeholder=" Contraseña"  style="width:90%;height:35px;font-family: Roboto;"></td>
            </tr>
            <tr >
                <td >
                    <button  style="width:60px;border:none;height:30px;color: white;background-color: #FFC300; border-radius:15px;margin-top: 20px" class="button" > &nbsp;Nota: &nbsp;</button>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="text-align: left">
                        Solo puede cambiar los datos( Telefono, Contraseña y Logo )
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center;">
                    <input type="submit" type="submit" value=" Guardar Cambios " style=" cursor: pointer;border:none;height:30px;color: white;background-color: #FFC300; border-radius:15px;margin-top: 3px;margin-bottom: 20px;" class="button"/>
                   <!-- <input type="submit" name="submit" value="Submit" />-->
                </td>
            </tr>

        </table>
    </form>
</div>

<!--up photo-->
<!--<div>
    <form action="Profilecontroller.php" method="post" enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file" style="border-radius:15px;border:none;" onchange="javascript:setImagePreview(this);"/>
        <div id="localImag"><img id="preview" width=-1 height=-1 style="diplay:none" /></div>
        <br>
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>-->



<!--footer file load-->
<div class="footer" style="position: relative"></div>
<!--footer file load over-->

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
$(function(){
    $(".header").load("head.html");
    $(".footer").load("foot.html");
    $(".subscribe").load("subscribebox.html");
});
    $(document.body).css({
        "overflow-x":"hidden",
        /*"overflow-y":"hidden"*/
    });
function setImagePreview(file)
{
    var fileTypes = ".png";
    var filePath = file.value;
    var fileEnd = filePath.substring(filePath.indexOf("."));
    var docObj=document.getElementById("file");
    var imgObjPreview=document.getElementById("preview");
    if(fileEnd==fileTypes){
        //读取图片数据
        var filePic = file.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target.result;
            //加载图片获取图片真实宽度和高度
            var image = new Image();
            image.onload=function(){
                var width = image.width;
                var height = image.height;
                if( fileTypes != fileEnd){
                    alert("Image size should be limit in 200 * 200! ");
                    return false;
                }
                if (width <= 200 | height <= 200){
                    //火狐下，直接设img属性
                    imgObjPreview.style.display = 'block';
                    imgObjPreview.style.width = '200px';
                    imgObjPreview.style.height = '200px';
                    //imgObjPreview.src = docObj.files[0].getAsDataURL();
                    //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                    imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
                    return true;
                }else {
                    alert("Image size should be limit in 200 * 200! ");
                    file.value = "";
                    return false;
                }
            };
            image.src= data;
        };
        reader.readAsDataURL(filePic);
        document.getElementById('hide0').classList.add('hide');
        document.getElementById('hide1').classList.add('hide');
    }else{
        alert("Image must be 'png'! ");
        return false;
    }
}

function Reedit() {

    var email = $("input[name='email']").val()
    var password = $("input[name='password']").val();
    var phone = $("input[name='phone']").val();
    var username = $("input[name='usename']").val();
    var lastname= $("input[name='lastname']").val();
    var firstname = $("input[name='firstname']").val();


    var formData = new FormData();
    formData.append('file', $('#file')[0].files[0]);
    //var file = $("#file")[0].files[0];
    var reg_mail = new RegExp("(^[\\w.\\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\\.)+[a-z]{2,3}$)");

    var regexObj = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;



    //var reg_phone1=
    if(email==""||phone==""||firstname==""||password==""||formData==""||username==""||lastname=="")
    {document.getElementById("a").innerHTML="Please fill all fields";
        return false;
    }
    if(!reg_mail.test(email))
    {document.getElementById("a").innerHTML="Your E-mail format is not correct";
        /* ^[\w.\-]+@(?:[a-z0-9]+(?:-[a-z0-9]+)*\.)+[a-z]{2,3}$*/
        return false;}
    if (regexObj.test(phone)) {
        $("input[name='phone']").val().replace(regexObj, "($1) $2-$3");
    } else {
        document.getElementById("a").innerHTML="Your Phone format is not correct";
        return false;
    }
    if(password.length > 16 || password.length < 6){
        document.getElementById("a").innerHTML="Password length should be between 6-16 digits ";

        return false;
    }
    return true;

}
</script>



<style>
    .limit_img  {
        max-height:150px;
        max-width: 150px;

    }
    .limit_img img {
        max-height:150px;
        max-width: 150px;

    }

     .limi_img{ width:10rem; height:10em}
    .limi_img img{width:10rem; height:10rem}

    table{
        table-layout: fixed;
    }
    div.pic1{
         background: url("./pic/profilebg1.jpg")no-repeat;
         width:99%;
         height:300px;
         background-size:100% 100%;
         position:absolute;
         filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg-login.png'/*,sizingMethod='scale'*/);
     }
    li{
        list-style: none;
    }
</style>
</html>