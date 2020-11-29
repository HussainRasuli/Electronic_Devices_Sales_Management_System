<?php require_once("connection.php"); ?>
<?php require_once("jdf.php"); ?>
<?php 
     $employee =  mysql_query("SELECT * FROM employee WHERE employee_id = " . $_GET["employee_id"],$con);
     $row_employee = mysql_fetch_assoc($employee);
	 
	 if(isset($_POST["employee_id"])){
		 
		$employee_id = $_POST["employee_id"];
		$absent = $_POST["absent_amount"];
		$overtime = $_POST["overtime_amount"];
		$bonus = $_POST["bonus"];
		$tax = $_POST["tax"];
		$net_salary = $_POST["net_salary"];
		$exchange = $_POST["exchange"];
		$changed_amount = $_POST["changed_amount"];
		$paid = $_POST["paid"];
		 
		$year = jdate("Y","","","","en");
		$month = jdate("m","","","","en");
	
		 
$result = mysql_query("UPDATE payroll SET date_year=$year, date_month=$month, absent_amount=$absent, overtime_amount=$overtime, bonus=$bonus, tax=$tax, net_salary=$net_salary, exchange=$exchange, changed_amount=$changed_amount, paid=$paid WHERE employee_id = " . $_GET["employee_id"],$con);
    if($result){
		header("location:salary_list.php?edit=done"); 
		
	}
    else{
		header("location:salary_list.php?error1=occured&employee_id=" . $_GET["employee_id"]); 
	  }
		 
	 }
	 
	 $payroll= mysql_query("SELECT * FROM payroll WHERE employee_id=" . $_GET["employee_id"],$con);
	  $row_payroll = mysql_fetch_assoc($payroll);
?>

<?php require_once("top.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">
    <h1>محاسبه معاش کارمند</h1>
</div>
<div class="panel-body">
  <form method="post">
    <div class="input-group">
	  <span class="input-group-addon">کارمند</span>
      <select id="employee_id" name="employee_id" class="form-control">
	  <option value="0">یک کارمند را انتخاب کنید</option>
        <?php do { ?> 
		  
		  <option <?php if($row_payroll["employee_id"] == $row_employee["employee_id"]) echo "selected"; ?>  value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"]; ?> <?php echo $row_employee["lastname"]; ?></option> 
		<?php } while($row_employee = mysql_fetch_assoc($employee)); ?>
	 
	  </select>
    </div>
   <div class="input-group">
     <span class="input-group-addon">غیر حاضری</span>
     <input value="<?php echo $row_payroll["absent_amount"];?>" readonly id="absent_amount" type="text" name="absent_amount" class="form-control">
   </div>
   
   <div class="input-group">
     <span class="input-group-addon">اضافه کاری</span>
     <input value="<?php echo $row_payroll["overtime_amount"];?>" readonly id="overtime_amount" type="text" name="overtime_amount" class="form-control">
   </div>
   
   <div class="input-group">
     <span class="input-group-addon">پاداش</span>
     <input value="<?php echo $row_payroll["bonus"];?>" value="0" type="text" id="bonus" name="bonus" class="form-control">
   </div>
   
   <div class="input-group">
     <span class="input-group-addon">مالیه</span>
     <input value="<?php echo $row_payroll["tax"];?>" readonly type="text" id="tax" name="tax" class="form-control">
   </div>
   
   <div class="input-group">
     <span class="input-group-addon">معاش نهایی</span>
     <input value="<?php echo $row_payroll["net_salary"];?>" readonly type="text" id="net_salary" name="net_salary" class="form-control">
   </div>
   
   <div class="input-group">
     <span class="input-group-addon">نرخ تبدیل</span>
     <input value="1" type="text" id="exchange" name="exchange" class="form-control">
	 <span class="input-group-addon" id="salary_currency"></span>
   </div>
   
   <div class="input-group">
     <span class="input-group-addon">مقدار تبدیل شده</span>
     <input value="<?php echo $row_payroll["changed_amount"];?>" readonly type="text" id="changed_amount" name="changed_amount" class="form-control">
   </div>
   
   <div class="input-group"> 
     <span class="input-group-addon">وضعیت پرداخت</span> &nbsp;
     <label><input <?php if($row_payroll["paid"] == 1) echo "checked"; ?> type="radio" value="1" name="paid">&nbsp;پرداخت شد</label> &nbsp;
     <label><input <?php if($row_payroll["paid"] == 0) echo "checked"; ?> type="radio" value="0" name="paid">&nbsp;پرداخت نشد</label>
   </div>
   
   <input type="submit" value="ذخیره نمودن" class="btn btn-primary">
   
   
  </form>
</div>
</div>
<?php require_once("footer.php");?>