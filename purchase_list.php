<?php require_once("connection.php"); ?>
<?php 
        if(!isset($_GET["page"])){
	    header("location:purchase_list.php?page=1");
	 }

    $customer = mysql_query("SELECT purchase_id FROM purchase",$con);
	$totalRow = mysql_num_rows($customer);
   
    $rowperpage = 6;
	$totalpage = ceil($totalRow / $rowperpage);


    $offset = ($_GET["page"] - 1) * $rowperpage;
	
	
     $purchase = mysql_query("SELECT * FROM purchase INNER JOIN employee ON employee.employee_id = purchase.employee_id ORDER BY purchase_id DESC LIMIT $offset,$rowperpage",$con);
       $row_purchase = mysql_fetch_assoc($purchase);
        $totalRows_purchase = mysql_num_rows($purchase);
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">

<a id="print" href="#" class="noprint pull-left" style="color:#FFF; text-decoration:none;">
  <span class="glyphicon glyphicon-print"></span>
  چاپ کردن
</a>
    <h1>لیست خریداری ها</h1>
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
  
  <?php if(isset($_GET["error1"])) { ?>
     <div class="alert alert-danger text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	   تغییرات انجام نشد !
	 </div>
  <?php } ?>
  
  

     <?php if($totalRows_purchase > 0) { ?>
    <table class="table table-striped table-hover">
	
     <tr>
	       <th>شماره خریداری</th>
	       <th>تاریخ خریداری</th>
	       <th>خریدار</th>
	       <th class="noprint">جزییات خریداری</th>
	       <th class="noprint">ویرایش خریدار</th>
	       <th class="noprint">حذف</th>
	 </tr>
	 
	 <?php do { ?>
	 <tr>
	       <td><?php echo $row_purchase["purchase_id"];?></td>
	       <td><?php echo $row_purchase["purchase_date"];?></td>
	       <td><?php echo $row_purchase["firstname"];?> <?php echo $row_purchase["lastname"];?></td>
		   <td>
		    <a class="noprint" href="purchase_detail.php?purchase_id=<?php echo $row_purchase["purchase_id"];?>">
		     <span class="glyphicon glyphicon-list-alt"></span>
			</a>
		   </td>
		   <td>
		       <a class="noprint" href="purchase_edit.php?purchase_id=<?php echo $row_purchase["purchase_id"];?>">
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
	   
   <?php for($x=1; $x<=$totalpage; $x++) { ?>
	<?php if(isset($_GET["page"]) && $_GET["page"] != $x) { ?>
	    <a href="purchase_list.php?page=<?php echo $x; ?>">
	<?php } else { ?>
	     <span style="color:red;">
	<?php } ?>
		<?php echo $x; ?></span></a>
		
    <?php } ?>
	
	
	  <?php } else { ?>
         <div class="alert alert-warning text-center ">
		 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
		    هیچ معلوماتی برای نمایش دادن وجود ندارد !
		 </div>
   <?php } ?>
 
</div>
</div>
<?php require_once("footer.php");?>