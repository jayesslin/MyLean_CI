<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/22
 * Time: 22:01
 */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/leanevent.css "/>
</head>
<body>

<div width="100% " style="padding-left: 25%;background-color: #FF9900;">
    <form method="post" id="form1" name="form1"action="##" onsubmit="return false" >
        <table  style="  padding-right: 25%">
            <tr style="height: 100px;margin-bottom: 20px ;text-align: center;padding-top: 40px;">
                <td width="20%">
                    <img src="<?php echo base_url(); ?>application/views/pic/conf/plant.png"style="vertical-align:middle;display: inline">
                </td>
                <td width="40%">
                    <p style="font-size:0.8rem;font-family: Roboto;color: #333333;display: inline"> &nbsp; &nbsp; Registrese para recibir unboletin </p>
                </td>
                <!--不换行！-->
                <td width="40% ">

                    <div style="width: 150%;">
                        <input class="sub_maill_input" type="text" size="40%;"  name="email" placeholder=" Introduce tu correo eleotronlco"  style="font-size:60%;float: left ;height:1.2rem;border-radius: 15px 0px 0px 15px / 15px 0px 0px 15px;font-family: Roboto;">
                        <input class="sub_maill_button" type="submit" onclick="sendemail()" value="Suscribir" style="cursor:pointer;background-color: black; float: left; color: #cccccc;border: black; height:1.5rem;border-radius: 0px 15px 15px 0px / 0px 15px 15px 0px;font-family: Roboto;">

                    </div>
                    <style>

                        .sub_maill_input input::-webkit-input-placeholder {
                            /* placeholder颜色  */

                            /* placeholder字体大小  */
                            font-size: 0.5rem;
                        }
                    </style>
                </td>

            </tr>
        </table>
    </form>

</div>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    function sendemail() {
        $.ajax({
            type: "POST",
            url: "controller_email.php",
            data: $('#form1').serialize(),
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    alert("failed");
                } else if (data == 1) {
                    alert("succeed!");
                } else {
                    alert(data);
                }
            },
            error: function (data) {
            }
        })
    }
</script>


</html>
