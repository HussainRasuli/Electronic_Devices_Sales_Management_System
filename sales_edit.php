<?php require_once("connection.php"); ?>
<?php
    $customer = mysql_query("SELECT * FROM customer ORDER BY customer_id DESC",$con);
	 $row_customer = mysql_fetch_assoc($customer);
	 
	if(isset($_POST["customer_id"])){
		$customer_id = $_POST["customer_id"];
		$sale_date = $_POST["sale_date"];
		
$result = mysql_query("UPDATE sales SET customer_id=$customer_id ,sale_date='$sale_date' WHERE sales_id=" .$_GET["sales_id"],$con);
		if($result){
		header("location:sales_list.php?edit=done");
	}
	else {
		header("location:sales_list.php?error1=notedit&sales_id=". $_GET["sales_id"]);
	}
	
		
	}
     
	 $sales = mysql_query("SELECT * FROM sales WHERE sales_id=" . $_GET["sales_id"],$con);
	  $row_sales = mysql_fetch_assoc($sales);
	 
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
   <h1>ویرایش بل</h1>
</div>
<div class="panel-body">
<form method="post">

  <div class="input-group">
    <span class="input-group-addon"> مشتری </span>
	<select class="form-control" name="customer_id">
	
    <?php do { ?>	
	 <option <?php if($row_sales["customer_id"] == $row_customer["customer_id"]) echo "selected"; ?> value="<?php echo $row_customer["customer_id"];?>"><?php echo $row_customer["customer_name"];?></option>
    <?php }while($row_customer = mysql_fetch_assoc($customer)); ?>
    </select>
	
  </div>

 <div class="input-group">
    <span class="input-group-addon">تاریخ</span>
    <input value="<?php echo $row_sales["sale_date"];?>" type="text" name="sale_date" class="form-control">
 </div>
    <input type="submit" value="ذخیره نمودن" class="btn btn-primary">
 </form>
</div>
</div>

<?php require_once("footer.php");?>