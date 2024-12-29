<?php
 session_start();
include('include/config.php');
$dataPoints = array();									
//$subid=$_SESSION['suid'];
$sql = mysqli_query($con,"SELECT tblsubadmin.SubAdminName,tblsubadmin.Department,tblsubadmin.id as sid,COUNT(tblcomplaints.complaintNumber) as totalcount,COUNT(IF((status is null || status=''),0, NULL))  as notprocessedyet,
   COUNT(IF((status='in process'),0, NULL))  as inprocess,
   COUNT(IF((status='closed'),0, NULL))  as closed FROM tblcomplaints
join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber
join tblsubadmin on tblsubadmin.id=tblforwardhistory.ForwardTo
 GROUP by tblsubadmin.SubAdminName");

while($result=mysqli_fetch_array($sql))
{

 $xValue = $result['Department'];
    $yValue = $result['totalcount'];
    array_push($dataPoints, array("y" => $result['totalcount'], "label" => $result['Department']));


}
?>
<html>
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
	<script>
		window.onload = function() {
		 
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Department"
			},
			axisY: {
				title: "Total requests count in Depaartment Queue"
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0.## tonnes",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
		 
		}
	</script>
	</head>
	<body>
	
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script src="scripts/child-script.js"></script>
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
	
	</html>
	