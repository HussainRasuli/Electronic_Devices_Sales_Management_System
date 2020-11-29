<?php require_once("connection.php"); ?>
<?php 
      $sales = mysql_query("SELECT * FROM sales INNER JOIN customer ON customer.customer_id = sales.customer_id ORDER BY sales_id DESC",$con);
        $row_sales = mysql_fetch_assoc($sales);
          $totalRow_sales = mysql_num_rows($sales);


?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">

     <a id="print" href="#" class="noprint pull-left" style="color:#FFF; text-decoration:none;">
  <span class="glyphicon glyphicon-print"></span>
  چاپ کردن
</a>

     <h1>لیست بل ها</h1>
</div>
<div class="panel-body">

<?php if(isset($_GET["delete"])) { ?>
     <div class="alert alert-success text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	   حذف شد !
	 </div>
  <?php } ?>
  
  <?php if(isset($_GET["error"])) { ?>
     <div class="alert alert-danger text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	   حذف نشد !
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
   <?php if($totalRow_sales > 0) { ?>
  <table class="table table-stirep table-hover">
    <tr> <th>شماره</th> 
      <th>تاریخ </th> 
      <th>مشتری</th> 
      <th class="noprint">جزییات فروشات</th>  
      <th class="noprint">ویرایش</th> 
      <th class="noprint">حذف</th> 
	</tr>
	
    <?php do { ?> 
    <tr>
     
        <td><?php echo $row_sales["sales_id"]; ?></td>
        <td><?php echo $row_sales["sale_date"]; ?></td>
        <td><?php echo $row_sales["customer_name"]; ?></td>
		<td>
		  <a class="noprint"href="sales_detail.php?sales_id=<?php echo $row_sales["sales_id"]; ?>">
		   <span class="glyphicon glyphicon-list-alt"></span>
		  </a>
		</td>
        <td> 
		  <a class="noprint"href="sales_edit.php?sales_id=<?php echo $row_sales["sales_id"];?>">
		    <span class="glyphicon glyphicon-edit"></span>
		  </a>
		</td>
		<td> 
		<span class="noprint">
		  <a class="delete" href="sales_delete.php?sales_id=<?php echo $row_sales["sales_id"];?>">
		    <span class="glyphicon glyphicon-trash"></span>
		  </a>
		</span>
		</td>
		
    </tr> 
	<?php } while($row_sales = mysql_fetch_assoc($sales)); ?>

  </table>
   <?php } else { ?>
           <div class="alert alert-warning text-center ">
		 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
		    هیچ معلوماتی برای نمایش دادن وجود ندارد !
		 </div>
   <?php } ?>
</div>
</div>
<?php require_once("footer.php");?>