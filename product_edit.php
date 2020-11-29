<?php require_once("connection.php"); ?>
<?php 
   $product = mysql_query("SELECT * FROM product WHERE product_id=" . $_GET["product_id"],$con);
    $row_product = mysql_fetch_assoc($product);
	
	
   if(isset($_POST["product_name"])){
         $product_name = $_POST["product_name"];
         $warranty = $_POST["warranty"];
         $unitprice = $_POST["unitprice"];
         $quantity = $_POST["quantity"];
    
   $result = mysql_query("UPDATE product SET product_name='$product_name',warranty='$warranty',unitprice='$unitprice',quantity='$quantity' WHERE product_id=". $_GET["product_id"],$con);
	 if($result){
	    header("location:product_list.php?edit=done");
 	 }
	else{
	    header("location:product_edit.php?error=notedit&product_id=" . $_GET["product_id"]);
	}
   
   }

?>


<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
    <h1>ویرایش محصول</h1>
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
    <span class="input-group-addon">نام محصول :</span>
    <input value="<?php echo $row_product["product_name"]; ?>"type="text" name="product_name" class="form-control">
   </div>
   
   <div class="input-group">
    <span class="input-group-addon">گرنتی :</span>
	<input value="<?php echo $row_product["warranty"];?>"type="text" name="warranty" class="form-control">
   </div>
   
   <div class="input-group">
    <span class="input-group-addon">تعداد :</span>
	<input value="<?php echo $row_product["unitprice"];?>"type="text" name="unitprice" class="form-control">
   </div>
   
   <div class="input-group">
    <span class="input-group-addon">قیمت فی واحد :</span>
	<input value="<?php echo $row_product["quantity"]; ?>" type="text" name="quantity" class="form-control">
   </div>
   
    <input type="submit" value="ویرایش نمودن" class="btn btn-primary">
	
  </form>
</div>
</div>
<?php require_once("footer.php");?>