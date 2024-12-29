<?php
session_start();
error_reporting(E_ALL);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:../index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

$username = $_SESSION['login'];
if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$contactno=$_POST['contactno'];
$city=$_POST['city'];
$address=$_POST['address'];
$pincode=$_POST['pincode'];
$email=$_POST['useremail'];
$image=$_POST['image'];
$imgfile=$_FILES["image"]["name"];

// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");

// Validation for allowed extensions .in_array() function searches an array for a specific value.


//rename the image file
$imgnewfile=$imgfile.$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"userimages/".$imgnewfile);
// Query for insertion data into database
$query=mysqli_query($con,"update users set userImage='$imgnewfile' where username='$username'");



$query=mysqli_query($con,"update users set fullName='$fname',contactNo='$contactno',city='$city',userEmail='$email',address='$address',pincode='$pincode' where username='$username'");
if($query)
{
$successmsg="Profile Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Grievance Redressal System| User Change Password</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	 <link rel="stylesheet" href="assets/css/child-style.css">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
	 <link rel="stylesheet" href="assets/css/child-style.css">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	 <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
	 	  <link rel="stylesheet" href="assets/css/sidebar3-style.css">
	   <link rel="stylesheet" href="Animated-Radial-Menu.css">
	
    <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script defer src="Animated-Radial-Menu.js"></script>
  
  </head>

  <body>
  
  
<?php include("includes/header.php");?>

<div class="usershome">
<?php include("includes/sidebar.php");?>
<div class="mobile-menu2"><?php include("includes/sidebar3.php");?></div>
   <section class="home">
        <section id="main-content">
          	<section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Profile info</h3>
          	<!-- BASIC FORM ELELEMNTS -->
				<div class="row mt">
					<div class="col-lg-12">
						<div class="form-panel">
							<?php if($successmsg)
							{?>
							<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<b>Well done!</b> <?php echo htmlentities($successmsg);?>
							</div>
							<?php }?>
							<?php if($errormsg)
							{?>
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<b>Oh snap!</b> 
								<?php echo htmlentities($errormsg);?>
							</div>
							<?php }?>
							<?php $query = mysqli_query($con, "SELECT * FROM users WHERE username='" . $_SESSION['login'] . "'");
while ($row = mysqli_fetch_array($query)) {
     ?>                  
								<h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['fullName']);?>'s Profile</h4>
								<h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>																				
									<form class="form-horizontal profile-form style-form" method="post" name="profile" >									
										<div class="form-group">																			
											<div class="col-sm-4">
												<label>First Name</label>
												<input type="text" name="fullname"  value="<?php echo htmlentities($row['fullName']);?>" class="form-control" >
											</div>
											<div class="col-sm-4">
												<label>Contact No</label>
												<input type="text" name="contactno"  value="<?php echo htmlentities($row['contactNo']);?>" class="form-control">
											</div>																		
											<div class="col-sm-4">
												<label>Email ID</label>
												<input type="email" name="useremail" value="<?php echo htmlentities($row['userEmail']);?>" class="form-control">
											</div>
											<div class="col-sm-4">
												<label>Address</label>
												<textarea  name="address"  class="form-control"><?php echo htmlentities($row['address']);?></textarea>
											</div>								
											<div class="col-sm-4">
												<label>City</label>
												<input type="text" name="city"  value="<?php echo htmlentities($row['city']);?>" class="form-control">
											</div>				
											<div class="col-sm-4">
												<label>Pincode</label>
												<input type="text" name="pincode" maxlength="6"  value="<?php echo htmlentities($row['pincode']);?>" class="form-control">
											</div>
											<div class="col-sm-4">
												<label>RegDate</label>
												<input type="text" name="regdate"  value="<?php echo htmlentities($row['regDate']);?>" class="form-control" readonly>
											</div>
										 <?php } ?>
											<div class="col-sm-10" style="padding-left:41% ">
												
												<button type="submit" name="submit" class="btn btn-primary">Update</button>
											</div>
										</div>
									</form>
						</div>
					</div>
				</div>
			</section>
      	</section>
    </section>
</div>
    
     
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  <script src="assets/js/child-script.js"></script>
    <script src="assets/js/script3.js"></script>
  </body>
</html>
<?php } ?>
