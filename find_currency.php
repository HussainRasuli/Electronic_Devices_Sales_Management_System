<?php require_once("connection.php"); ?>
<?php require_once("jdf.php");?>
<?php 

   $employee_id = $_POST["employee_id"];
      
	  
	  
     $employee = mysql_query("SELECT currency FROM employee WHERE employee_id= $employee_id",$con);
       $row_employee = mysql_fetch_assoc($employee);
     
	
    echo $row_employee["currency"];
		 
		 
?>
	
	
