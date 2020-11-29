
<?php require_once("connection.php") ?>
<?php 

  $result = mysql_query("DELETE FROM sales WHERE sales_id = ". $_GET["sales_id"],$con);
     if($result){
		 header("location:sales_list.php?delete=done");
	 }
	 else{
		 header("location:sales_list.php?error=notdelete");
	 }
?>