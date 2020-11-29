
<?php 
 if(!isset($_SESSION)){
	 session_start();
 }
 
  unset($_SESSION["user_id"]);
  header("location:index.php");



?>