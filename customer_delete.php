
<?php require_once("connection.php"); ?>
<?php 

$result = mysql_query("DELETE FROM customer WHERE customer_id=". $_GET["customer_id"],$con);

 if($result){
     header("location:customer_list.php?delete=done");
 }
 else{
     header("location:customer_list.php?error=notdelete");
 }


?>
