<?php require_once("connection.php"); ?>
<?php 
     $condition = "";
    if(isset($_GET["search"])){
		$condition ="WHERE product_id ='" . $_GET["search"] . "' OR product_name LIKE '%" . $_GET["search"]."%'";
	}
    $product = mysql_query("SELECT * FROM product $condition ORDER BY product_id ASC ",$con);
    $row_product = mysql_fetch_assoc($product);
     $totalRow_product = mysql_num_rows($product);
?>

<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">

  <a id="print" href="#" class="noprint pull-left" style="color:#FFF; text-decoration:none;">
  <span class="glyphicon glyphicon-print"></span>
  چاپ کردن
</a>

   <h1>لیست محصولات</h1>
</div>
<div class="panel-body">

   <?php if(isset($_GET["edit"])) { ?>
   <div class="alert alert-success text-center">
    <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	    تغییرات انجام شد !
   </div>
  <?php } ?>

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
  <?php if($totalRow_product > 0) { ?>
  <table class="table table-striped table-hover">
    <tr>
       <th>شماره</th>
       <th>نام محصول</th>
       <th>گرنتی</th>
       <th>قیمت فی واحد</th>
       <th>تعداد</th>
	   <th class="noprint">ویرایش</th>
	   <th class="noprint">حذف</th>
	</tr>
	<?php do { ?>
	<tr>
	   <td><?php echo $row_product["product_id"]; ?></td>
	   <td><?php echo $row_product["product_name"]; ?></td>
	   <td><?php echo $row_product["warranty"]; ?></td>
	   <td><?php echo $row_product["unitprice"]; ?></td>
	   <td><?php echo $row_product["quantity"]; ?></td>
	   <td>
	     <a class="noprint" href="product_edit.php?product_id=<?php echo $row_product["product_id"];?>">
		  <span class="glyphicon glyphicon-edit"></span>
		 </a>
	   </td>
	   <td>
	     <a class="noprint" class="delete" href="product_delete.php?product_id=<?php echo $row_product["product_id"];?>">
		  <span class="glyphicon glyphicon-trash"></span>
		 </a>
	   </td>
	</tr>
	<?php } while($row_product = mysql_fetch_assoc($product)); ?>
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