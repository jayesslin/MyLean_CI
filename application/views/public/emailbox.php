<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/21
 * Time: 21:39
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/leanevent.css "/>
    <script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>

<div>
    <form id="form1" action="##" method="post" onsubmit="return false">
    <table width="100%" style="padding-left: 25% ;background-color: #FF9900; padding-right: 25%">
        <tr style="height: 100px;margin-bottom: 20px ;text-align: center;padding-top: 40px;">
            <td width="10%">
                <img src="pic/conf/plant.png"style="vertical-align:middle;display: inline">
            </td>
            <td width="50%">
                <p style="font-size:0.8rem;font-family: Roboto;color: #333333;display: inline"> &nbsp; &nbsp; Registrese para recibir unboletin </p>
            </td>
            <!--不换行！-->
            <td width="40% ">
                <input class="sub_maill_input" id="email" type="text" size="40rem"  placeholder=" Introduce tu correo eleotronlco"  style="font-size:60%;float: left ;height:1.2rem;border-radius: 15px 0px 0px 15px / 15px 0px 0px 15px;font-family: Roboto;">
                <input class="sub_maill_button" onclick="sendemail()" type="submit" value="Suscribir" style="cursor:pointer;background-color: black; float: left; color: #cccccc;border: black; height:1.5rem;border-radius: 0px 15px 15px 0px / 0px 15px 15px 0px;font-family: Roboto;">

            </td>

        </tr>
    </table>
    </form>

</div>
</body>

<script>
function sendemail() {
        var email_addr = $("#email").val();
        $.ajax({
            type: "POST",
            url: "emailboxtest.php" ,
            data: { po_email: "hello"} ,
            contentType: 'application/json; charset=utf-8',
            success: function (data) {
                console.log(data);
            },
            error : function(data) {
                console.log(data.statusText);
                console.log(data);
            }
        });
    }
</script>
</html>
