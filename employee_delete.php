
<?php require_once("connection.php") ?>
<?php 

 $employee = mysql_query("SELECT photo FROM employee WHERE employee_id = " . $_GET["employee_id"],$con);
    $row_employee = mysql_fetch_assoc($employee);
	unlink($row_employee["photo"]);

	
	
	
  $result = mysql_query("DELETE FROM employee WHERE employee_id = ". $_GET["employee_id"],$con);
     if($result){
		 header("location:employee_list.php?delete=done");
	 }
	 else{
		 header("location:employee_list.php?error=notdelete");
	 }
?>