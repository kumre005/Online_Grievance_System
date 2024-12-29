<?php


$priorityDays = array(
    "P1" => 2,
    "P2" => 4,
    "P3" => 7,
    "P4" => 15
);

// Initialize variables to store counts for each priority
$P1 = $P2 = $P3 = $P4 = 0;

// Prepare and execute the query for each priority
foreach ($priorityDays as $priority => $days) {
    $timeAgo = date("Y-m-d H:i:s", strtotime("-$days days"));
    $query = "
        SELECT COUNT(*) AS count
        FROM tblcomplaints
        WHERE
            RegDate < '$timeAgo' AND
            state != 'closed' AND
            priority = '$priority';
    ";

    $stmt = $con->prepare($query);

    if ($stmt) {
        // Execute the query
        $stmt->execute();

        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        ${$priority} = $row['count']; // Assign the count to the corresponding variable
        $stmt->close();
    } else {
        echo "Statement preparation error for $priority: " . $con->error;
    }
}



 
$dataPoints = array( 
	array("label"=>"P1", "y"=>$P1),
	array("label"=>"P2", "y"=>$P2),
	array("label"=>"P3", "y"=>$P3),
	array("label"=>"P4", "y"=>$P4)
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainerr", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Overdue Complaints"
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "0",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainerr" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>  