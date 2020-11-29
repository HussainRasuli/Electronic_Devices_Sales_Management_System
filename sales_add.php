<?php require_once("connection.php");?>
<?php
    $customer = mysql_query("SELECT * FROM customer ORDER BY customer_id DESC",$con);
	 $row_customer = mysql_fetch_assoc($customer);
	 
	if(isset($_POST["customer_id"])){
		$customer_id = $_POST["customer_id"];
		$sale_date = $_POST["sale_date"];
		
	if(mysql_query("INSERT INTO sales VALUES(NULL,$customer_id,'$sale_date')",$con)){
		$last_id = mysql_insert_id($con);
		header("location:sales_detail_add.php?sales_id=$last_id");
	}
	else {
		header("location:sales_add.php?error=notadd");
	}
	
		
	}

?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
   <h1>ساختن بل جدید</h1>
</div>
<div class="panel-body">
<form method="post">

  <div class="input-group">
    <span class="input-group-addon"> مشتری </span>
	<select class="form-control" name="customer_id">
	
    <?php do { ?>	
	 <option value="<?php echo $row_customer["customer_id"];?>"><?php echo $row_customer["customer_name"];?></option>
    <?php }while($row_customer = mysql_fetch_assoc($customer)); ?>
    </select>
	
  </div>

 <div class="input-group">
    <span class="input-group-addon">تاریخ</span>
    <input value="<?php echo jdate("Y-m-d","","","","en");?>" type="text" name="sale_date" class="form-control">
 </div>
    <input type="submit" value="ساختن بل" class="btn btn-primary">
 </form>
</div>
</div>

<?php require_once("footer.php");?>