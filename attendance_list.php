<?php require_once("connection.php");?>
<?php require_once("top.php"); ?>
<?php require_once("tools.php"); ?>
<?php 
    $year = jdate("Y","","","","en");
    $month = jdate("m","","","","en");
	
	if(isset($_GET["date_year"])){
		$year = $_GET["date_year"];
		$month = $_GET["date_month"];
	}
	
 $attendance = mysql_query("SELECT employee.employee_id , firstname, lastname , SUM(absent_hour) AS total FROM attendance INNER JOIN employee ON employee.employee_id = attendance.employee_id WHERE date_year=$year AND date_month=$month GROUP BY attendance.employee_id",$con);
         $row_attendance = mysql_fetch_assoc($attendance);
         $totalRows_attendance = mysql_num_rows($attendance);
?>

<div class="panel panel-primary">
<div class="panel-heading">
  
	<a href="attendance_add.php" class="pull-left btn btn-info">ثبت غیر حاضری</a>
	  <h1>حاضری کارمندان در ماه
	     <?php if(isset($_GET["date_month"])){ ?>
		     <?php echo monthName($_GET["date_month"]); ?>
			<?php echo $_GET["date_year"]; ?>
			
		 <?php } else {
	           echo jdate("p Y");
		  } ?>
		 
	  </h1>
</div>

<div class="panel-body">

<?php if(isset($_GET["add"])){ ?>
  <div class="alert alert-success text-center">
	 <button class="close" area-hiden="true" data-dismiss="alert">&times;</button>
	   غیر حاضری ثبت شد !
	 </div>
<?php } ?>

 <form method="get">
   
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     <div class="input-group">
	 	 <span class="input-group-addon">
     ماه: 
	 </span>
     <select name="date_month" class="form-control">
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==1) echo "selected";?> value="1">حمل</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==2) echo "selected";?> value="2">ثور</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==3) echo "selected";?> value="3">جوزا</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==4) echo "selected";?> value="4">سرطان</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==5) echo "selected";?> value="5">اسد</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==6) echo "selected";?> value="6">سنبله</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==7) echo "selected";?> value="7">میزان</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==8) echo "selected";?> value="8">عقرب</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==9) echo "selected";?> value="9">قوس</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==10) echo "selected";?> value="10">جدی</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==11) echo "selected";?> value="11">دلو</option>
	        <option <?php if(isset($_GET["date_month"]) && $_GET["date_month"]==12) echo "selected";?> value="12">حوت</option>
     </select>
	 
     </div>
    </div>
	
	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     <div class="input-group">
     <span class="input-group-addon">
      سال: 
	 </span>
  <input value="<?php echo $year ?>" type="text" name="date_year" class="form-control">
    <span class="input-group-btn">
      <input type="submit" value="نمایش" class="btn btn-primary">
	<span>
     </div>
	 
   </form>
   </div>
   
    <div class="clearfix"></div>
	
   <?php if($totalRows_attendance > 0) { ?>
   <table class="table table_striped table-hover">
   <tr style="background-color:#CCC";>
       <th>شماره</th>
       <th>کارمند</th>
       <th>مجموع غیر حاضری</th>
       <th>نمایش جزییات</th>
   </tr>
   
   <?php do { ?>
    <tr>
	  <td><?php echo $row_attendance["employee_id"]?></td>
      <td><?php echo $row_attendance["firstname"];?> <?php echo $row_attendance["lastname"];?></td>
      <td><?php echo $row_attendance["total"];?> ساعت </td>
	  <td>
	    <a href="attendance_detail.php?employee_id=<?php echo $row_attendance["employee_id"]?>&date_year=<?php if(isset($_GET["date_year"])) echo $_GET["date_year"]; else echo jdate("Y","","","","en");?>&date_month=<?php if(isset($_GET["date_month"])) echo $_GET["date_month"]; else echo jdate("m","","","","en");?>">
	      <span class="glyphicon glyphicon-list-alt"></span>
		</a>  
	  </td>
	</tr>
   <?php } while($row_attendance = mysql_fetch_assoc($attendance));?>
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