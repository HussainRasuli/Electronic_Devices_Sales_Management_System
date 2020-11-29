<?php require_once("connection.php"); ?>
<?php require_once("tools.php"); ?>
<?php 

     $condition = "";
    if(isset($_GET["search"])){
		$condition ="WHERE employee_id ='" . $_GET["search"] . "' OR fristname LIKE '%" . $_GET["search"] ."%' OR lastname LIKE '%" . $_GET["search"]. "%'";
	} 
	
     $employee =  mysql_query("SELECT * FROM employee LEFT JOIN payroll ON employee.employee_id = payroll.employee_id ORDER BY date_year DESC , date_month DESC ",$con);
     $row_employee = mysql_fetch_assoc($employee);
?>

<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
<span class="noprint">
<a href="salary_add.php" class="btn btn-info pull-left">محاسبه معاشات</a>
</span>
	<a id="print" href="#" class="noprint pull-left" style="color:#FFF; text-decoration:none;">
  <span class="glyphicon glyphicon-print"></span>
  چاپ کردن
</a>

<h1>پرداخت معاشات</h1>
</div>
<div class="panel-body">

<?php if(isset($_GET["edit"])) { ?>
     <div class="alert alert-success text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	  تغییرات انجام شد !
	 </div>
  <?php } ?>
  
  <?php if(isset($_GET["error1"])) { ?>
     <div class="alert alert-danger text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	  تغییرات انجام نشد !!
	 </div>
  <?php } ?>
  
<?php if(isset($_GET["delete"])) { ?>
     <div class="alert alert-success text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	  معاش کارمند مورد نظر حذف شد !
	 </div>
  <?php } ?>
  
  <?php if(isset($_GET["error"])) { ?>
     <div class="alert alert-danger text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	   هیچ معلوماتی برای حذف کردن موجود نیست !
	 </div>
  <?php } ?>
  
  <table class="table table-striped table-hover">
     <tr>
         <th>شماره</th>
         <th>نام کارمند</th>
         <th>معاش ثابت</th>
         <th>تاریخ</th>
         <th>معاش نهایی</th>
         <th>پرداخت</th>
         <th class="noprint">ویرایش</th>
         <th class="noprint">حذف</th>
     </tr>
	 <?php do { ?>
     <tr>
	     <td><?php echo $row_employee["employee_id"];?></td>
	     <td><?php echo $row_employee["firstname"]; ?> <?php echo $row_employee["lastname"]; ?></td>
	     <td><?php echo $row_employee["gross_salary"];?></td>
	     <td><?php echo monthName ($row_employee["date_month"]);?> <?php echo $row_employee["date_year"]; ?></td>
	     <td><?php echo $row_employee["net_salary"];?> <?php echo $row_employee["currency"]; ?></td>
	     <td><?php echo $row_employee["paid"]== 1 ? "<span class='glyphicon glyphicon-ok'></span>" : "<span class='glyphicon glyphicon-remove'></span>";?></td>
	     <td>
		     <a class="noprint" href="salary_edit.php?employee_id=<?php echo $row_employee["employee_id"];?>">
		       <span class="glyphicon glyphicon-edit"></span>
			   </a>
		 </td>
		 <td>
		   <span class="noprint">
		     <a class="delete" href="salary_delete.php?employee_id=<?php echo $row_employee["employee_id"];?>">
		       <span class="glyphicon glyphicon-trash"></span>
			   </a>
		   </span>
		 </td>
	 </tr>
	 <?php } while($row_employee = mysql_fetch_assoc($employee)); ?>
  </table>
</div>
</div>
<?php require_once("footer.php");?>