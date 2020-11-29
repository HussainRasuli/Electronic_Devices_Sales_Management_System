<?php require_once("connection.php"); ?>
<?php 
   $employee = mysql_query("SELECT * FROM employee WHERE employee_id = " . $_GET["employee_id"],$con);
     $row_employee = mysql_fetch_assoc($employee);
	   
 if(isset($_POST["firstname"])){
	 $firstname = $_POST["firstname"];
	 $lastname = $_POST["lastname"];
	 $gender = $_POST["gender"];
	 $dob = $_POST["dob"];
	 $province = $_POST["province"];
	 $district = $_POST["district"];
	 $location = $_POST["location"];
	 $position = $_POST["position"];
	 $phone = $_POST["phone"];
	 $email = $_POST["email"];
	 if($email == ""){
		 $email = "NULL";
	 }
	 else{
		 $email="'". $email ."'";
	 }
	 $salary = $_POST["salary"];
	 $currency = $_POST["currency"];
	 
	 
	 
	 if($_FILES["photo"]["name"] != ""){
	 if($_FILES["photo"]["type"] == "image/jpeg" || $_FILES["photo"]["type"] == "image/png" || $_FILES["photo"]["type"] == "image/gif"){
	        $path = "images/employee/" . time() . $_FILES["photo"]["name"];
	        move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
	 }
	  else{
		  header("location:employee_edit.php?filetype=invalid");
		  exit();
	  }
	 }
	 else{
		 $path = $row_employee["photo"];
	 }
	 
	 
$result = mysql_query("UPDATE employee SET firstname='$firstname', lastname='$lastname', gross_salary=$salary, currency='$currency', email=$email, dob=$dob, phone='$phone', gender=$gender, photo='$path', province='$province', district='$district', location='$location', position='$position' WHERE employee_id = " . $_GET["employee_id"],$con);
    if($result){
		header("location:employee_list.php?edit=done"); 
		
	}
    else{
		header("location:employee_edit.php?error=occured&employee_id=" . $_GET["employee_id"]); 
	  }
 }
 
?>


<?php require_once("top.php"); ?>
<?php require_once("restrict.php"); ?>
<div class="panel panel-primary">
<div class="panel-heading">
   <h1>ویرایش کارمند</h1>
   
</div>

<div class="panel-body">


 <?php if(isset($_GET["error"])){ ?>
	 <div class="alert alert-danger text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
      متاسفانه تغییرات انجام نشد ! لطفا دوباره کوشش کنید !
	 </div>
 <?php } ?>
 
  <?php if(isset($_GET["filetype"])){ ?>
	 <div class="alert alert-danger text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
     لطفا فایل درست را انتخاب کنید مانند --->  (.jpg , .pnd , .gif )
	 </div>
 <?php } ?>
 
   <form method="post" enctype="multipart/form-data">
   
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <div class="input-group">
      <span class="input-group-addon">
	    نام:
      </span>
	  <input value="<?php echo $row_employee["firstname"];?>" type="text" name="firstname" class="form-control">
   </div> 
   
   <div class="input-group">
  <span class="input-group-addon">
	    تخلص:
     </span>
	 <input value="<?php echo $row_employee["lastname"];?>" type="text" name="lastname" class="form-control">
   </div>
	
	<div class="input-group">
  <span class="input-group-addon">
	    جنسیت:
     </span>&nbsp;
	<label> <input <?php if($row_employee["gender"] == 0) echo "checked"; ?> type="radio" name="gender" value="0"> مذکر </label>&nbsp;
	<label> <input <?php if($row_employee["gender"] == 1) echo "checked"; ?> type="radio" name="gender" value="1"> مونث </label>
   </div>
	
	 <div class="input-group">
  <span class="input-group-addon">
	   سال تولد:
     </span>
	 <?php 
	    $year = jdate("Y","","","","en");
		$max = $year - 18;
		$min = $year - 65;
	 ?>
	 <select name="dob">
	 <?php for($x=$max; $x>=$min; $x--) { ?>
	 <option <?php if($row_employee["dob"] == $x) echo "selected"; ?>><?php echo $x; ?></option>
	 <?php } ?>
	 </select>
	 
   </div>
	
	 <div class="input-group">
  <span class="input-group-addon">
	    ولایت:
     </span>
	 <input value="<?php echo $row_employee["province"];?>" type="text" name="province" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    ولسوالی:
     </span>
	 <input value="<?php echo $row_employee["district"];?>" type="text" name="district" class="form-control">
   </div>
	
	 <div class="input-group">
  <span class="input-group-addon">
	    آدرس:
     </span>
	 <input value="<?php echo $row_employee["location"];?>" type="text" name="location" class="form-control">
   </div>
   </div>  
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   
    <div class="input-group">
  <span class="input-group-addon">
	    تلیفون
     </span>
	 <input value="<?php echo $row_employee["phone"];?>" type="text" name="phone" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    ایمیل:
     </span>
	 <input value="<?php echo $row_employee["email"];?>" type="text" name="email" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    وظیفه:
     </span>
	 <input value="<?php echo $row_employee["position"];?>" type="text" name="position" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    معاش:
     </span>
	 <input value="<?php echo $row_employee["gross_salary"];?>" type="text" name="salary" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	   واحد پولی:
     </span>
	 <select name="currency" class="form-control">
	    <option value="AFS" <?php if($row_employee["currency"] =="AFS") echo "selected"; ?>>افغانی</option>
	    <option value="USD" <?php if($row_employee["currency"] =="USD") echo "selected"; ?>>دالر</option>
	 </select>
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    عکس:
     </span>
	 <input type="file" name="photo" class="form-control">
	 <span class="input-group-addon" style="width:20px;">
	    <img src="<?php echo $row_employee["photo"];?>" width="20">
	 </span>
   </div>
   
   <input type="submit" value="ذخیره نمودن" class="btn btn-primary">
   
   </div>
	
   </form>


</div>
</div>
<?php require_once("footer.php");?>