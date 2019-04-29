<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>注册</title>
</head>
<body>
<h1>登录</h1>
<form action="<?php echo base_url()?>/index.php/usercontroller/login"
      method="post">
    <table>
        <tr>
            <td>用户名</td>
            <td><input name="name"
                       value="<?php if (isset($_REQUEST)&&isset($_REQUEST['name'])) {
                           echo $_REQUEST['name'];
                       }?>"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input name="password" value="<?php if (isset($_REQUEST)&&isset($_REQUEST['password'])) {
                    echo $_REQUEST['password'];
                }?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</body>
</html>