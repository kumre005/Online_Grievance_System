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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | Complaint Details</title>

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
  </head>

  <body>

<?php include("includes/header.php");?>

<div class="usershome">
<?php include("includes/sidebar.php");?>

</div>

<div class="col-lg-10" style="top: 10em;
    left: 11%;">
     <div class="mobile-menu2"><?php include("includes/sidebar3.php");?></div>
<h3><i class="fa fa-angle-right"></i> Complaint Details</h3>
                  <div class="form-panel">
											
						 <?php if($successmsg)
											  {?>
											  <div class="alert alert-success alert-dismissable">
											   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											  <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
											  <?php }?>

						   <?php if($errormsg)
											  {?>
											  <div class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											  <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
											  <?php }?>

                  
	
	
                 <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >
				

					 
					<div class="form-group">
					
				 <?php $query=mysqli_query($con,"select tblcomplaints.*,category.categoryName as catname from tblcomplaints join category on category.id=tblcomplaints.category where userId='".$_SESSION['id']."' and complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>

						<div class="col-sm-6 cmpinput1">
							<label>Complaint Number</label>
							<input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['complaintNumber']);?>" class="form-control" readonly>
						</div>

						<div class="col-sm-6 cmpinput2">
							<label>Status</label>
							<input name="status" required="required" value="<?php echo htmlentities($row['state']);?>" class="form-control" disabled>
							
								
							
						</div>
						
						
						<div class="col-sm-6 cmpinput1">
							<label>Priority</label>
							<input name="Priority" required="required" value="<?php echo htmlentities($row['Priority']);?>" class="form-control" disabled>
								
								

							
						</div>

						<div class="col-sm-6 cmpinput2">
							<label>Opened On</label> 
							<input type="text" name="contactno" required="required" value="<?php echo htmlentities($row['regDate']);?>" class="form-control" readonly>
						</div>
						
						<div class="col-sm-6 cmpinput1">
							<label>Applicant Type</label>
							<input name="noc"  class="form-control" value="<?php echo htmlentities($row['noc']);?>" required="" readonly>														
							
						</div>
						<div class="col-sm-6 cmpinput2">
							<label>Complaint Type</label>
							<input name="complaintype" class="form-control" value=" <?php echo htmlentities($row['complaintType']);?>" required="" readonly>
								
							</select> 
						</div>
						
						<div class="col-sm-6 cmpinput1">
							<label>Category</label>
							<input name="category" id="category" class="form-control"value="<?php echo htmlentities($row['catname']);?>" required="" readonly>
								
							
						</div>
						<div class="col-sm-6 cmpinput2">
							<label>SubCategory</label>
							<input name="subcategory" value="<?php echo htmlentities($row['subcategory']);?>" id="subcategory" class="form-control" readonly>
							
							
						</div>
						
						
						
						
						<div class="col-sm-12 cmpinput1 shortdesc">
							<label>Short Description</label>
							<textarea  name="complaindetails"  placeholder="<?php echo htmlentities($row['complaintDetails']);?>" required="required" cols="10" rows="3" class="form-control" maxlength="2000" readonly></textarea>
						</div>
						
							<div class="col-sm-6 cmpinput1">
							<label>Evidence File</label>
							<span class="proof">
							<?php $cfile=$row['evFile'];
if($cfile=="" || $cfile=="NULL")
{
  echo "File NA";
}
else{?>
							<a href="complaintdocs2/<?php echo htmlentities($row['evFile']);?>" target="_blank"/> View File</a>
						
							<?php } ?>
							</span>
							
						</div>
							<div class="col-sm-6 cmpinput2">
							<label>Your File</label>
								<span class="proof">
							<?php $dfile=$row['complaintFile'];
if($dfile=="" || $dfile=="NULL")
{
  echo "File NA";
}
else{?>
							<a href="complaintdocs/<?php  echo htmlentities($row['complaintFile']);?>" target="_blank"/> View File</a>
						
				<?php } ?>	
				</span>
						</div>
						
								
						
						<div class="col-sm-12 cmpinput1 shortdesc">
						    
                            <label>Remarks</label>
                          
								<div class="col-sm-12 cmpinput1 remarks">
							      <?php $ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.state as sstate,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
                                    while($rw=mysqli_fetch_array($ret))
                                    {
                                    ?>
        							   <div class="col-sm-12 remarkmain"> 
        							        <div class="col-sm-6 remark1">Remark By:  Admin</div>
        							        <div class="col-sm-6 remark2"> <?php echo "Remark Date :". htmlentities($rw['rdate'])."\n"; ?></div><br>
        							        <div class="col-sm-12" style="text-align:center;">----------------------------------------------------------------------------------</div>
        							        <div class="col-sm-12 remarkmainn"> <?php echo  htmlentities($rw['remark'])."\n \n"; ?></div>
        							   </div>
							   
							        <?php }?>
							   
							   <?php $ret1=mysqli_query($con,"select tblsubadminremark.ComplainRemark,tblsubadminremark.Complainstatus,tblsubadminremark.PostingDate,
  tblsubadmin.SubAdminName,tblsubadmin.Department from tblsubadminremark 
  join tblcomplaints on tblcomplaints.complaintNumber=tblsubadminremark.ComplainNumber 
  join tblsubadmin on tblsubadmin.id=tblsubadminremark.RemarkBy 
  where tblsubadminremark.ComplainNumber='".$_GET['cid']."'");
while($rww=mysqli_fetch_array($ret1))
{?>
							   
							   
							   
							    <div class="col-sm-12 remarkmain"> 
        							        <div class="col-sm-6 remark1">Remark By:   <?php echo  htmlentities($rww['SubAdminName']); ?>(<?php echo  htmlentities($rww['Department']); ?> )</div>
        							        <div class="col-sm-6 remark2"> Remark Date:<?php echo  htmlentities($rww['PostingDate']); ?></div><br>
        							        <div class="col-sm-12" style="text-align:center;">----------------------------------------------------------------------------------</div>
        							        <div class="col-sm-12 remarkmainn">  <?php echo  htmlentities($rww['ComplainRemark']); ?></div>
        							   </div>

                             <?php  } ?>
													


 





						
							
						</div>

					
						 <?php  } ?>
						 </div>
					</div>

				</form>
											  </div>
											  
											  </div>
											   
<?php include('includes/footer.php');?>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
	  <script src="assets/js/child-script.js"></script>
	    <script src="assets/js/script3.js"></script>
    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
