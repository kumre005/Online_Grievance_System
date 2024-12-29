
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
$dataPoints = array();

$sql = mysqli_query($con, "SELECT tblsubadmin.SubAdminName, tblsubadmin.Department, tblsubadmin.id as sid, COUNT(tblcomplaints.complaintNumber) as totalcount,
     COUNT(IF((state='New'),0, NULL))  as notprocessedyet,
   COUNT(IF((state='in process'),0, NULL))  as inprocess,
   COUNT(IF((state='closed'),0, NULL))  as closed FROM tblcomplaints
join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber
join tblsubadmin on tblsubadmin.id=tblforwardhistory.ForwardTo
GROUP by tblsubadmin.SubAdminName");

while ($result = mysqli_fetch_array($sql)) {
    $xValue = $result['Department'];
    array_push($dataPoints, array("label" => $result['Department'], "yNew" => $result['notprocessedyet'], "yInProcess" => $result['inprocess'], "yClosed" => $result['closed']));
}
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
    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Department-wise Complaint Status"
                },
                axisY: {
                    title: "Total requests count in Department Queue"
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#",
                    showInLegend: true,
                    name: "New",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>.map(({label, yNew}) => ({ label, y: yNew }))
                }, {
                    type: "column",
                    yValueFormatString: "#",
                    showInLegend: true,
                    name: "In Process",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>.map(({label, yInProcess}) => ({ label, y: yInProcess }))
                }, {
                    type: "column",
                    yValueFormatString: "#",
                    showInLegend: true,
                    name: "Closed",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>.map(({label, yClosed}) => ({ label, y: yClosed }))
                }]
            });

            chart.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
</head>
<body>
<?php include('include/header.php');?>

<div class="wrapper">
    <div class="container adminpage" id="page_id02">
        <div class="row admin" id="admin">
            <?php include('include/sidebar.php');?>
            <div class="span9" id="adminrightside">
                <div class="content">
                    <div class="module">
                        <?php
                        $state='in process';
                        $rt = mysqli_query($con, "SELECT count(complaintNumber) as totalcomplaint,
                                    COUNT(IF((state is null || state='New'),0, NULL))  as notprocessedyet,
                                    COUNT(IF((state='in process'),0, NULL))  as inprocess,
                                    COUNT(IF((state='closed'),0, NULL))  as closed,
                                    COUNT(IF(((state is null || state='New' || state='$state') and ( complaintNumber not in (SELECT complaintNumber from tblforwardhistory))),0, NULL))  as notforwardedyet
                                    FROM tblcomplaints ");
                        while ($row = mysqli_fetch_array($rt)) { ?>
                            <div class="cardBox">
                                <a href="notprocess-complaint.php">
                                    <div class="card">
                                        <div>
                                            <div class="numbers"><?php echo $row['notprocessedyet']; ?></div>
                                            <div class="cardName">Not Processed Yet</div>
                                        </div>

                                        <div class="iconBx">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </div>
                                    </div>
                                </a>
                                <a href="inprocess-complaint.php">
                                    <div class="card">
                                        <div>
                                            <div class="numbers"><?php echo $row['inprocess']; ?></div>
                                            <div class="cardName">In Process</div>
                                        </div>
                                        <div class="iconBx">
                                            <ion-icon name="cart-outline"></ion-icon>
                                        </div>
                                    </div>
                                </a>
                                <a href="notforwared-pending-complaints.php">
                                    <div class="card">
                                        <div>
                                            <div class="numbers"><?php echo $row['notforwardedyet']; ?></div>
                                            <div class="cardName">Not Forwarded Pending</div>
                                        </div>

                                        <div class="iconBx">
                                            <ion-icon name="chatbubbles-outline"></ion-icon>
                                        </div>
                                    </div>
                                </a>
                                <a href="closed-complaint.php">
                                    <div class="card">
                                        <div>
                                            <div class="numbers"><?php echo $row['closed']; ?></div>
                                            <div class="cardName">Closed</div>
                                        </div>
                                        <div class="iconBx">
                                            <ion-icon name="cash-outline"></ion-icon>
                                        </div>
                                    </div>
                                </a>
                                <a href="manage-complaints.php">
                                    <div class="card">
                                        <div>
                                            <div class="numbers"><?php echo $row['totalcomplaint']; ?></div>
                                            <div class="cardName">Total</div>
                                        </div>
                                        <div class="iconBx">
                                            <ion-icon name="cash-outline"></ion-icon>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php');?>

<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js"></script>
<script src="scripts/child-script.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>


</html>

<?php } ?>
