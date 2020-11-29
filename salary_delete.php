
<?php require_once("connection.php"); ?>
<?php 
     $result = mysql_query("DELETE FROM payroll WHERE employee_id = ". $_GET["employee_id"],$con);
     if($result){
		 header("location:salary_list.php?delete=done");
	 }
	 else{
		 header("location:salary_list.php?error=notdelete");
	 }







?>