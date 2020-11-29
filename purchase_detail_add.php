<?php require_once("connection.php");?>
<?php require_once("top.php"); ?>

<?php 

    if(isset($_POST["item_name"])){
		$item_name = $_POST["item_name"];
		$category = $_POST["category"];
		$quantity = $_POST["quantity"];
		$unitprice = $_POST["unitprice"];
		$totalprice = $_POST["totalprice"];
		$purchase_id = $_GET["purchase_id"];
		
     $result = mysql_query("INSERT INTO purchase_detail VALUES (NULL ,'$item_name', '$category', $quantity, $unitprice, $totalprice ,$purchase_id)",$con);
		if($result){
			header("location:purchase_detail_add.php?add=done&purchase_id=" . $_GET["purchase_id"]);
		}
		else{
			header("location:purchase_detail_add.php?error=notadd&purchase_id=" . $_GET["purchase_id"]);
		}
		
	}


?>


<div class="panel panel-primary">
<div class="panel-heading">
 <h1>اظافه نمودن جنس به خریداری</h1>
</div>

<div class="panel-body">

<?php if(isset($_GET["add"])) { ?>
<div class="alert alert-success text-center">
<button class="close" area-hiden="ture" data-dismiss="alert">&times;</button>
 خریداری ثبت شد !
</div>
<?php } ?>

   <form method="post">
   
    <div class="input-group">
	<span class="input-group-addon"> 
	     نام جنس:
	</span>
    <input type="text" name="item_name" class="form-control">
    </div>
   
    <div class="input-group">
	<span class="input-group-addon"> 
	     بخش:
	</span>
    <input type="text" name="category" class="form-control">
    </div>
	 
	<div class="input-group">
	<span class="input-group-addon"> 
	     تعداد:
	</span>
    <input id="quantity" type="text" name="quantity" class="form-control">
    </div>
	
	 <div class="input-group">
	<span class="input-group-addon"> 
	     قیمت فی واحد:
	</span>
    <input id="unitprice" type="text" name="unitprice" class="form-control">
    </div>
	
	 <div class="input-group">
	<span class="input-group-addon"> 
	     قیمت مجموعی:
	</span>
    <input readonly id="totalprice" type="text" name="totalprice" class="form-control">
    </div>
	<a href="purchase_list.php" class="btn btn-success"> لیست خریداری</a>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary">
	
	
	
   </form>
</div>
</div>
<?php require_once("footer.php");?>