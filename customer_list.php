<?php require_once("connection.php");?>
<?php 
    if(!isset($_GET["page"])){
	    header("location:customer_list.php?page=1");
	 }

    $customer = mysql_query("SELECT customer_id FROM customer",$con);
	$totalRow = mysql_num_rows($customer);
   
    $rowperpage = 7;
	$totalpage = ceil($totalRow / $rowperpage);


    $offset = ($_GET["page"] - 1) * $rowperpage;
	
	
        $condition = "";
    if(isset($_GET["search"])){
		$condition ="WHERE customer_id = '" . $_GET["search"] . "' OR customer_name LIKE '%" . $_GET["search"]. "%' OR address LIKE '%" . $_GET["search"]. "%' OR phone LIKE '%" . $_GET["search"] ."%' OR email LIKE '%" . $_GET["search"] ."%' ";
	}
    $customer = mysql_query("SELECT * FROM customer $condition ORDER BY customer_id DESC LIMIT $offset,$rowperpage",$con);
   	$row_customer = mysql_fetch_assoc($customer);
	$totalRow_customer = mysql_num_rows($customer);
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">



     <h1> لیست مشتریان
    <span class="noprint">	 
	 <span class="badge pull-left alert-info">
	 تعداد مجموعی مشتریان (<?php echo $totalRow_customer; ?>)
	 </span>
	</span>
	
	<a id="print" href="#" class="noprint pull-left" style="color:#FFF; text-decoration:none;">
  <span class="glyphicon glyphicon-print"></span>
  چاپ کردن
</a>
	 </h1>
</div>

<div class="panel-body">

<?php if(isset($_GET["add"])) { ?>
<div class="alert alert-success text-center" >
<button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
    ثبت شد !
</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
<div class="alert alert-success text-center" >
<button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
    تغییرات ثبت شد !
</div>
<?php } ?>
<?php if(isset($_GET["delete"])) { ?>
<div class="alert alert-success text-center" >
<button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
    حذف شد !
</div>
<?php } ?>
    <?php if($totalRow_customer > 0) { ?>
   <table class="table table-striped table-hover">
    <tr>
      <th>شماره</th>
      <th>نام مشتری</th>
      <th>تلیفون</th>
      <th class="noprint">ویرایش</th>
      <th class="noprint">حذف</th>
	</tr>
	<?php do { ?>
    <tr>
      <td><?php echo $row_customer["customer_id"];?></td>
      <td><?php echo $row_customer["customer_name"];?></td>
      <td><?php echo $row_customer["phone"];?></td>
	  <td>
	  <a class="noprint"href="customer_edit.php?customer_id=<?php echo $row_customer["customer_id"];?>">
	    <div class="glyphicon glyphicon-edit"></div>
	  </a>
	  </td>
	  <td>
	  <span class="noprint">
	  <a class="delete" href="customer_delete.php?customer_id=<?php echo $row_customer["customer_id"];?>">
	    <div class="glyphicon glyphicon-trash"></div>
	  </a>
	  </span>
	  </td>
	  
    </tr>	
    <?php } while($row_customer = mysql_fetch_assoc($customer)); ?>
   </table>
   
   <?php for($x=1; $x<=$totalpage; $x++) { ?>
	<?php if(isset($_GET["page"]) && $_GET["page"] != $x) { ?>
	    <a href="customer_list.php?page=<?php echo $x; ?>">
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