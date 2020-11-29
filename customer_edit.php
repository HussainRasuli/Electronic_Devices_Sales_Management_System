<?php require_once("connection.php");?>
<?php 
     $customer = mysql_query("SELECT * FROM customer WHERE customer_id=" . $_GET["customer_id"]);
       $row_customer = mysql_fetch_assoc($customer);
 
    if(isset($_POST["customer_name"])){
	  $name = $_POST["customer_name"];
	  $address = $_POST["address"];
	  $phone = $_POST["phone"];
	  $email = $_POST["email"];

		
    $result = mysql_query("UPDATE customer SET customer_name='$name',address='$address',phone='$phone',email='$email' WHERE customer_id=" . $_GET["customer_id"],$con);
	
	if($result){
	   header("location:customer_list.php?edit=done");
	}
	else{
	   header("location:customer_edit.php?error=notedit&customer_id=" . $_GET["customer_id"]);
	}
	
	 
	}
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
   <h1>ویرایش مشتری</h1>
</div>
<div class="panel-body">

   <?php if(isset($_GET["error"])) { ?>
   <div class="alert alert-danger text-center">
   <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
   تغییرات انجام نشد !
   </div>
   <?php } ?>

    <form method="post">
	 
	 <div class="input-group">
	 <span class="input-group-addon"> 
	    نام مشتری
	 </span>
	 <input value="<?php echo $row_customer["customer_name"]; ?>" type="text" name="customer_name" class="form-control">
	 </div>
	 
	 <div class="input-group">
	 <span class="input-group-addon"> 
	    آدرس
	 </span>
	 <input value="<?php echo $row_customer["address"]; ?>"type="text" name="address" class="form-control">
	 </div>
	 
	 <div class="input-group">
	 <span class="input-group-addon"> 
	    تلیفون
	 </span>
	 <input value="<?php echo $row_customer["phone"]; ?>"type="text" name="phone" class="form-control">
	 </div>
	 
	 <div class="input-group">
	 <span class="input-group-addon"> 
	    ایمیل
	 </span>
	 <input value="<?php echo $row_customer["email"]; ?>" type="text" name="email" class="form-control">
	 </div>
 
     <input type="submit" value="ذخیره نمودن" class="btn btn-primary">
    </form>
</div>
</div>
<?php require_once("footer.php");?>