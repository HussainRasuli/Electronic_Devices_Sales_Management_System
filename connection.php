
<?php 
     $con = mysql_connect("localhost","root","");
            mysql_select_db("electronic_device_sales_management_system");
	
   if(!isset($_SESSION)){
	   session_start();
   }	

?> 