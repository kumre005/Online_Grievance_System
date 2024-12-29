<?php
 session_start();
include('include/config.php');



error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../admin/index.php');
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
	<title>Admin| Dashboard</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="css/child-style.css" rel="stylesheet">
	
	<link type="text/css" href="css/stylee.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

</head>
<body>
<?php include('include/header.php');?>
	
	<div class="wrapper">
		<div class="container adminpage" id="page_id02">
			<div class="row admin" id="admin">
				<?php include('include/sidebar.php');?>	
			
			<div class="span9" id="adminrightside">
				<?php
						include 'index7.php';
				
						?>	
				
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Closed Complaints</h3>
							</div>
							<div class="module-body table">


							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
									<thead>
										<tr>
											<th>Complaint No</th>
											
											<th>Reg Date</th>
											<th>Priority</th>
											<th>Status</th>
											
											<th>Action</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php 
$priorityDays = array(
    "P1" => 2,
    "P2" => 4,
    "P3" => 7,
    "P4" => 15
);

$st='closed';
$query = "
    SELECT *
    FROM tblcomplaints
    WHERE
        RegDate < NOW() - INTERVAL ? DAY AND
        state != 'closed' AND
        priority = ?
";
$stmt = $con->prepare($query);
if ($stmt) {
    // Bind parameters and execute the query for each priority and days combination
    foreach ($priorityDays as $priority => $days) {
        $stmt->bind_param("is", $days, $priority);
        $stmt->execute();

        $result = $stmt->get_result();

	

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
?>										
										<tr>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											
											<td><?php echo htmlentities($row['regDate']);?></td>
										<td><?php echo htmlentities($row['Priority']);?></td>
											
											<td><?php echo htmlentities($row['state']);?></td>
											<td>   <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>"> View Details</a> 
											</td>
											</tr>

										<?php  }
} else {
            echo "No rows found for priority: $priority<br>";
        }
    }					  
	$stmt->close();
} else {
    echo "Statement preparation error: " . $con->error;
}					?>
										
										</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div>		
		</div>
	</div>
	</div>
		
	
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
	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

				</body>
					<?php } ?>
	</html>
