<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/17
 * Time: 22:17
 */

?>
<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomePage/Inicio</title>
</head>
<body >
<div id="primary" style="width: 100%">
    <!--header file load-->
    <div class="header"></div>
    <!--header file load over-->
    <!--<img src="<?php /*echo base_url().'application/views/public/pic/bg1.jpg'; */?>" >-->
    <a href="<?php /*echo base_url().'application/views/public/Contactpage.html'; */?>">fafafaf</a>
    <div class="background_long">
        <div  style="height: 60% ">
            <div class="pic1" style="margin-bottom: 50%">

            </div>
        </div>
    </div>
    <!--question-->
    <div style="height: 40%;margin-top: 30%">

        <!--draw a line!!!!!!-->
        <div style="text-align: center;padding-top:30px;padding-bottom:0px ">
            <hr style="vertical-align:middle;margin:8px;width:100px;height:1px;border:0px;background-color:#FFC300;color:#FFC300;display: inline-block"/>
            <h1 style="display: inline-block">¿QUE HACEMOS?</h1>
            <hr style="vertical-align:middle;margin:8px;width:100px;height:1px;border:0px;background-color:#FFC300;color:#FFC300;display: inline-block"/>
        </div>


        <div style="padding: 0px 10% 0px 10%">La asociación civil LEAN fue creada con el objetivo de ayudar, a través de acciones concretas, a nuestros conciudadanos en Venezuela ante la grave escasez de medicinas e insumos médicos en que se encuentra el país.
            Nuestra misión consiste en recolectar ayuda médico sanitaria en delegaciones en España y, a través de agentes de transporte, llevarlos a Venezuela para que otras asociaciones se encarguen de su distribución. De esta manera aportamos nuestro granito de arena ayudando a llevar asistencia humanitaria a Venezuela.
            Somos una asociación sin fines de lucro, dedicada a la defensa de los Derechos Humanos.
        </div>
    </div>


    <!--count-->
    <div style=" margin-top: 5%; height: 25%;background-color: #FF9900;width: 100%" >
        <div style="padding-left: 15%;padding-right: 15%">
            <table width="100%" style="text-align: center">
                <tr style="margin: 30px;">
                    <td width="33%">
                        <h1>478</h1>
                    </td>
                    <td width="33%">
                        <h1>60.0000</h1>
                    </td>
                    <td width="33%">
                        <h1>45</h1>
                    </td>
                </tr>
                <tr  style="margin: 30px;">
                    <td>
                        <h2 >VOLUNTARIOS</h2>
                    </td>
                    <td>
                        <h2 >PERSONAS BENEFICIADAS</h2>
                    </td>
                    <td>
                        <h2>ALIADOS</h2>
                    </td>

                </tr>
            </table>
        </div>
    </div>

    <!--pic2-->
    <div class="background_short">
        <div style="height: 35%;">
            <div class="pic2">
                <div style="padding: 5% 18% 5% 18%; text-align: center">
                    <p style="font-size:1.8em;font-family: Roboto;color: #333333">"La injusticia, en cualquier parte, es una amenaza a la justicia en todas partes."</p>
                    <p style="font-style: italic;text-align: right" >Martin Luter King</p>
                </div>
            </div>
        </div>
    </div>
    <!--logo and text -->
    <div style="height: 40%;width: 100%;margin-top:15%; margin-bottom: 5%">

        <!--draw a line!!!!!!-->
        <div style="text-align: center;padding-top:0px;padding-bottom:0px ">
            <hr style="vertical-align:middle;margin:8px;width:100px;height:1px;border:0px;background-color:#FFC300;color:#FFC300;display: inline-block"/>
            <h1 style="display: inline-block">ALIADOS</h1>
            <hr style="vertical-align:middle;margin:8px;width:100px;height:1px;border:0px;background-color:#FFC300;color:#FFC300;display: inline-block"/>
        </div>


        <div id="wrapper" >
            <table>
                <tr>
                    <td> <img src="<?php echo base_url(); ?>application/views/pic/homepage_logo1.PNG"></td>
                    <td> <img src="<?php echo base_url(); ?>application/views/pic/homepage_logo2.PNG"></td>
                    <td> <img src="<?php echo base_url(); ?>application/views/pic/homepage_logo3.PNG"></td>
                    <td> <img src="<?php echo base_url(); ?>application/views/pic/homepage_logo4.PNG"></td>
                </tr>
            </table>
        </div>
    </div>

    <!--subscribe-->
   <!-- <div class="subscribe" style="position: relative"></div>-->
    <!--footer file load-->
  <!--  <div class="footer" style="position: relative"></div>-->
    <!--footer file load over-->
</div>
</body>

<!--<script>
    $(function(){
        $(".header").load("head.html");
        $(".footer").load("foot.html");
        $(".subscribe").load("subscribebox.html");
    });
    /*forbit overflow honrizontal*/
    $(document.body).css({
        "overflow-x":"hidden",
        /*"overflow-y":"hidden"*/
    });
</script>-->
<style>
    div.pic1 {
        /* height: auto; width: auto\9; width:100%;*/
        background: url("<?php echo base_url(); ?>application/views/pic/bg1.jpg")no-repeat;
        width:99%;
        height:60%;
        background-size:100% 100%;
        position:absolute;
        filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg-login.png'/*,sizingMethod='scale'*/);
    }
    div.pic2 {
        /* height: auto; width: auto\9; width:100%;*/
        background: url("<?php echo base_url(); ?>application/views/pic/bg2.jpg")no-repeat;
        width:99%;
        height:30%;
        background-size:100% 100%;
        position:absolute;
        filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg-login.png'/*,sizingMethod='scale'*/);
    }

</style>
</html>
