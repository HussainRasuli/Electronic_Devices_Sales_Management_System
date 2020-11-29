<?php require_once("connection.php"); ?>
<?php 
      $user = mysql_query("SELECT user_id FROM users",$con);
           $row_user = mysql_fetch_assoc($user);

?>
<?php require_once("jdf.php"); ?>
<?php if(!isset($_SESSION)){
     session_start(); 
} 
?>
<html>
<head>
    <title> tech business_company </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	
	<script src="js/script.js" type="text/javascript"></script>
	
	<meta charset="utf-8">
	
</head>
<body>


<div id="banner" style="background-image:url(images/logo/e.jpg);">


 <div id="search" class="noprint col-lg-4 col-md-4 col-sm-4 col-xs-12">
    
      <form>
	     <div class="input-group" style="margin-top:10px;">
		  <span class="input-group-addon"> جستجو: </span>
	        <input placeholder="کلمه مورد نظر خود را تایپ کنید..." class="form-control" type="text" name="search">
			<span class="input-group-btn">
			<button class="btn btn-primary">     
			    <span class="glyphicon glyphicon-search"></span>
			    جستجو
			</button>
		    </span>
			 </div>
			 
			<input type="hidden" name="page" value="1">
	 </form>
	 
 </div>
   
   <div class="clearfix"></div>
   
  <?php if(isset($_SESSION["user_id"])) { ?>
			<div class="noprint pull-left" style="color:black;direction:ltr;margin-top:74px;margin-left:8px;">
				<span class="glyphicon glyphicon-user"></span>
				<?php 
					$result = mysql_query("SELECT username FROM users WHERE user_id = " . $_SESSION["user_id"], $con);
					$row_result = mysql_fetch_assoc($result);
					echo $row_result["username"];
				?>
			</div>
		<?php } ?>
		
		<div class="clearfix"></div>
</div>

 <div id="menu" class="noprint">
 <nav class="navbar navbar-default navbar-inverse" role="navigation" style="z-index:9999;position:relative;">
<a href="logout.php" class="pull-left" style="margin-left:30px;text-decoration:none;color:white;">
					خروج
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
      <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
			<div class="collapse navbar-collapse" id="collapse">

			<ul class="nav navbar-nav">
				<li><a href="home.php">صفحه اصلی</a></li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">کارمندان <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="employee_add.php">ثبت کارمند جدید</a></li>
						<li><a href="employee_list.php">لیست کارمندان</a></li>
						<li><a href="attendance_list.php">حاضری کارمندان</a></li>
						<li><a href="overtime_list.php">اضافه کاری کارمندان</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">خریداری <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="purchase_add.php">ثبت خریداری جدید</a></li>
						<li><a href="purchase_list.php">لیست خریداری ها</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">مشتریان <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="customer_add.php">ثبت مشتری جدید</a></li>
						<li><a href="customer_list.php">لیست مشتریان</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">گدام <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="product_add.php">ثبت محصول جدید</a></li>
						<li><a href="product_list.php">لیست محصولات</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">فروشات <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="sales_add.php">ساخت بل جدید</a></li>
						<li><a href="sales_list.php">بل های فروخته شده</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">مالی <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="salary_list.php">پرداخت معاشات</a></li>
					</ul>
				</li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">استفاده کننده<span class="caret"></span></a>
					<ul class="dropdown-menu">

  					    
						<li><a href="user_edit.php?user_id=<?php echo $row_user["user_id"];?>">تغییر حساب و رمز ورود</a></li>
					</ul>
				</li>
			</ul>
			
		
			</div>
        </nav>
	</div>
    <div class="clearfix"></div>
<div id="sidebar" class="noprint col-lg-3 col-md-3 col-sm-3 col-xs-12" style="background-image:url(images/logo/r.jpg);background-repeat:no-repeat;"></div>
<div id="content" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
