<html>
<head>
    <title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('/index.php/usercontroller/form'); ?>



<h5>Password</h5>
<input type="text" name="password" value="" size="50" />

<h5>phone</h5>
<input type="phone" name="phone" value="" size="50" />

<h5>Email Address</h5>
<input type="email" name="email" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>