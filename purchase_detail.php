<?php require_once("connection.php"); ?>
<?php 
     $purchase = mysql_query("SELECT * FROM purchase_detail WHERE purchase_id = " . $_GET["purchase_id"] ." ORDER BY detail_id ASC",$con);
       $row_purchase = mysql_fetch_assoc($purchase);

?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">

<a id="print" href="#" class="noprint pull-left" style="color:#FFF; text-decoration:none;">
  <span class="glyphicon glyphicon-print"></span>
  چاپ کردن
</a>
    <h1>جزییات خریداری</h1>
</div>

<div class="panel-body">
  <?php if(isset($_GET["delete"])) { ?>
     <div class="alert alert-success text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	    خریداری مورد نظر با موفقیت حذف شد !
	 </div>
  <?php } ?>

  <?php if(isset($_GET["error"])) { ?>
     <div class="alert alert-danger text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	   متاسفانه خریداری مورد نظر حذف نگردید ! لطفا دوباره کوشش کنید.
	 </div>
  <?php } ?>

  <?php if(isset($_GET["edit"])) { ?>
     <div class="alert alert-success text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	   تغییرات انجام شد !
	 </div>
  <?php } ?>
  
  


    <table class="table table-striped table-hover">
     <tr>
	       <th>شماره</th>
	       <th>نام جنس</th>
	       <th>بخش</th>
	       <th>تعداد</th>
	       <th>قیمت</th>
	       <th>قیمت مجموعی</th>
	       <th class="noprint">ویرایش</th>
	       <th class="noprint">حذف</th>
	 </tr>
	 
	 <?php $x=1; do { ?>
	 <tr>
	       <td><?php echo $x++;?></td>
		   <td><?php echo $row_purchase["item_name"];?></td>
		   <td><?php echo $row_purchase["category"];?></td>
		   <td><?php echo $row_purchase["quantity"];?></td>
		   <td><?php echo $row_purchase["unitprice"];?></td>
		   <td><?php echo $row_purchase["totalprice"];?></td>
		  
		  <td>
		       <a class="noprint" href="purchase_edit_add.php?purchase_id=<?php echo $row_purchase["purchase_id"];?>">
		       <span class="glyphicon glyphicon-edit"></span>
			   </a>
		   </td>
		   <td>
		    <span class="noprint">
		       <a class="delete" href="purchase_delete.php?purchase_id=<?php echo $row_purchase["purchase_id"];?>">
		       <span class="glyphicon glyphicon-trash"></span>
			   </a>
			</span>
		   </td>
	 </tr>
	 <?php } while($row_purchase = mysql_fetch_assoc($purchase)); ?>
	 
	 
    </table>
</div>
</div>
<?php require_once("footer.php");?>