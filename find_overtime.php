<?php require_once("connection.php"); ?>
<?php require_once("jdf.php");?>
<?php 

   $employee_id = $_POST["employee_id"];
      
	  $year = jdate("Y","","","","en");
	  $month = jdate("m","","","","en");
   
     $employee = mysql_query("SELECT SUM(overtime_hour) AS total FROM overtime WHERE date_year=$year AND date_month=$month AND employee_id= $employee_id",$con);
       $row_employee = mysql_fetch_assoc($employee);
     
	 $salary = mysql_query("SELECT gross_salary ,currency FROM employee WHERE employee_id=$employee_id",$con);
     $row_salary = mysql_fetch_assoc($salary);
	 
	 $gross_salary = $row_salary["gross_salary"];
	 
	  $sph = $gross_salary / 30 / 8 ;
	 
	 if($row_salary["currency"] == "AFS"){
		 echo round($row_employee["total"] * $sph,0);
		 }
		 
		else{
			echo round($row_employee["total"] * $sph,2);
		} 
		 
		 
?>
	
	
