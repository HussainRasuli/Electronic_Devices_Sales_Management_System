<?php require_once("connection.php"); ?>
<?php 
     $sales = mysql_query("SELECT *, sales_detail.quantity AS sold_quantity, sales_detail.unitprice AS sold_unitprice FROM sales_detail INNER JOIN product ON product.product_id = sales_detail.product_id WHERE sales_id = " . $_GET["sales_id"] . " ORDER BY detail_id DESC",$con);
       $row_sales = mysql_fetch_assoc($sales);


?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">

    <a id="print" href="#" class="noprint pull-left" style="color:#FFF; text-decoration:none;">
  <span class="glyphicon glyphicon-print"></span>
  چاپ کردن
</a>

    <h1>جزییات فروش</h1>
</div>


    <table class="table table-striped table-hover">
     <tr>
	       <th>شماره</th>
	       <th>نام جنس</th>
	       <th>تعداد</th>
	       <th>قیمت</th>
	       <th>قیمت مجموعی</th>
	       <th class="noprint">ویرایش</th>
	       <th class="noprint">حذف</th>
	 </tr>
	 
	 <?php do { ?>
	 <tr>
	       <td><?php echo $row_sales["detail_id"];?></td>
		   <td><?php echo $row_sales["product_name"];?></td>
		   <td><?php echo $row_sales["sold_quantity"];?></td>
		   <td><?php echo $row_sales["sold_unitprice"];?></td>
		   <td><?php echo $row_sales["totalprice"];?></td>
		 
		  
		  <td>
		       <a class="noprint" href="sales_edit_add.php?sales_id=<?php echo $row_sales["sales_id"];?>">
		       <span class="glyphicon glyphicon-edit"></span>
			   </a>
		   </td>
		   <td>
		       <a class="noprint" class="delete" href="sales_delete.php?sales_id=<?php echo $row_sales["sales_id"];?>">
		       <span class="glyphicon glyphicon-trash"></span>
		   </td>
	 </tr>
	 <?php } while($row_sales = mysql_fetch_assoc($sales)); ?>
	 
	 
    </table>
</div>
</div>
<?php require_once("footer.php");?>