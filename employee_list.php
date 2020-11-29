<?php require_once("connection.php"); ?>

<?php
     if(!isset($_GET["page"])){
	    header("location:employee_list.php?page=1");
	 }

    $employee = mysql_query("SELECT employee_id FROM employee",$con);
	$totalRow = mysql_num_rows($employee);
   
    $rowperpage = 4;
	$totalpage = ceil($totalRow / $rowperpage);


    $offset = ($_GET["page"] - 1) * $rowperpage;
	
    $condition = "";
    if(isset($_GET["search"])){
		$condition ="WHERE employee_id = '" . $_GET["search"] . "' OR firstname LIKE '%" . $_GET["search"]. "%' OR lastname LIKE '%" . $_GET["search"]. "%' OR phone LIKE '%" . $_GET["search"] ."%' OR position LIKE '%" . $_GET["search"] ."%' ";
	}
	
      $employee =  mysql_query("SELECT * FROM employee $condition ORDER BY employee_id ASC LIMIT $offset,$rowperpage",$con);
      $row_employee = mysql_fetch_assoc($employee);

	  $totalRows_employee = mysql_num_rows($employee);
 ?>

 


<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">

 <a id="print" href="#" class="noprint pull-left" style="color:#FFF; text-decoration:none;">
  <span class="glyphicon glyphicon-print"></span>
  چاپ کردن
</a>

 <h1>لیست کارمندان</h1>
</div>



<div class="panel-body">

  <?php if(isset($_GET["delete"])) { ?>
     <div class="alert alert-success text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	     کارمند مورد نظر با موفقیت حذف گردید !
	 </div>
  <?php } ?>
  
   <?php if(isset($_GET["edit"])) { ?>
     <div class="alert alert-success text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	     تغییرات موفقانه ثبت شد !
	 </div>
  <?php } ?>
  
  <?php if(isset($_GET["error"])) { ?>
     <div class="alert alert-danger text-center">
	  <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	     کارمند مورد نظر متاسفانه حذف نشد !
	 </div>
  <?php } ?>

  <?php if($totalRows_employee > 0 ) { ?>
  
<table class="table table-striped table-hover">
  <tr>
       <th>شماره</th>
       <th>نام کارمند</th>
       <th>تلیفون</th>
       <th>وظیفه</th>
       <th>عکس</th>
       <th class="noprint">جزییات</th>
       <th class="noprint">ویرایش</th>
       <th class="noprint">حذف</th>
  </tr>
   <?php do { ?>
  <tr>
       <td><?php echo $row_employee["employee_id"];?></td>
       <td><?php echo $row_employee["firstname"];?> <?php echo $row_employee["lastname"];?></td>
	   <td><?php echo $row_employee["phone"];?></td>
	   <td><?php echo $row_employee["position"];?></td>
	   <td><img src="<?php echo $row_employee["photo"];?>" width="50""> </td>
	   <td>
	     <a class="noprint" href="employee_detail.php?employee_id=<?php echo $row_employee["employee_id"];?>">
		    <span class="glyphicon glyphicon-list-alt"></span>
		 </a>
	   </td>
	   
	   <td class="noprint">
	       <a href="employee_edit.php?employee_id=<?php echo $row_employee["employee_id"];?>">
		   <span class="glyphicon glyphicon-edit"> </span>
		   </a>
	   </td>
	   <td class="noprint">
	       <a class="delete" href="employee_delete.php?employee_id=<?php echo $row_employee["employee_id"];?>">
		   <span class="glyphicon glyphicon-trash"> </span>
		   </a>
	   </td>
  </tr>
   <?php } while($row_employee = mysql_fetch_assoc($employee)); ?>
</table>
<div class="noprint">


    <?php for($x=1; $x<=$totalpage; $x++) { ?>
	<?php if(isset($_GET["page"]) && $_GET["page"] != $x) { ?>
	    <a href="employee_list.php?page=<?php echo $x; ?>">
	<?php } else { ?>
	     <span style="color:red;">
	<?php } ?>
		<?php echo $x; ?></span></a>
		
    <?php } ?>
	
	
</div>	
  <?php } else if(isset($_GET["search"])) { ?>
	   <div class="alert alert-warning text-center ">
	   <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	   کارمندی با این مشخصات وجود ندارد !
	   </div>
  <?php }?>



</div>
</div>
<?php require_once("footer.php");?>