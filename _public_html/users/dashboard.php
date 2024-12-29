<!-- Coding by CodingLab | www.codinglabweb.com -->
<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:../index.php');
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	 <link rel="stylesheet" href="assets/css/child-style.css">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
	 <link rel="stylesheet" href="assets/css/child-style.css">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
	  <link rel="stylesheet" href="assets/css/sidebar3-style.css">
	    <link rel="stylesheet" href="Animated-Radial-Menu.css">
	
    <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script defer src="Animated-Radial-Menu.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Sidebar Menu</title> 
    
     <script src="assets/js/sidebar3-script.js"></script>
</head>
<body>

<?php include("includes/header.php");?>

<div class="usershome">
   
<?php include("includes/sidebar.php");?>
<div class="mobile-menu2"><?php include("includes/sidebar3.php");?></div>

   

    <section class="home">
        <div class="col-lg-12 main-chart">                            					
            <div class="col-sm-2 box0">
				<div class="box1">
					<span class="li_news"></span>
					<?php 
					$state="new";                   
					$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  state='$state'");
					$num1 = mysqli_num_rows($rt);
					{?>
					<h3><?php echo htmlentities($num1);?></h3>
                </div>
                <p><?php echo htmlentities($num1);?> New</p>
            </div>
					<?php }?>
			<div class="col-sm-2 box0">
				<div class="box1">
					<span class="li_news"></span>
					<?php 
					$state="In Process";                   
					$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  state='$state'");
					$num1 = mysqli_num_rows($rt);
					{?>
					<h3><?php echo htmlentities($num1);?></h3>
                </div>
                <p><?php echo htmlentities($num1);?> In Process</p>
            </div>
					<?php }?>
			<div class="col-sm-2 box0">
				<div class="box1">
					<span class="li_news"></span>
					<?php 
					$state="Closed";                   
					$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."' and  state='$state'");
					$num1 = mysqli_num_rows($rt);
					{?>
					<h3><?php echo htmlentities($num1);?></h3>
                </div>
                <p><?php echo htmlentities($num1);?> Closed</p>
            </div>
					<?php }?>
			<div class=" col-sm-2 box0">
				<div class="box1">
					<span class="li_news"></span>
					<?php 
					$state="Total";                   
					$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where userId='".$_SESSION['id']."'");
					$num1 = mysqli_num_rows($rt);
					{?>
					<h3><?php echo htmlentities($num1);?></h3>
                </div>
                <p><?php echo htmlentities($num1);?> Total</p>
            </div>
					<?php }?>
                                  <div class="col-sm-12" style="padding-left:0px;">


<section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr  class="heading"style="text-align: center">
                                  <th style="text-align: center">Complaint Number</th>
                                  <th style="text-align: center">Reg Date</th>
                                  <th style="text-align: center">last Updation date</th>
                                  <th style="text-align: center">Status</th>
                                  <th style="text-align: center">Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
  <?php


   $query=mysqli_query($con,"select * from tblcomplaints where userId='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
  ?>
                              <tr>
                                  <td align="center"><?php echo htmlentities($row['complaintNumber']);?></td>
                                  <td align="center"><?php echo htmlentities($row['regDate']);?></td>
                                 <td align="center"><?php echo  htmlentities($row['lastUpdationDate']);

                                 ?></td>
                                  <td align="center"><?php 
                                    $state=$row['state'];
                                    if($state=="New")
                                    { ?>
                                      <button type="button" class="btn btn-theme04">Not Process Yet</button>
                                   <?php }
 if($state=="in process"){ ?>
<button type="button" class="btn btn-warning">In Process</button>
<?php }
if($state=="closed") {
?>
<button type="button" class="btn btn-success">Closed</button>
<?php } 
if($state=="resolved"){ ?>
<button type="button" class="btn btn-warning">Resolved</button>
<?php } ?> 
                                 <td align="center">
                                   <a href="complaint-d.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">
<button type="button" class="btn btn-primary">View Details</button></a>
                                   </td>
                                </tr>
                              <?php } ?>
                            
                              </tbody>
                          </table>
                          </section>
						  </div>
    </section>
</div>


    <script src="assets/js/child-script.js"></script>
      <script src="assets/js/script3.js"></script>
    

</body>
</html>
<?php
}
?>