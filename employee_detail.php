<?php require_once("connection.php"); ?>
<?php
   $employee = mysql_query("SELECT * FROM employee WHERE employee_id=" .$_GET["employee_id"],$con);
   $row_employee = mysql_fetch_assoc($employee);

?>
<?php require_once("top.php"); ?>

  <a href="#" id="print" class="pull-left noprint">
    <span class="glyphicon glyphicon-print"></span>
	چاپ کردن
  </a>
  <div class="text-center">
  <img src="<?php echo $row_employee["photo"];?>" width="100" ">
  </div>
   
 <table class="table table-striped table-hover">
   <tr>
     <td width="120">شماره :</td>
	 <td><?php echo $row_employee["employee_id"]; ?></td>
   </tr>
    <tr>
     <td>نام کارمند :</td>
	 <td><?php echo $row_employee["firstname"]; ?> <?php echo $row_employee["lastname"];?> </td>
   </tr>
    <tr>
     <td>آدرس</td>
	 <td><?php echo $row_employee["location"]; ?></td>
   </tr>
    <tr>
     <td>تلیفون</td>
	 <td><?php echo $row_employee["phone"]; ?></td>
   </tr>
    <tr>
     <td>وظیفه</td>
	 <td><?php echo $row_employee["position"]; ?></td>
   </tr>
    <tr>
     <td width="120">معاش :</td>
	 <td><?php echo $row_employee["gross_salary"]; ?>
	     <?php echo $row_employee["currency"]; ?>
	 </td>
   </tr>
 </table>


<?php require_once("footer.php");?>