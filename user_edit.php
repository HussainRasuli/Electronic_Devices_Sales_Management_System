<?php require_once("connection.php");?>
<?php 
      if(isset($_POST["username"])){
		  $username = $_POST["username"];
		  $password = $_POST["password"];
		  
 $result = mysql_query("UPDATE users SET username='$username', password= PASSWORD('$password') WHERE user_id=" . $_GET["user_id"],$con);
	    if($result){
			header("location:user_edit.php?edit=done");
		}
		else{
			header("location:user_edit.php?error=notdone");
		}
	}


?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
   <h1>تغییر رمز ورود</h1>
</div>
<div class="panel-body">

  <?php if(isset($_GET["edit"])) { ?>
     <div class="alert alert-success text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	     حساب و رمز ورود شما تغییر کرد !
	 </div>
  <?php } ?>

  <?php if(isset($_GET["error"])) { ?>
     <div class="alert alert-danger text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	     حساب و رمز شما تغییر نکرد !
	 </div>
  <?php } ?>



   <form method="post">
     <div class="input-group">
	   <span class="input-group-addon">نام حساب شما :</span>
	   <input type="text" name="username" class="form-control">
	 </div>
	 <div class="input-group">
	   <span class="input-group-addon">رمز جدید:</span>
	   <input type="password" name="password" class="form-control">
	 </div>
	 
	 <input type="submit" value="ثبت نمودن" class="btn btn-primary">
   </form> 
</div> 
</div>
<?php require_once("footer.php");?>