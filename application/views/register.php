<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>注册</title>
</head>
<body>
<h1>注册</h1>
<form action="<?php echo base_url()?>/index.php/usercontroller/register"
      method="post">
    <table>
        <tr>
            <td>用户名</td>
            <td><input name="name"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input name="password"></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</body>
</html>