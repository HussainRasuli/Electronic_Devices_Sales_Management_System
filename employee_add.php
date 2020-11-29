<?php require_once("connection.php"); ?>
<?php 
 
 
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
	 
	 if($_FILES["photo"]["type"] == "image/jpeg" || $_FILES["photo"]["type"] == "image/png" || $_FILES["photo"]["type"] == "image/gif") {
	 
	 $path = "images/employee/" . time() . $_FILES["photo"]["name"];
	 move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
	 
$result = mysql_query("INSERT INTO employee VALUES(NULL,'$firstname','$lastname',$salary,'$currency',$email,$dob,'$phone',$gender,'$path','$province','$district','$location','$position')",$con);
    if($result){
		header("location:employee_add.php?add=done");
	}
    else{
		header("location:employee_add.php?error=notInsert");
	  }
      
    }
	else{
		  header("location:employee_add.php?filetype=invalid");
	  }
 }


?>


<?php require_once("top.php"); ?>
<?php require_once("restrict.php"); ?>
<div class="panel panel-primary">
<div class="panel-heading">
   <h1>ثبت کارمند جدید</h1>
   
</div>

<div class="panel-body">

 <?php if(isset($_GET["add"])){ ?>
	 <div class="alert alert-success text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	  کارمند جدید با موفقیت ثبت شد !
	 </div>
 <?php } ?>
 
 <?php if(isset($_GET["error"])){ ?>
	 <div class="alert alert-danger text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
	 متاسفانه کارمند جدید ثبت نشد ! لطفا دوباره کوشش کنید!
	 </div>
 <?php } ?>
 
  <?php if(isset($_GET["filetype"])){ ?>
	 <div class="alert alert-danger text-center">
	 <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
     لطفا فایل درست را انتخاب کنید مانند --->  (.jpg , .pnd , .gif )
	 </div>
 <?php } ?>
 
   <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <div class="input-group">
      <span class="input-group-addon">
	    نام:
      </span>
	  <input type="text" name="firstname" class="form-control"><br>
	   
   </div> 
   
   <div class="input-group">
  <span class="input-group-addon">
	    تخلص:
     </span>
	 <input type="text" name="lastname" class="form-control"><br>
	 
   </div>
	
	<div class="input-group">
  <span class="input-group-addon">
	    جنسیت:
     </span>&nbsp;
	<label> <input type="radio" name="gender" value="0"> مذکر </label>&nbsp;
	<label> <input type="radio" name="gender" value="1"> مونث </label>
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
	 <option><?php echo $x; ?></option>
	 <?php } ?>
	 </select>
	 
   </div>
	
	 <div class="input-group">
  <span class="input-group-addon">
	    ولایت:
     </span>
	 <input type="text" name="province" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    ولسوالی:
     </span>
	 <input type="text" name="district" class="form-control">
   </div>
	
	 <div class="input-group">
  <span class="input-group-addon">
	    آدرس:
     </span>
	 <input type="text" name="location" class="form-control">
   </div>
   </div>  
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   
    <div class="input-group">
  <span class="input-group-addon">
	    تلیفون
     </span>
	 <input type="text" name="phone" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    ایمیل:
     </span>
	 <input type="text" name="email" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    وظیفه:
     </span>
	 <input type="text" name="position" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    معاش:
     </span>
	 <input type="text" name="salary" class="form-control">
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	   واحد پولی:
     </span>
	 <select name="currency" class="form-control">
	    <option value="AFS">افغانی</option>
	    <option value="USD">دالر</option>
	 </select>
   </div>
   
    <div class="input-group">
  <span class="input-group-addon">
	    عکس:
     </span>
	 <input type="file" name="photo" class="form-control">
   </div>
   
   <input type="submit" value="ثبت نمودن" class="btn btn-success">
   
   </div>
	
   </form>


</div>
</div>
<?php require_once("footer.php");?>