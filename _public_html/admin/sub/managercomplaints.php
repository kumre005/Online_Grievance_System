
<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['subalogin'])==0)
	{	
header('location:../index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sub-Admin| Not Precessed Yet Complaints</title>
	<link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="../css/theme.css" rel="stylesheet">
	<link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='../http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<link type="text/css" href="../css/child-style.css" rel="stylesheet">
	<<link type="text/css" href="../assets/css/child-style1.css" rel="stylesheet">
	<link type="text/css" href="css/stylee.css" rel="stylesheet">
	<link type="text/css" href="../assets/css/child-style1.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>	 
	<?php
$subid=$_SESSION['suid'];
 $state="new";
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints 
join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber	
	where state='$state' and tblforwardhistory.ForwardTo='$subid'");
$notprocessedyet = mysqli_num_rows($rt); 
//inprocess
  $state="in Process";                   
$rt1 = mysqli_query($con,"SELECT * FROM tblcomplaints
join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber	
 where state='$state' and tblforwardhistory.ForwardTo='$subid'");
$inprocess = mysqli_num_rows($rt1);
//closed
  $state="closed";                   
$rt2 = mysqli_query($con,"SELECT * FROM tblcomplaints
join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber	
 where state='$state' and tblforwardhistory.ForwardTo='$subid' ");
$closed = mysqli_num_rows($rt2);

?>
 <section class="home">
 <div class="maincontent">
 <div class="col-lg-12">
  <div class="col-lg-9 main-chart">                            
						
                            <div class="col-md-2 col-sm-2 box0">
								<div class="box1">
									<span class="li_news"></span>
							
									<h3><?php echo $notprocessedyet+$inprocess+$closed;?></h3>
								</div>
								<p> Complaints not Process yet</p>
							</div>
							


</div>
 </div>
 <div class="module-body table subadmincomplaints">


							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
									<thead>
										<tr>
											<th>Complaint No</th>
											<th> complainant Name</th>
											<th>Reg Date</th>
											<th>Status</th>
											
											<th>Action</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php 
$subid=$_SESSION['suid'];
$st='in process';
$query=mysqli_query($con,"select tblcomplaints.*,users.fullName as name 
	from tblcomplaints 
	join users on users.id=tblcomplaints.userId 
	join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber	
	where tblcomplaints.state='$st' and tblforwardhistory.ForwardTo='$subid'");
while($row=mysqli_fetch_array($query))
{
?>										
										<tr>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['regDate']);?></td>
										
											<td><button type="button" class="btn btn-warning">In Process</button></td>
											
											<td>   <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>"> View Details</a> 
											</td>
											</tr>

										<?php  } ?>
										</tbody>
								</table>
							</div>
 </div>
 
</section> 

 <script src="../assets/js/child-script.js"></script>
 

</body>
</html>
<?php
}
?>