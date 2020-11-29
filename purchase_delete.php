
<?php require_once("connection.php") ?>
<?php 

  $result = mysql_query("DELETE FROM purchase WHERE purchase_id = ". $_GET["purchase_id"],$con);
     if($result){
		 header("location:purchase_list.php?delete=done");
	 }
	 else{
		 header("location:purchase_list.php?error=notdelete");
	 }
?>