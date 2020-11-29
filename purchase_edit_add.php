<?php require_once("connection.php");?>
<?php require_once("top.php"); ?>

<?php 

  $purchase = mysql_query("SELECT * FROM purchase_detail WHERE purchase_id=" . $_GET["purchase_id"],$con);
     $row_purchase = mysql_fetch_assoc($purchase);



    if(isset($_POST["item_name"])){
		$item_name = $_POST["item_name"];
		$category = $_POST["category"];
		$quantity = $_POST["quantity"];
		$unitprice = $_POST["unitprice"];
		$totalprice = $_POST["totalprice"];
		$purchase_id = $_GET["purchase_id"];
		
		
		$result = mysql_query("UPDATE purchase_detail SET item_name='$item_name', category='$category', quantity=$quantity, unitprice=$unitprice, totalprice=$totalprice WHERE purchase_id=" . $_GET["purchase_id"],$con);
		
		if($result){
		    header("location:purchase_list.php?edit=done");
		}
		else{
		    header("location:purchase_edit_add?error=notedit&purchase_id=" . $_GET["purchase_id"]);
		}
		
		
		
	}


?>


<div class="panel panel-primary">
<div class="panel-heading">
 <h1>ویرایش خریداری</h1>
</div>

<div class="panel-body">

   <form method="post">
   
    <div class="input-group">
	<span class="input-group-addon"> 
	     نام جنس:
	</span>
    <input value="<?php echo $row_purchase["item_name"]; ?>" type="text" name="item_name" class="form-control">
    </div>
   
    <div class="input-group">
	<span class="input-group-addon"> 
	     بخش:
	</span>
    <input value="<?php echo $row_purchase["category"]; ?>" type="text" name="category" class="form-control">
    </div>
	 
	<div class="input-group">
	<span class="input-group-addon"> 
	     تعداد:
	</span>
    <input value="<?php echo $row_purchase["quantity"]; ?>" id="quantity" type="text" name="quantity" class="form-control">
    </div>
	
	 <div class="input-group">
	<span class="input-group-addon"> 
	     قیمت فی واحد:
	</span>
    <input value="<?php echo $row_purchase["unitprice"]; ?>" id="unitprice" type="text" name="unitprice" class="form-control">
    </div>
	
	 <div class="input-group">
	<span class="input-group-addon"> 
	     قیمت مجموعی:
	</span>
    <input value="<?php echo $row_purchase["totalprice"]; ?>" readonly id="totalprice" type="text" name="totalprice" class="form-control">
    </div>
	
	<a href="purchase_list.php" class="btn btn-success"> لیست خریداری </a>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary">
	
	
	
   </form>
</div>
</div>
<?php require_once("footer.php");?>