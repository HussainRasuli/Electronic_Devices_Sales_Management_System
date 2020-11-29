<?php require_once("connection.php"); ?>
<?php 
   $product = mysql_query("SELECT * FROM product ORDER BY product_name ASC",$con);
   $row_product = mysql_fetch_assoc($product);

   if(isset($_POST["quantity"])){
	  $product_id = $_POST["product_id"];
	  $quantity = $_POST["quantity"];
	  $unitprice = $_POST["unitprice"];
	  $totalprice = $_POST["totalprice"];
	  $sales_id = $_GET["sales_id"];
	   
	$result = mysql_query("INSERT INTO sales_detail VALUES(NULL ,$product_id ,$quantity ,$unitprice ,$totalprice ,$sales_id)",$con);
	   if($result){
		   $updateresult = mysql_query("UPDATE product SET quantity = quantity - $quantity WHERE product_id= $product_id",$con);
		   if($updateresult){
			   header("location:sales_detail_add.php?add=done&sales_id=" . $_GET["sales_id"]);
		   }
		   else{
			   header("location:sales_detail_add.php?item=nodecrease&sales_id=" . $_GET["sales_id"]);
		   }

	  }
      else{
			   header("location:sales_detail_add.php?sale=failed&sales_id=" .$_GET["sales_id"]);
      }   
	   
   }
   
?>
<?php require_once("top.php"); ?>
<div class="panel panel-primary">
<div class="panel-heading">
  <h1>اضافه نمودن جنس به بل فروش</h1>
</div>
<div class="panel-body">
  <?php if(isset($_GET["add"])){ ?>
	<div class="alert alert-success text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	 جنس به بل اضافه شد!
	</div>
  <?php } ?>
  
   <?php if(isset($_GET["sale"])){ ?>
	<div class="alert alert-danger text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	 فروش صورت نگرفت !
	</div>
  <?php } ?>
  
   <?php if(isset($_GET["item"])){ ?>
	<div class="alert alert-danger text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	 هشدار هیچ محصولی از گدام کم نشد !
	</div>
  <?php } ?>

  <form method="post">
  
  <div class="input-group">
    <span class="input-group-addon">جنس</span>
	<select id="product_id" name="product_id" class="form-control">
	<option value="0">یک جنس را انتخاب کنید </option>
	<?php do { ?>
	<option value="<?php echo $row_product["product_id"]; ?>"><?php echo $row_product["product_name"];?></option>
	<?php } while($row_product = mysql_fetch_assoc($product)); ?>
	
	</select>
	<span style="width:50px;display:none;" class="input-group-addon" id="qty"></span>
  </div>
  
  <div class="input-group">
    <span class="input-group-addon">تعداد</span>
	<input id="quantity" type="text" name="quantity" class="form-control">
  </div>
  
  <div class="input-group">
    <span class="input-group-addon">قیمت فی واحد</span>
	<input id="unitprice" type="text" name="unitprice" class="form-control">
  </div>
  
  <div class="input-group">
    <span class="input-group-addon">قیمت مجموعی</span>
	<input readonly id="totalprice" type="text" name="totalprice" class="form-control">
  </div>
  <a href="sales_list.php?add=done" class="btn btn-success">لیست بل ها</a>
  <input id="submit_btn" type="submit" value="ثبت نمودن" class="btn btn-primary">
  </form>
</div>
</div>
<?php require_once("footer.php");?>