
<?php require_once("connection.php");?>
<?php
    if(isset($_POST["username"])){
         $username = $_POST["username"];
         $password = $_POST["password"];
    $result = mysql_query("SELECT * FROM users WHERE username='$username' AND password= PASSWORD('$password')",$con);
    if(mysql_num_rows($result) == 1){
	   $row_result = mysql_fetch_assoc($result);
		 $_SESSION["user_id"] = $row_result["user_id"];
		 header("location:home.php");
	}
	else {
		 header("location:index.php?login=failed");
	}
 }
?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	
	<meta charset="utf-8">
</head>
<body style="background-image:url(images/logo/22.jpg);background-repeat:no-repeat;">

<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-top:200px; padding-right:350px;">
<div class="panel panel-primary">
<div class="panel-heading">
  <h1>ورود به سیستم مدیریت</h1>
</div>
<div class="panel-body">

<form method="post" >

   <?php if(isset($_GET["login"])) { ?>
      <div class="alert alert-danger text-center">
      <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
             نام یا رمز اشتباه است !
      </div>
    <?php } ?>

  <?php if(isset($_GET["session"])) { ?>
  <div class="alert alert-warning text-center">
  <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
    لطفا ابتدا به سیستم وارد شوید !
   </div>
  <?php } ?> 
  
  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
<div class="input-group">
    <span class="input-group-addon">  نام: </span>
<input class="form-control" type="text" name="username">
</div>

<div class="input-group">
    <span class="input-group-addon"> رمز: </span>
<input class="form-control" type="password" name="password">
</div>
    
    <input type="submit" value="ورود" class="btn btn-primary col-md-4" style="text-align:center">&nbsp;&nbsp;&nbsp;
	<a href="signup.php">ساختن حساب جدید</a>
</div>	
</form>
</div>
</div>
</div>
</div>
</body>
</html>









