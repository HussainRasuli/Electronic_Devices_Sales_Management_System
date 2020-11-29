<?php require_once("connection.php");
      require_once("restrict.php");
?>

<?php 
    if(isset($_POST["customer_name"])){
	  $name = $_POST["customer_name"];
	  $address = $_POST["address"];
	  $phone = $_POST["phone"];
	  $email = $_POST["email"];
	
	 $result = mysql_query("INSERT INTO customer VALUES(NULL,'$name','$address','$phone','$email')",$con);
	    if($result){
		    header("location:customer_list.php?add=done");
	}
	    else{
		   header("location:customer_add.php?error=notadd");
		}
	}
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
   <h1>ثبت مشتری جدید</h1>
</div>
<div class="panel-body">

<?php if(isset($_GET["error"])) { ?>
   <div class="alert alert-danger text-center">
    <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
    مشتری ثبت نشد !
   </div>
<?php } ?>
    <form method="post">
	 
	 <div class="input-group">
	 <span class="input-group-addon"> 
	    نام مشتری
	 </span>
	 <input type="text" name="customer_name" class="form-control">
	 </div>
	 
	 <div class="input-group">
	 <span class="input-group-addon"> 
	    آدرس
	 </span>
	 <input type="text" name="address" class="form-control">
	 </div>
	 
	 <div class="input-group">
	 <span class="input-group-addon"> 
	    تلیفون
	 </span>
	 <input type="text" name="phone" class="form-control">
	 </div>
	 
	 <div class="input-group">
	 <span class="input-group-addon"> 
	    ایمیل
	 </span>
	 <input type="text" name="email" class="form-control">
	 </div>
 
     <input type="submit" value="ثبت نمودن" class="btn btn-primary">
    </form>
</div>
</div>
<?php require_once("footer.php");?>