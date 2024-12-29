
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../admin/index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['uid']) && $_GET['action']=='del')
{
$userid=$_GET['uid'];
$query=mysqli_query($con,"delete from users where id='$userid'");
header('location:manage-users.php');
}



if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


if(isset($_POST['submit']))
{
//Getting post values
$saname=$_POST['subadmin'];
$sadept=$_POST['subadmindept'];
$saemail=$_POST['emailid'];
$sacontactno=$_POST['contactno'];
$sausername=$_POST['sadminusername'];
$sapass=md5($_POST['sapassword']);
$isactive='1';
$query=mysqli_query($con,"insert into tblsubadmin(SubAdminName,Department,EmailId,ContactNumber,UserName,Password,IsActive) values('$saname','$sadept','$saemail','$sacontactno','$sausername','$sapass','$isactive')");
if($query){
echo "<script>alert('Sub admin details added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
} else {
echo "<script>alert('Something went wron. Please try again.');</script>";
}

}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Manage Subadmins</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="css/child-style.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
			<script language="javascript" type="text/javascript">
				var popUpWin=0;
				function popUpWindow(URLStr, left, top, width, height)
				{
				 if(popUpWin)
				{
				if(!popUpWin.closed) popUpWin.close();
				}
				popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
				}
			</script>
			<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#sadminusername").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	</head>
	<body>
		<?php include('include/header.php');?>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<?php include('include/sidebar.php');?>				
					<div class="span9">
						<div class="content">
							<div class="module">
								<div class="module-head">						
									<div class="subtopbar row" style="margin-left:0px; display:flex;">
										<div class="col-md-6 managesubadmin">
											<h3>Manage Subadmins</h3>
										</div>
										<div class="col-md-6" >
											<button type="button" class="insertbutton"data-toggle="modal" data-target="#addmembermodal">
												<span class="insertbutton__text">Add Member</span>
												<span class="insertbutton__icon">
													<ion-icon name="person-add-outline"></ion-icon>
												</span>
											</button>
										</div>
									</div>
								</div>								
								<!-- Modal -->
								<div class="modal fade" id="addmembermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="form-horizontal row-fluid" name="su-admin" method="post" >																	
													<div class="control-group">
														<label class="control-label" for="basicinput">Sub-admin Name</label>
															<div class="controls">
																<input type="text" placeholder="Enter Sub-admin Name"  name="subadmin" class="span8 tip" required>
															</div>
													</div>

													<div class="control-group">
													<label class="control-label" for="basicinput">Sub-admin Department</label>
													<div class="controls">
													<input type="text" placeholder="Enter Sub-admin Department"  name="subadmindept" class="span8 tip" required>
													</div>
													</div>

													<div class="control-group">
													<label class="control-label" for="basicinput">Email id</label>
													<div class="controls">
													<input type="email" placeholder="Enter Sub-admin Email id"  name="emailid" class="span8 tip" required>
													</div>
													</div>


													<div class="control-group">
													<label class="control-label" for="basicinput">Contact Number</label>
													<div class="controls">
													<input type="text" placeholder="Enter Sub-admin Contact No." pattern="[0-9]{10}" title="10 numeric characters only"  name="contactno" class="span8 tip" required maxlength="10">
													</div>
													</div>

													<div class="control-group">
													<label class="control-label" for="basicinput">Username (used for login)</label>
													<div class="controls">
													<input type="text" placeholder="Enter Sub-admin Username"  name="sadminusername" id="sadminusername" class="span8 tip" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="Username must be alphanumeric 6 to 12 chars" onBlur="checkAvailability()"  required>
													   <p><span id="user-availability-status" style="font-size:12px;"></span> </p>
													</div>
													</div>

													<div class="control-group">
													<label class="control-label" for="basicinput">Password</label>
													<div class="controls">
													<input type="password" placeholder="Enter Sub-admin Password"  name="sapassword" class="span8 tip" required>
													</div>
													</div>
													</div>
													<div class="control-group">
														<div class="controls">
															<button type="submit" name="submit"  id="submit" class="btn btn-primary">Submit</button>
														</div>
													</div>
												</form>												
											</div>
										</div>
									</div>
								</div>
							<div class="module-body table">



							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Department</th>
											<th>Email </th>
											<th>Contact no</th>
											<th>Reg. Date </th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from tblsubadmin");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['SubAdminName']);?></td>
											<td><?php echo htmlentities($row['Department']);?></td>
											<td> <?php echo htmlentities($row['EmailId']);?></td>
											<td> <?php echo htmlentities($row['ContactNumber']);?></td>
											<td><?php echo htmlentities($row['RegDate']);?></td>

<td>
	<a href="edit-subadmin.php?sid=<?php echo htmlentities($row['id']);?>">
<button type="button" class="btn btn-primary">Edit</button>
											</a>


										</td>
											
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
	<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
	
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php }} ?>