<?php
session_start();
error_reporting(0);
include('includes/config.php');
$currentTimestamp = date("Y-m-d H:i:s", strtotime("now"));
if(strlen($_SESSION['login'])==0)
  { 
header('location:../index.php');
}
else{

if(isset($_POST['submit']))
{

$uid=$_SESSION['id'];
$category=$_POST['category'];
$subcat=$_POST['subcategory'];
$complaintype=$_POST['complaintype'];
$status=$_POST['status'];
$priority=$_POST['priority'];
$noc=$_POST['noc'];
$complaintdetials=$_POST['complaindetails'];
$compfile=$_FILES["compfile"]["name"];



move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);

$query=mysqli_query($con,"insert into tblcomplaints(userId,category,subcategory,complaintType,noc,complaintDetails, complaintFile,priority,regDate,status) values('$uid','$category','$subcat','$complaintype','$noc','$complaintdetials','$compfile','$priority','$currentTimestamp','$status')");
// code for show complaint number
$sql=mysqli_query($con,"select complaintNumber , userEmail as email from tblcomplaints join users on users.id=tblcomplaints.userId  order by complaintNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['complaintNumber'];
 $email=$row['email'];
 
}
$complainno = $cmpn;

// Send email to the user
require "Mail/phpmailer/PHPMailerAutoload.php";
$mailToUser = new PHPMailer;

$mailToUser->isSMTP();
$mailToUser->Host = 'smtp.gmail.com';
$mailToUser->Port = 587;
$mailToUser->SMTPAuth = true;
$mailToUser->SMTPSecure = 'tls';

// Sender's email (you can change this)
$mailToUser->Username = 'nmietgrievance@gmail.com';
$mailToUser->Password = 'byxwyjonjhaprsau';

// Set the sender and recipient for the user
$mailToUser->setFrom('nmietgrievance@gmail.com', 'Grievance NMIET complaint update');
$mailToUser->addAddress($email); // User's email address

// HTML body for the user
$mailToUser->isHTML(true);
$mailToUser->Subject = "Your Recent Complaint No. $complainno";
$mailToUser->Body = "<b>Dear $b,</b>

<p>We hope this message finds you well. We would like to confirm that we have received your recent complaint with the reference number: <strong>$complainno</strong>. Your feedback is important to us, and we are committed to addressing your concerns as swiftly as possible.

Our dedicated team is actively reviewing your complaint and working diligently to find a resolution. We understand the importance of providing a prompt and effective response, and we assure you that we are focused on achieving a satisfactory outcome for you.

To track the status of your complaint, please follow these steps:
<ol>
    <li>Visit our <a href='https://grievancenmiet.in'>grievancenmiet.in</a>.</li>
    <li>Contact our support hotline at <a href='tel:02114 – 231666'>02114 – 231666</a>.</li>
</ol>

We appreciate your patience during this process. If you have any further information to provide or any questions, please feel free to reply to this email or reach out to our dedicated support team at <a href='mailto:nmietgrievance@gmail.com'>nmietgrievance@gmail.com</a> or call us at <a href='tel:02114 – 231666'>02114 – 231666</a>.

Thank you for bringing this matter to our attention. We value your feedback and remain committed to ensuring your satisfaction.

<br><br>
With regards,<br>
<b>Grievance Support Team</b>";

// Send email to the admin
$mailToAdmin = new PHPMailer;

$mailToAdmin->isSMTP();
$mailToAdmin->Host = 'smtp.gmail.com';
$mailToAdmin->Port = 587;
$mailToAdmin->SMTPAuth = true;
$mailToAdmin->SMTPSecure = 'tls';

// Sender's email (you can change this)
$mailToAdmin->Username = 'nmietgrievance@gmail.com';
$mailToAdmin->Password = 'byxwyjonjhaprsau';

// Set the sender and recipient for the admin
$mailToAdmin->setFrom('nmietgrievance@gmail.com', 'Grievance NMIET complaint update');
$mailToAdmin->addAddress('yadavomkar1133@gmail.com'); // Admin's email address

// HTML body for the admin
$mailToAdmin->isHTML(true);
$mailToAdmin->Subject = "New Complaint Raised (Complaint No. $complainno)";
$mailToAdmin->Body = "<b>Dear Admin,</b>

<p>A new complaint has been submitted with the following details:</p>

<ul>
        <li><strong>Complaint No:</strong> $complainno</li>
        <li><strong>User Email:</strong> $email</li>
    </ul>

<p>Please review the complaint and take appropriate action as necessary.</p>

    <p>Thank you for your prompt attention to this matter.</p>

<br><br>
With regards,<br>
<b>Grievance Support Team</b>";

 $mailToUser->send();


            if ($mailToAdmin->send()) {
                
                ?>
                    <script>
                        window.location.replace("notification.html");
                    </script>
                    
                
            
                <?php
            }else{
                ?>
                    <script>
                       alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }
            
           

           
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
	     <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		  <link rel="stylesheet" href="assets/css/sidebar3-style.css">
	  <link rel="stylesheet" href="Animated-Radial-Menu.css">
	
    <script defer type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script defer src="Animated-Radial-Menu.js"></script>

  
    <title>Hello, world!</title>
    <script>
        function callBothFunctions(val) {
    getCat(val);
    getpriority(val);
}

    </script>
     <script>
function getpriority(val) {
  $.ajax({
    type: "POST",
    url: "getpriority.php",
    data: 'catid=' + val,
    success: function(data) {
      $("#priority").html(data);
    }
  });
}
  
  $("#priority").on("change", function(event) {
  event.preventDefault();
  getpriority($(this).val());
}, { passive: false });
  </script>
 <script>
function getCat(val) {
  $.ajax({
    type: "POST",
    url: "getsubcat.php",
    data: 'catid=' + val,
    success: function(data) {
      $("#subcategory").html(data);
    }
  });
}
  
  $("#subcategory").on("change", function(event) {
  event.preventDefault();
  getCat($(this).val());
}, { passive: false });


  </script>
  
 
  </head>
  <body>
      
<?php include("includes/header.php");?>

<div class="usershome">
<?php include("includes/sidebar.php");?>
<div class="mobile-menu2"><?php include("includes/sidebar3.php");?></div>

 <section class="home">
         <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Lodge Complaint</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
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
					
				

						<div class="col-sm-6 cmpinput1">
							<label>Complaint Number</label>
							<input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['fullName']);?>" class="form-control" readonly>
						</div>

						<div class="col-sm-6 cmpinput2">
							<label>Status</label>
							<select name="status" required="required" class="form-control" disabled>
								<option value="new">New</option >
								
							</select>
						</div>
						
						<div class="col-sm-6 cmpinput1">
							<label>Priority</label>
							<select name="priority" id="priority" class="form-control" readonly>
								

							</select>
						</div>

						<div class="col-sm-6 cmpinput2">
							<label>Opened On</label> 
							<input type="text" name="contactno" required="required" value="<?php echo htmlentities($currentTimestamp);?>" class="form-control" readonly>
						</div>
						
						<div class="col-sm-6 cmpinput1">
							<label>Applicant Type</label>
							<select name="noc"  class="form-control" required="">
								<option value="applicanttype">Applicant Type</option>
								<option value="Student"> Student</option>
								<option value="Staff">Staff</option>
								
							</select> 
						</div>

						
						<div class="col-sm-6 cmpinput1">
							<label>Category</label>
<select name="category" id="category" class="form-control" onChange="callBothFunctions(this.value);" required="">
    <option value="">Select Category</option>
    <?php
    $sql = mysqli_query($con, "SELECT id, categoryName FROM category ORDER BY priorityId");
    while ($rw = mysqli_fetch_array($sql)) {
    ?>
        <option value="<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['categoryName']); ?></option>
    <?php
    }
    ?>
</select>

						</div>
						<div class="col-sm-6 cmpinput2">
							<label>SubCategory</label>
							<select name="subcategory" id="subcategory" class="form-control" >
								<option value="">Select Subcategory</option>
							</select>
						</div>
						
					
						
						<div class="col-sm-6 cmpinput2">
							<label>Complaint Type</label>
							<select name="complaintype" class="form-control" required="">
								<option value=" Complaint"> Complaint</option>
								<option value="General Query">General Query</option>
							</select> 
						</div>
													<div class="col-sm-12 cmpinput1 fileinput ">
<label>Complaint Doc(if any) </label>

<input type="file" name="compfile" class="form-control" value="">

</div>
						
						<div class="col-sm-12 cmpinput1 shortdesc">
							<label>Short Description</label>
							<textarea  name="complaindetails" required="required" cols="10" rows="3" class="form-control" maxlength="2000"></textarea>
						</div>
						


						
					 <div class="form-group">
						<div class="col-sm-12" style="text-align:center;">
							
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
