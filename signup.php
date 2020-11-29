<?php require_once("connection.php");?>
<?php
    if(isset($_POST["username"])){
         $username = $_POST["username"];
		 $email    = $_POST["email"];
         $password = $_POST["password"];
		 
    $result = mysql_query("INSERT INTO users VALUES(NULL,'$username','$email',PASSWORD('$password'))",$con);
     if($result){
		    header("location:signup.php?account=created");
	}
	    else{
		   header("location:singup.php?account=error");
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
  <h1>ایجاد حساب جدید</h1>
</div>
<div class="panel-body">

<form method="post" >

   <?php if(isset($_GET["account"])) { ?>
      <div class="alert alert-success text-center">
      <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
             حساب شما موفقانه ساخته شد.
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
    <span class="input-group-addon">  ایمیل: </span>
<input class="form-control" type="email" name="email">
</div> 

<div class="input-group">
    <span class="input-group-addon"> رمز: </span>
<input class="form-control" type="password" name="password">
</div>
    
    <input type="submit" value="ایجاد کردن" class="btn btn-primary ">&nbsp;&nbsp;&nbsp;
	 <a href="index.php">ورود به سیستم</a>
	
</div>	
</form>

</div>
</div>
</div>
</div>
</body>
</html>