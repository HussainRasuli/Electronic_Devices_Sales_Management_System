<?php require_once("connection.php");?>

<?php 
   $employee_id = $_GET["employee_id"];
   $year = $_GET["date_year"];
   $month = $_GET["date_month"];
   $day = $_GET["date_day"];

   $result = mysql_query("DELETE FROM overtime WHERE employee_id=$employee_id AND date_year=$year AND date_month=$month AND date_day=$day",$con);

   if($result){
	   header("location:overtime_detail.php?employee_id=$employee_id&date_year=$year&date_month=$month&delete=done");
   }
   else{
	   header("location:overtime_detail.php?employee_id=$employee_id&date_year=$year&date_month=$month&error=notdelete");
   }
?>
