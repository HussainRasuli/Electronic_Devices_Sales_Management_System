<?php require_once("connection.php"); ?>
<?php 

   if(isset($_POST["product_name"])){
         $product_name = $_POST["product_name"];
         $warranty = $_POST["warranty"];
         $unitprice = $_POST["unitprice"];
         $quantity = $_POST["quantity"];
    
	$result = mysql_query("INSERT INTO product VALUES(NULL,'$product_name','$warranty',$unitprice,$quantity)",$con);
      if($result){
	     header("location:product_add.php?add=done");
	  }
     else {
	     header("location:product_add.php?error=notdone");
	 }
   
   
   }

?>


<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
    <h1>ثبت محصول جدید</h1>
</div>
<div class="panel-body">

  <?php if(isset($_GET["add"])) { ?>
    <div class="alert alert-success text-center">
	<button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	 ثبت شد !
	</div>
  <?php } ?>
  
  <?php if(isset($_GET["error"])) { ?>
    <div class="alert alert-danger text-center">
	<button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	 متاسفانه ثبت نشد !
	</div>
  <?php } ?>
  
  <form method="post">
   
   <div class="input-group">
    <span class="input-group-addon">نام محصول :</span>
    <input type="text" name="product_name" class="form-control">
   </div>
   
   <div class="input-group">
    <span class="input-group-addon">گرنتی :</span>
	<input type="text" name="warranty" class="form-control">
   </div>
   
   <div class="input-group">
    <span class="input-group-addon">قیمت فی واحد :</span>
	<input type="text" name="unitprice" class="form-control">
   </div>
   
   <div class="input-group">
    <span class="input-group-addon">تعداد :</span>
	<input type="text" name="quantity" class="form-control">
   </div>
   
    <a href="product_list.php" class="btn btn-success">لیست محصولات</a>
    <input type="submit" value="ثبت نمودن" class="btn btn-primary">
	
  </form>
</div>
</div>
<?php require_once("footer.php");?>