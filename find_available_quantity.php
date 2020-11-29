<?php require_once("connection.php");?>
<?php 
     
	 $product_id = $_POST["id"];

    $product = mysql_query("SELECT * FROM product WHERE product_id = $product_id",$con);
     $row_product = mysql_fetch_assoc($product);
 
     echo $row_product["quantity"];

?>


 