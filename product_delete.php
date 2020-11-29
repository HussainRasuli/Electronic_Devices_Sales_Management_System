
<?php require_once("connection.php"); ?>
<?php 
    $result = mysql_query("DELETE FROM product WHERE product_id=" . $_GET["product_id"],$con);
     if($result){
	    header("location:product_list.php?delete=done");
	 }
     else{
	    header("location:product_list.php?error=notdelete");
	 }


?>