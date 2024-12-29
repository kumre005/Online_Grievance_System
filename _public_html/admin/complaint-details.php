
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
//Code for forward complaint
if(isset($_POST['fwdsubmit']))
{
$cno=intval($_GET['cid']);	
$fwdto=$_POST['forwardto'];	
$fwdfrom=$_SESSION['id'];
$sql=mysqli_query($con,"insert into tblforwardhistory(ComplaintNumber,ForwardFrom,ForwardTo) values('$cno','$fwdfrom','$fwdto')");
if($sql)
{
    
echo "<script>alert('Complaint forwaded successfullyy.');</script>";


$sql=mysqli_query($con,"SELECT sa.EmailId
FROM tblsubadmin sa
JOIN tblforwardhistory fh ON sa.id = fh.ForwardTo
WHERE fh.ForwardTo IS NOT NULL");
while($row=mysqli_fetch_array($sql))
{
  $emailId = $row['EmailId'];
}
require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='nmietgrievance@gmail.com';
            $mail->Password='byxwyjonjhaprsau';

            // send by h-hotel email
            $mail->setFrom('nmietgrievance@gmail.com', 'Grievance NMIET complaint update');
            // get email from input
            $mail->addAddress($emailId);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Your Recent Complaint";
            $mail->Body="<b>Dear SubAdmin</b>
           
            <p>We would like to inform you that a new complaint related to your department has been raised with the following details:</p>
<ul>
  <li><strong>Complaint Number:</strong> $cno</li>
  <li><strong>User Email:</strong> $emailId</li>
</ul>
<p>Please take appropriate action to address this complaint promptly. Your attention to this matter is greatly appreciated as we work to ensure the best possible service for our Complainant.</p>
<p>Visit you dashboard <a href='https://grievancenmiet.in/admin/index.php'>department login</a> </p>
       
            <br><br>
            <p>With regrads,</p>
            <b>Grievance Support Team</b>";

              if(!$mail->send()){
                ?>
                <?php
            }else{
                ?>
                    
                <?php
            }
            echo "<script type='text/javascript'> document.location = 'manage-complaints.php'; </script>";
               
} else 
{
echo "<script>alert('Complaint forwaded successfully.');</script>";
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Complaint Details</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="css/child-style.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin = null;

function popUpWindow(URLStr, width, height) {
    // Get the width and height of the window
    var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

    // Calculate the left and top positions to center the pop-up window
    var leftPosition = (windowWidth - width) / 2;
    var topPosition = (windowHeight - height) / 2;

    // Check if a pop-up window is already open and close it
    if (popUpWin && !popUpWin.closed) {
        popUpWin.close();
    }

    // Open the pop-up window with the calculated position and dimensions
    popUpWin = window.open(
        URLStr,
        'popUpWin',
        'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + width + ',height=' + height + ',left=' + leftPosition + ',top=' + topPosition + ',screenX=' + leftPosition + ',screenY=' + topPosition
    );
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
								<h3>Complaint Details</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									
									<tbody>

<?php $st='closed';
$query=mysqli_query($con,"select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{

?>									
										<tr>
											<td><b>Complaint Number</b></td>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td><b>Complainant Name</b></td>
											<td> <?php echo htmlentities($row['name']);?></td>
											<td><b>Reg Date</b></td>
											<td><?php echo htmlentities($row['regDate']);?>
											</td>
										</tr>

<tr>
											<td><b>Category </b></td>
											<td><?php echo htmlentities($row['catname']);?></td>
											<td><b>SubCategory</b></td>
											<td> <?php echo htmlentities($row['subcategory']);?></td>
											<td><b>Complaint Type</b></td>
											<td><?php echo htmlentities($row['complaintType']);?>
											</td>
										</tr>
<tr>
<!--											<td><b>State </b></td>
											<td><?php echo htmlentities($row['state']);?></td> -->
											
											<td ><b>Applicant Type</b></td>
											<td colspan="3"><?php echo htmlentities($row['noc']);?></td>
											
										</tr>
<tr>
											<td><b>Complaint Details </b></td>
											
											<td colspan="5"> <?php echo htmlentities($row['complaintDetails']);?></td>
											
										</tr>

											</tr>
<tr>
											<td><b>File(if any) </b></td>
											
											<td colspan="5"> <?php $cfile=$row['complaintFile'];
if($cfile=="" || $cfile=="NULL")
{
  echo "File NA";
}
else{?>
<a href="../users/complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" target="_blank"/> View File</a>
<?php } ?></td>
</tr>

<tr>
<td><b>Final Status</b></td>											
<td colspan="5" style="color:red"><?php echo htmlentities($row['state']);?></td>
</tr>

<!-- Complaint forward history -->
<?php
$cmpno=intval($_GET['cid']);
$qry=mysqli_query($con,"select  tblsubadmin.SubAdminName,tblsubadmin.Department,tblforwardhistory.ForwadDate from tblforwardhistory join tblsubadmin on tblsubadmin.id=tblforwardhistory.ForwardTo where tblforwardhistory.ComplaintNumber='$cmpno'");
while($result=mysqli_fetch_array($qry))
{
?>
<tr>
<td><b>Forward to </b></td>
<td colspan="3"> <?php echo htmlentities($result['SubAdminName']);?>- (<?php echo htmlentities($result['Department']);?>)</td>
<td><b>Forward Date </b></td>
<td> <?php echo htmlentities($result['ForwadDate']);?></td>
</tr>
<?php } ?>

<!-- admin Remarks -->
<?php $ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.state as state,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
<tr>
<td><b>Remark</b></td>
<td colspan="3"><?php echo  htmlentities($rw['remark']); ?> 
<th>Remark By :</th>
<td>Admin</td>
</tr>

<tr>
<td><b>Status</b></td>
<td colspan="3"><?php echo  htmlentities($rw['state']); ?></td>
<th>Remark Date :</th>
<td ><?php echo  htmlentities($rw['rdate']); ?></td>
</tr>
<?php }?>



<!-- Sub admin Remarks -->
<?php $ret1=mysqli_query($con,"select tblsubadminremark.ComplainRemark,tblsubadminremark.ComplainStatus,tblsubadminremark.PostingDate,
	tblsubadmin.SubAdminName,tblsubadmin.Department from tblsubadminremark 
	join tblcomplaints on tblcomplaints.complaintNumber=tblsubadminremark.ComplainNumber 
	join tblsubadmin on tblsubadmin.id=tblsubadminremark.RemarkBy 
	where tblsubadminremark.ComplainNumber='".$_GET['cid']."'");
while($rww=mysqli_fetch_array($ret1))
{
?>
<tr>
<td><b>Remark</b></td>
<td colspan="3"><?php echo  htmlentities($rww['ComplainRemark']); ?> 
<th>Remark By :</th>
<td><?php echo  htmlentities($rww['SubAdminName']); ?>-(<?php echo  htmlentities($rww['Department']); ?>)</td>
</tr>

<tr>
<td><b>Status</b></td>
<td colspan="3"><?php echo  htmlentities($rww['ComplainStatus']); ?></td>
<th>Remark Date :</th>
<td ><?php echo  htmlentities($rww['PostingDate']); ?></td>
</tr>
<?php }?>

<tr>
											<td><b>Action</b></td>
											
											<td colspan="5"> 
<?php 
if($row['state']!='closed'){
$cno=$_GET['cid'];
$sql=mysqli_query($con,"select  id from tblforwardhistory 
join tblcomplaints on tblcomplaints.complaintNumber=tblforwardhistory.ComplaintNumber
	where tblforwardhistory.ComplaintNumber='$cno' and (tblcomplaints.state='in process' || tblcomplaints.state='new' || tblcomplaints.state is null) ");
$result=mysqli_num_rows($sql);
if($result==0){
?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Forward To</button>
<?php }} ?>


											<?php if($row['state']=="closed"){

												} else {?>
<a href="javascript:void(0);" onClick="popUpWindow('updatecomplaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">Take Action</button>
											</a><?php } ?>

											<a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">View User Details</button></a></td>
											
										</tr>
										<?php  } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
<!-- Complaint Forward To --->
 <form name="forwardto" method="post">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Complaint Number# <?php echo $_GET['cid'];?></h4>
      </div>
     
      <div class="modal-body">
      	<label class="control-label" for="forwardto"><strong>Forward To</strong></label>
        <p><select class="span4 tip" name="forwardto" required="true">
        	<option value=""> Select SubAdmin/ Subordinate</option>
        	<?php $ret=mysqli_query($con,"select id,SubAdminName,Department from  tblsubadmin");
        	while($row=mysqli_fetch_array($ret))
        	{
        	?>
        	<option value="<?php echo $row['id']?>"><?php echo $row['SubAdminName']?> (<?php echo $row['Department']?>)</option>
        <?php } ?>
        </select></p>
      </div>
 
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="fwdsubmit">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
     </form>
<!-- Complaint Forward To End --->

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
</body>
<?php } ?>