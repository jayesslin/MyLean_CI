<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/20
 * Time: 13:02
 */
require("./controller/config.php");

global $db_username,$db_password,$db_name,$db_servername;
$db_tablename = "goods";
$conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);

$goods_id=$_GET['goods_id'];
$sql= "select * from goods where goods_id='$goods_id'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) > 0){
    while($row=mysqli_fetch_assoc($res)){
        $goods_name = $row['goods_name'];
        $goods_desc= $row['goods_desc'];
        $goods_price= $row['goods_price'];
        $pic_addr= $row['goods_pic'];
        $manager_id= $row['manager_id'];
        $goods_star= $row['goods_star'];
        $goods_sponsors= $row['goods_sponsors'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy from us </title>
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

<!--goods -->
<div  class="goods_dt" style="height: 40%;padding: 5% 25% 0 30%;">
<table>
    <tr>
   <td>
       <img   style="margin-right: 50px"src="<?php echo $pic_addr?>.png">

   </td>
    <td style="vertical-align: top;">
        <h3><?php echo $goods_name?></h3>
        <h3 style="text-align: left">$ <?php echo $goods_price?></h3>
        <p style="text-align: left"><?php echo $goods_desc?></p>
        <br/>
        <p style="text-align: left">Numero de Entradas</p>
        <div style="width:150px; background-color: #FFFFFF">
            <input type="button"  onclick="sub()" style="border:none;width:30px;background-color: #cccccc;padding: 5px;" value="-">
            <!--居中问题-->
            <div style="padding-left:27%; display:inline;"><h3  id="goods_quan"name="goods_quan" style="display:inline;text-align: right">1 </h3></div>
            <input type="button" onclick="add()" style="border:none;width:30px;float:right;padding: 5px;background-color: #cccccc" value="+">
        </div>

        <div style="cursor:pointer;margin-top:18px;padding-left:20px;background-color: #FF9900 ;width: 100px;">
            <img style="display:inline;vertical-align: middle"src="pic/conf/shopingcar.png">
            <h4 style="display:inline;color: #FFFFFF;font-size: 0.8em" >Comprar </h4>
        </div>
    </td>
</tr>
</table>
</div>
<div  style="height: 40%;padding: 5% 25% 5% 30%;">
    <div id="g1"  onmouseover="changeColor()" onmouseout="changeBack()" class="label" >
        DESCRIPCION
    </div>
    <div id="g2" onmouseover="changeColor2()" onmouseout="changeBack2()" class="label" >
        ENCARGADOS
    </div>
    <div id="g3" onmouseover="changeColor3()" onmouseout="changeBack3()" class="label" >
        PATROCINANTES
    </div>
    <textarea  cols=50 rows=10 id="texta" class= "goods_desc" readonly="readonly"style="padding-left: 3rem;">
        <?php echo $goods_sponsors?>
    </textarea>
</div>



<!--subscribe-->
<div class="subscribe" style="position: relative"></div>


<!--footer file load-->
<div class="footer" style="position: relative"></div>
<!--footer file load over-->

</body>
<style>
    div.pic1 {
        /* height: auto; width: auto\9; width:100%;*/
        background: url("./pic/goodsbg1.jpg")no-repeat;
        width:99%;
        height:200px;
        background-size:100% 100%;
        position:absolute;
        filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg-login.png'/*,sizingMethod='scale'*/);
    }
    .goods_dt img {
        max-height:260px;
        max-width: 250px;
        vertical-align:middle;
    }
    h3{
        font-family: Roboto;
        font-size: 1.0em;
    }

    .label{
        width: 7rem;
        height: 3rem;
        padding: 1em 2rem 1em 2em;
        text-align: center;
        border: #C0C0C0;background-color: #e6e6e6;
        margin:0.5em;
        display: inline;
    }
    .goods_desc{
        margin: 3rem 0 6rem 0;
        padding: 2rem 0 2rem 0;
        width:40rem;
        height: 10rem;
        border-style:solid;
        font-family: Roboto;
        color: #595959;
    }
</style>





<script src="js/jquery-3.3.1.min.js"></script>
<script>
    $(function(){
        /*公共部分
         * 导航栏
         * footer CopyRight
         */
        /*$(".header").load("headerpage.html");
        $(".footer").load("footerpage.html");*/
        $(".header").load("head.html");
        $(".footer").load("foot.html");
        $(".subscribe").load("subscribebox.html");
    });
    $(document.body).css({
        "overflow-x":"hidden",
        /*"overflow-y":"hidden"*/
    });
    function sub() {
        if(parseInt(document.getElementById('goods_quan').innerHTML)>1){
            document.getElementById("goods_quan").innerHTML=parseInt(document.getElementById("goods_quan").innerHTML)-1;
        }
    }
    function add() {
        document.getElementById('goods_quan').innerHTML=parseInt(document.getElementById('goods_quan').innerHTML)+1;
    }
    function changeColor(){
        var a = document.getElementById("g1");
        a.style.backgroundColor="#FF9900";
        a.style.color="white";
        document.getElementById("texta").innerHTML="<?php echo $goods_sponsors?>";
    }
    function changeColor2(){
        var a = document.getElementById("g2");
        a.style.backgroundColor="#FF9900";
        a.style.color="white";
        document.getElementById("texta").innerHTML="SADSADSDSSDSADXCAQW";
    }
    function changeColor3(){
        var a = document.getElementById("g3");
        a.style.backgroundColor="#FF9900";
        a.style.color="white";
        document.getElementById("texta").innerHTML="<?php echo $goods_name?>";
    }
    function changeBack() {
        var a = document.getElementById("g1");
        a.style.backgroundColor="#e6e6e6";
        a.style.color="#595959";
    }
    function changeBack2() {
        var a = document.getElementById("g2");
        a.style.backgroundColor="#e6e6e6";
        a.style.color="#595959";
    }
    function changeBack3() {
        var a = document.getElementById("g3");
        a.style.backgroundColor="#e6e6e6";
        a.style.color="#595959";
    }

</script>
</html>