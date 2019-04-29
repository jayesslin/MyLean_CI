<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/24
 * Time: 14:23
 */

$name =  $_SESSION["name"];
$user_id =  $_SESSION["user_id"];
$user_type=$_SESSION['user_type'];
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
    <form width="100%"  id="form1" name="form1" action="<?php echo base_url()?>/index.php/Eventedit/appendevent?type=add" onsubmit="return appendEvent()" method="post" enctype="multipart/form-data" >
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


<div style="height:300px; ">
    <div class="pic1">
        <div style="padding: 100px 18% 40px 18%; text-align: center">
            <p style="font-size:2.4em;font-family: Roboto;color: #333333">REGISTRO DE EVENTO</p>
            <p style="font-size:1.5em;text-align: center;color: #333333" ><a href="Agent_event_list.php">EVENTOS</a> &nbsp;&nbsp; REGISTRO</p>
        </div>
    </div>
</div>



<div id="modala" style="margin-top:5rem;padding:  0 20% 7%  15% ; " >
    <form width="100%"  id="form1" name="form1" action="Profilecontroller.php" onsubmit="return Reedit()" method="post" enctype="multipart/form-data" >
        <table style="width:100%;padding-left: 20px; background-color: #C0C0C0">
            <tr>
                <th style="text-align: left">
                    <h1>Registro de Evento</h1>
                </th>
                <th>
                    <p id="a"></p>
                </th>
            </tr>

            <tr>

                <td width="50%">
                    <h2>Nombres</h2>
                </td>
            </tr>
            <tr >
                <td width="50%" colspan="2">
                    <input type="text"  name="e_name" id="e_name" placeholder="Nombre del Evento"  style="width:98%;height:35px;font-family: Roboto;">
                </td>
                <td width="50%" rowspan="3" >
                    <div class="limit_img" style="padding-left:20%;padding-right:5%;vertical-align: middle;" id="localImag"><img  class="limi_img" id="preview" width=-1 height=-1 style=" diplay:none;" />
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                    <h2>Responsable</h2>
                </td>

            </tr>
            <tr>

                <td width="50%" colspan="2" >
                    <input type="text"  name="e_response_name" id="e_response_name" placeholder="Nombre del Responsable" style="width:98%;height:35px;font-family: Roboto;">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="margin-top:6px;text-align: center">

                    <label style="cursor:pointer;height:30px;border-radius: 15px; background-color: #FFC300 ;color:white;padding: 10px;" for="file">Seleccionar Imagen</label>
                    <input type="file" id="file" name="file"style="position:absolute;clip:rect(0 0 0 0);"onchange="javascript:setImagePreview(this);"/>
                <!--    <input placeholder=" Ciudad" type="file" name="file" id="file" style="border:none; height:30px;color: white;background-color: #FFC300; border-radius:15px;"  onchange="javascript:setImagePreview(this);">-->
                </td>
            </tr>

            <tr style="margin:0px 3px 3px 3px">
                <td colspan="3" width="50%">
                    <h2>Lugar</h2>
                </td>
            </tr>
            <tr style="margin-bottom: 10px">
                <td colspan="3" width="100%"><input  id="e_address"name="e_address"  placeholder=" Direccion del Lugar del Eventos"  style="width:97%;height:35px;font-family: Roboto;"></td></td>
            </tr>

        </table>
        <table style="width:100%;padding-left: 20px; background-color: #C0C0C0">
            <tr style="margin:6px">
                <td colspan="1" width="33%"><h2>Fecha</h2></td>
                <td colspan="1" width="33%"><h2>Hora</h2></td>
                <td colspan="1" width="33%"><h2>Valor de Boleto</h2></td>
            </tr>
            <tr style="margin-bottom: 15px">
                <td colspan="1"width="33%" ><input type="date" name="e_date" id="e_date" placeholder=" 00/00/0000"  style="width:90%;height:35px;font-family: Roboto;"></td>
                <td colspan="1" width="33%" ><input type="time"  name="e_time" id="e_time" placeholder=" 00/00"  style="width:90%;height:35px;font-family: Roboto;"></td>
                <td colspan="1"width="33%"><input type="text"  name="e_price" id="e_price" placeholder=" $000.00"  style="width:90%;height:35px;font-family: Roboto;"></td>
            </tr>

            <tr>
                <td colspan="3" style="text-align:center;">
                    <input type="submit" type="submit" value=" Guardar" style=" cursor: pointer;border:none;height:2.5rem;width:4rem;color: white;background-color: #FFC300; border-radius:20px;margin-top: 2rem;margin-bottom: 2rem;" class="button"/>
                   <!-- <input type="submit" name="submit" value="Submit" />-->
                </td>
            </tr>

        </table>
    </form>
</div>


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
        background: url("<?php echo base_url(); ?>application/views/pic/signupbg1.jpg")no-repeat;
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
<script>
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
        }else{
            alert("Image must be 'png'! ");
            return false;
        }
    }



    function appendEvent() {

        var e_name = $("input[name='e_name']").val()
        var e_response_name = $("input[name='e_response_name']").val();
        var e_address = $("input[name='e_address ']").val();
        var e_date = $("input[name='e_date ']").val();
        var e_time = $("input[name='e_time']").val();
        var e_price = $("input[name='e_price']").val();



        var formData = new FormData();
        formData.append('file', $('#file')[0].files[0]);
        //var file = $("#file")[0].files[0];




        //var reg_phone1=
        if(e_name==""||e_address==""||e_response_name==""||e_date==""||e_time==""||e_price==""||formData==null)
        {document.getElementById("a").innerHTML="Please fill all fields";
            return false;
        }else{
            return true;
        }



    }
</script>
</html>