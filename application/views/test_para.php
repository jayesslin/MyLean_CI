<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/4/22
 * Time: 14:25
 */
?>
你好
<!--<form method="post" action="<?php /*echo base_url()*/?>/usercontroller/test_para1" >
    <label>你帅吗</label><input name="shuai">
    <label>酷</label><input name="cool">
    <label></label>
    <input type="submit">
</form>
<script src="<?php /*echo base_url(); */?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php /*echo base_url(); */?>/application/views/js/jquery-3.3.1.min.js"></script>

<img src="<?php /*echo base_url(); */?>/application/views/public/pic/AboutusBG1.jpg">
--><?php /*echo base_url(); */?>


<a href="<?php echo base_url(); ?>/welcome">dadadad</a>

<!--<form id="form1" action="##" method="post" onsubmit="return false">-->
    <form method="post" id="form1" action="##" onsubmit="return false">
    <label>酷酷酷</label><input id="c1" name="c1">
    <label>嘎嘎嘎</label><input id="c2" name="c2">
    <label></label>
    <!--<input type="submit" onclick="check()">-->
    <button type="submit" onclick="check()">dianwo </button>
</form>
<script src="<?php echo base_url(); ?>application/views/js/jquery-3.3.1.min.js"></script>
<script>
    function check() {
        var email = $("#c1").val();

        var password = $("#c2").val();


        $.ajax({
                type: "POST",
                /*url: "./controller/login.php" ,*/
                url: "<?php echo base_url(); ?>index.php/usercontroller/test_ajax" ,
                dataType:"JSON",
                data:{
                    "cool1":email,
                    "cool2":password,
                },
                //data: $('#form1').serialize(),
                success: function (data) {
                    console.log(data);

                       alert(data)

                },
                 error : function(data) {
                    alert("错误："+JSON.stringify(data));
                    }

            },
        );
    }
    </script>